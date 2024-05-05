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

    public function addOrder() {
        $fullName = $_POST['fullName'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $products = $_POST['products'];
        $note = $_POST['note'];
        $paymentMethod = $_POST['paymentMethod'];

        Session::init();
        $userID = Session::getUserId();
        $checkOutModel = $this->load->model("CheckOutModel");
        $orderId = $checkOutModel->addOrder($userID, $fullName, $phone, $address, $note, $paymentMethod);
        
        foreach($products as $product ) {
            $productId = $product['product_id'];
            $sizeId = $product['size_id'];
            $total = $product['total'];
            $quantity = $product['quantity'];

            $checkOutModel->addOrderDetail($orderId, $productId, $sizeId, $total, $quantity);
        }

        $cartModel = $this->load->model("CartModel");
        $cartModel->deleteCartByUserId($userID);
    }

    public function checkout() {
        {
            Session::init();
            $userID = Session::getUserId();
            $this->load->view("header");
            $cartModel = $this->load->model("CartModel");
            $data['carts'] = $cartModel->findByUserId($userID);
            $this->load->view("cpanel/checkout", $data);
            $this->load->view("footer");
        }
    }
}