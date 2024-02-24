<?php

class product extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->product();
    }


    public function product()
    {
        $this->load->view("header");
        $this->load->view("cpanel/productDetail");
        $this->load->view("footer");
    }
    public function detail()
    {
        $this->load->view("header");

        $product = $this->load->model("ProductModel");
        $data['product'] = $product->findById(1);

        $this->load->view("cpanel/productDetail");
        $this->load->view("footer");
    }
}
