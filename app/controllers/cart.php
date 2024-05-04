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

            if ($userId == 0 || !isset($userId)) {
                $this->addCartSession($productId, $sizeId, $quantity);
                $message["status"] = true;
            } else {
                $cartModel = $this->load->model("CartModel");
                $existingCartItem = $cartModel->findCartItem($userId, $productId, $sizeId);

                if ($existingCartItem) {
                    $existingCartItem[0]['amount'] += $quantity;
                    $cartModel->updateCart($existingCartItem[0]['amount'], $existingCartItem[0]['id']);
                } else {
                    $cartModel->addCart($userId, $productId, $quantity, $sizeId);
                    $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] + 1 : 1;
                }
                $message["status"] = true;
            }
            $this->load->view("header");
            header("Location: " . BASE_URL . "/shop");
        }
    }

    public function addCartSession($productId, $sizeId, $quantity)
    {
        $cartModel = $this->load->model("CartModel");
        //Lấy ra name, image, price, quantity của sản phẩm
        $cartInfo = $cartModel->getInfoSessionCart($productId, $sizeId);
        $cartId = time();

        $cartItemExists = false;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['product_id'] == $productId && $item['size_id'] == $sizeId) {
                    // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng của nó lên
                    $item['amount'] += $quantity;
                    $cartItemExists = true;
                    break;
                }
            }
        }

        if (!$cartItemExists) {
            $cartItem = array(
                'size_id' => $sizeId,
                'product_id' => $productId,
                'cart_id' => $cartId,
                'amount' => $quantity,
                'product_name' => $cartInfo[0]['product_name'],
                'product_img' => $cartInfo[0]['product_img'],
                'cost' => $cartInfo[0]['product_cost'],
                'size' => $cartInfo[0]['size']
            );

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] + 1 : 1;
            $_SESSION['cart'][] = $cartItem;
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

        if ($_SESSION['totalQuantity'] < 0) {
            $_SESSION['totalQuantity'] = 0;
        }
        $this->load->view("header");
    }

        if ($_SESSION['totalQuantity'] < 0) {
            $_SESSION['totalQuantity'] = 0;
        }
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
				<td class="product_size">' . $cart['size'] . '</td>
                <td class="product_quantity">
					<input class="quantity_input" type="number" value="' . $cart['amount'] . '" min="1">
				</td>
				<td>$<span class="product_price">' .$cart['cost'] .'</span></td>
				<td>$<span class="total_money">'. $totalMoney .'</span</td>
				<td class="product_action">
					<button class="btn delete_btn" id="delete">Delete</button>
				</td>
			</tr>';
            $num++;
        }
        $html .= '
		    <tr>
                <td>&nbsp;</td>
                <td>Total cart</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="total_cart">' . $totalFinal . '</td>
                <td>&nbsp;</td>
		    </tr>';
        echo $html;
    }

    // public function onUserLogin($userId)
    // {
    //     $cartModel = $this->load->model("CartModel");

    //     if (isset($_SESSION['cart'])) {
    //         foreach ($_SESSION['cart'] as $sessionCartItem) {
    //             $dbCartItem = $cartModel->findCartItem($userId, $sessionCartItem['product_id'], $sessionCartItem['size_id']);

    //             if ($dbCartItem) {
    //                 $newQuantity = $dbCartItem['amount'] + $sessionCartItem['amount'];
    //                 $cartModel->updateCart($newQuantity, $dbCartItem['id']);
    //             } else {
    //                 $cartModel->addCart($userId, $sessionCartItem['product_id'], $sessionCartItem['amount'], $sessionCartItem['size_id']);
    //             }
    //         }

    //         // Clear the session cart
    //         unset($_SESSION['cart']);
    //     }
    // }

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
            $_SESSION['totalQuantity'] = $total[0]['total'];
            $this->load->view("cpanel/cart", $data);
        } else {
            $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
            $_SESSION['totalQuantity'] = count($carts);
            $this->load->view("cpanel/cart", ['carts' => $carts]);
        }
        $this->load->view("footer");
    }
}
