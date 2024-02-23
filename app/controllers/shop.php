<?php

class shop extends Controller
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->shop();
    }
    public function shop()
    {
        $this->load->view("header");
        $cateModel = $this->load->model("CategoryModel");
        $data['categories'] = $cateModel->findAll();
        $brandModel = $this->load->model("BrandModel");
        $data['brands'] = $brandModel->findAll();

        $this->load->view("cpanel/shop", $data);
        $this->load->view("footer");
    }
    public function notFound()
    {
        // $this->load->view("header");
        $this->load->view("404");
        // $this->load->view("footer");
    }
}
