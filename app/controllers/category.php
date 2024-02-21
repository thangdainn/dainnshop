<?php

class category extends Controller
{

    public function __construct()
    {
        // $data = array();
        parent::__construct();
    }

    public function list()
    {
        $this->load->view("header");
        $CategoryModel = $this->load->model("CategoryModel");
        $data['category'] = $CategoryModel->findAll();
        $this->load->view("category", $data);
        $this->load->view("footer");
    }

    public function add(){
        $this->load->view("addCategory");
    }

    public function edit()
    {
        $CategoryModel = $this->load->model("CategoryModel");
        $data = array(
            "name" => "Ao Denim",
            "image" => "adidas-d2m-3s-gm2135-1.jpg"
        );
        $CategoryModel->save($data);
        echo "insert successfully";
    }
}
