<?php

class about extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->about();
    }
    public function about()
    {
        $this->load->view("header");
        $this->load->view("cpanel/about");
        $this->load->view("footer");
    }
}
