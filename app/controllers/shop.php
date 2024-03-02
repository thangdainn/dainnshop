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

        $sizeModel = $this->load->model("SizeModel");
        $data['sizes'] = $sizeModel->findAll();

        $productModel = $this->load->model("ProductModel");
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        } else {
            $keyword = "";
        }
        $limit = 16;
        $products = $productModel->findAll(0, $limit, $keyword);
        $data['products'] = $products;

        $totalPage = ceil($productModel->countFindAll($keyword) / $limit);
        $data['totalPage'] = $totalPage;

        $this->load->view("cpanel/shop", $data);
        $this->load->view("footer");
    }
}
