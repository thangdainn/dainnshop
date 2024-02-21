<?php

class shop extends Controller
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index(){
        $this->shop();
    }
    public function shop()
    {
        $this->load->view("header");
        $this->load->view("cpanel/shop");
        $this->load->view("footer");
    }
    public function notFound()
    {
        // $this->load->view("header");
        $this->load->view("404");
        // $this->load->view("footer");
    }
}
