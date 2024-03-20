<?php

class cart extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->cart();
    }
    public function cart()
    {
        $this->load->view("header");
        $this->load->view("cpanel/cart");
        $this->load->view("footer");
    }
}