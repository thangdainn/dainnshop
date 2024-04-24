<?php

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
            }
            else {
                $cartModel = $this->load->model("CartModel");
                $cartModel->addCart($userId, $productId, $quantity, $sizeId);
                $message["status"] = true;
            }
        }
        echo json_encode($message); 
    }

    public function addCartSession($productId, $sizeId, $quantity) {
        if (!isset($_SESSION)) {
            session_start();
        }
    
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'size_id' => $sizeId
            ];
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

    public function deleteCart() {
        $cartId = $_POST['cartId'];
        $userID = $_POST['userId'];
        $cartModel = $this->load->model("CartModel");
        $cartModel->deleteCart($cartId);
        $updatedCart = $cartModel->findByUserId($userID);
        $this->render($updatedCart);
    }

    public function render($carts) {
        $num = 1;
		$totalFinal = 0;
        $html = '';
        foreach ($carts as $cart) {
            $totalMoney = $cart['cost'] * $cart['amount'];
			$totalFinal += $totalMoney;
            $html .= '
            <tr>
                                    <input type="hidden" id="cart-id" value="'.$cart['cart_id'] .'
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
                                $num ++;
        }
        $html.= '

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

    public function cart()
    {
        $this->load->view("header");
        if (Session::isLogin()) {
            $userID = Session::getUserId();
            $cartModel = $this->load->model("CartModel");
            $data['carts'] = $cartModel->findByUserId($userID);
            $this->load->view("cpanel/cart", $data);
        }
        else {
            $this->load->view("cpanel/cart");
        }
        $this->load->view("footer");
    }
}
