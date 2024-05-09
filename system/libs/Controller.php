<?php

class Controller{

    protected $load = array();

    public function __construct(){
        $this->load = new Load();
    }
    public function setTotalItemCart(&$data){
        if (Session::isLogin()) {
            $userID = Session::getUserId();
            $cartModel = $this->load->model("CartModel");
            $data['carts'] = $cartModel->findByUserId($userID);

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $cartModel->addCart($userID, $item['product_id'], $item['amount'], $item['size_id']);
                }
                $data['carts'] = array_merge($data['carts'], $_SESSION['cart']);
                // $_SESSION['totalQuantity'] += $total[0]['total'];

                unset($_SESSION['totalQuantity']);
                unset($_SESSION['cart']);
            }
            $total = $cartModel->getTotalQuantityForUser($userID);

            // $_SESSION['totalQuantity'] = $total[0]['total'];
            $data['totalQuantity'] = $total[0]['total'];
        }

    }
}