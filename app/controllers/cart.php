<?php
if (!isset($_SESSION)) {
    session_start();
}


class cart extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->cart();
    }

    public function add()
    {
        $message = array();
        $message["status"] = false;
        if (
            isset($_POST['userId']) &&
            isset($_POST['productId']) &&
            isset($_POST['sizeId']) &&
            isset($_POST['quantity'])
        ) {
            $userId = $_POST['userId'];
            $productId = $_POST['productId'];
            $sizeId = $_POST['sizeId'];
            $quantity = $_POST['quantity'];

            $cartModel = $this->load->model("CartModel");
            $cartModel->addCart($userId, $productId, $quantity, $sizeId);
            $message["status"] = true;
        }
    }

    public function updateAmount()
    {
        $cartId = $_POST['cartId'];
        $newAmount = $_POST['newAmount'];
        $userID = $_POST['userId'];

        $cartModel = $this->load->model("CartModel");
        $cartModel->updateCart($newAmount, $cartId);
        $updatedCart = $cartModel->findByUserId($userID);
        $this->render($updatedCart);
    }

    public function deleteCart()
    {
        $cartId = $_POST['cartId'];
        $userId = $_POST['userId'];

        if ($userId == 0 || !isset($userId)) {
            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            foreach ($cart as $index => $item) {
                if ($item["cart_id"] == $cartId) {
                    array_splice($cart, $index, 1);
                    break;
                }
            }
            $_SESSION['cart'] = $cart;
            $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] - 1 : 0;
            $this->render($_SESSION['cart']);
        } else {
            $cartModel = $this->load->model("CartModel");
            $cartModel->deleteCart($cartId);
            $updatedCart = $cartModel->findByUserId($userId);
            $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] - 1 : 0;
            $this->render($updatedCart);
        }

    public function render($carts)
    {
        $num = 1;
        $totalFinal = 0;
        $html = '';
        foreach ($carts as $cart) {
            $totalMoney = $cart['cost'] * $cart['amount'];
            $totalFinal += $totalMoney;
            $html .= '
            <tr>
                                    <input type="hidden" id="cart-id" value="' . $cart['cart_id'] . '
                                                                                    ">
									<td class="product_number">' . $num . '</td>
									<td class="product_name">' . $cart['product_name'] . ' </td>
									<td class="product_img"><img src="' . BASE_URL . '/upload/images/' . $cart['product_img'] . '" alt=""</td>
									<td class="product_quantity">
										<input class="quantity_input" type="number" value="' . $cart['amount'] . '" min="1">
									</td>
									<td class="product_price">' . $cart['cost'] . '</td>
									<td class="total_money">' . $totalMoney . ' </td>
									<td class="product_action">
									    <button class="btn delete_btn" id="delete">Delete</button>
									    <button class="btn update_btn" id="update">Update</button>
								    </td>
								</tr>';
            $num++;
        }
        $html .= '

								<tr>
									<td class="product_number">&nbsp;</td>
									<td class="product_name">Total cart</td>
									<td class="product_img">&nbsp;</td>
									<td class="product_quantity">&nbsp;</td>
									<td class="product_price">&nbsp;</td>
									<td class="total_money">' . $totalFinal . '</td>
									<td class="product_delete">&nbsp;</td>
								</tr>';
        echo $html;
    }

    public function onUserLogin($userId)
    {
        $cartModel = $this->load->model("CartModel");

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $sessionCartItem) {
                $dbCartItem = $cartModel->findCartItem($userId, $sessionCartItem['product_id'], $sessionCartItem['size_id']);

                if ($dbCartItem) {
                    $newQuantity = $dbCartItem['amount'] + $sessionCartItem['amount'];
                    $cartModel->updateCart($newQuantity, $dbCartItem['id']);
                } else {
                    $cartModel->addCart($userId, $sessionCartItem['product_id'], $sessionCartItem['amount'], $sessionCartItem['size_id']);
                }
            }

            // Clear the session cart
            unset($_SESSION['cart']);
        }
    }

    public function totalQuantity () {
        $totalQuantity = 0;

        if (Session::isLogin()) {
            $userID = Session::getUserId();
            $cartModel = $this->load->model("CartModel");
            $total = $cartModel->getTotalQuantityForUser($userID);
            $totalQuantity = $total[0]['total'];
        } else {
            if (isset($_SESSION['cart'])) {
                $total = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $total += $item;
                }
                $totalQuantity = $total;
            } else {
                $totalQuantity = 0;
            }
        }
        return $totalQuantity;
    }

    public function cart()
    {
        $totalQuantity = 0;
        $this->load->view("header");
        if (Session::isLogin()) {
            $userID = Session::getUserId();
            $cartModel = $this->load->model("CartModel");
            $data['carts'] = $cartModel->findByUserId($userID);
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $cartModel->addCart($userID, $item['product_id'], $item['amount'], $item['size_id']);
                }
                $data['carts'] = array_merge($data['carts'], $_SESSION['cart']);
                unset($_SESSION['cart']);
            }
            $total = $cartModel->getTotalQuantityForUser($userID);
            $totalQuantity = $total[0]['total'];
            $this->load->view("cpanel/cart", $data);
        } else {
            $this->load->view("cpanel/cart");
        }
        $this->load->view("footer");
    }
}
