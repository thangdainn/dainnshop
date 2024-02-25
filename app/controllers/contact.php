<?php

class contact extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->contact();
    }
    public function contact()
    {
        $this->load->view("header");
        $this->load->view("cpanel/contact");
        $this->load->view("footer");
    }
}