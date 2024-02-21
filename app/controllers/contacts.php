<?php

class contacts extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->contacts();
    }
    public function contacts()
    {
        $this->load->view("header");
        $this->load->view("cpanel/contacts");
        $this->load->view("footer");
    }
    public function notFound()
    {
        // $this->load->view("header");
        $this->load->view("404");
        // $this->load->view("footer");
    }
}