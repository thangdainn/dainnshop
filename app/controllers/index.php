<?php

class index extends Controller
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->homePage();
    }
    public function homePage()
    {
        $this->load->view("header");

        $productNewList = $this->load->model("ProductModel");
        $data['productNewList'] = $productNewList->findTop10ByCreateAt();
        $data['productBestSellerList'] = $productNewList->findTop10ByOrder();

        $this->load->view("cpanel/home", $data);
        $this->load->view("footer");
    }
    public function notFound()
    {
        // $this->load->view("header");
        $this->load->view("404");
        // $this->load->view("footer");
    }
}
