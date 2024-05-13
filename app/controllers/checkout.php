<?php

class checkout extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->checkout();
    }

    public function add()
    {
        // $message = array();
        $message['status'] = false;
        $fullName = $_POST['fullName'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $products = $_POST['products'];
        $paymentMethod = $_POST['paymentMethod'];

        Session::init();
        $userID = Session::getUserId();
        $checkOutModel = $this->load->model("CheckOutModel");
        $productSizeModel = $this->load->model("ProductSizeModel");

        $orderId = $checkOutModel->addOrder($userID, $fullName, $phone, $address, $paymentMethod);

        foreach ($products as $product) {
            $productId = $product['product_id'];
            $sizeId = $product['size_id'];
            $total = $product['total'];
            $quantity = $product['quantity'];

            $checkOutModel->addOrderDetail($orderId, $productId, $sizeId, $total, $quantity);
            $currenDate = date("Y-m-d H:i:s");
            $productSize = $productSizeModel->findByProduct_IdAndSize_Id($productId, $sizeId);
            $newQuantity = $productSize['quantity'] - $quantity;
            $productSizeModel->updateQuantity($newQuantity, $productId, $sizeId,  $currenDate);
            $message['status'] = true;
        }

        $cartModel = $this->load->model("CartModel");
        $cartModel->deleteCartByUserId($userID);
        $_SESSION['totalQuantity'] = 0;
        echo json_encode($message);
    }

    public function checkout()
    { {
            Session::init();
            $userID = Session::getUserId();
            $this->load->view("header");
            $cartModel = $this->load->model("CartModel");
            $data['carts'] = $cartModel->findByUserId($userID);
            $total = $cartModel->getTotalQuantityForUser($userID);
            $data['totalQuantity'] = $total[0]['total'];
            $this->load->view("cpanel/checkout", $data);

            $this->load->view("footer");
        }
    }
}
