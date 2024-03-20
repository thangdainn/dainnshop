<?php

class purchaseOrder extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->purchaseOrder();
    }

    public function purchaseOrder() {

        $this->load->view("header");

        $userID = Session::getUserId();
        // $userID = 3;

        $orderStatusId = isset($_POST['orderStatusId']) ? $_POST['orderStatusId'] : null; 
        var_dump($orderStatusId);
    
        $orderModel = $this->load->model("PurchaseOrderModel");
        $data['orders'] = $orderModel->findByUserId($userID);
        $this->load->view("cpanel/purchaseOrder", $data);
        $this->load->view("footer");
    }
}
