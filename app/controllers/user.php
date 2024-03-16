<?php

class user extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->user();
    }
    public function user()
    {
        $this->load->view("header");
        $this->load->view("cpanel/profile");
        $this->load->view("footer");
    }
    public function profile($id)
    {
        $this->load->view("header");

        $userModel = $this->load->model("UserModel");
        $data['user'] = $userModel->findById($id);
        $this->load->view("cpanel/profile", $data);
        $this->load->view("footer");
    }

    public function updateProfile()
    {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $image = $_POST['image'];

        $userModel = $this->load->model("UserModel");
        // $result = $userModel->updateProfile($id, $fullname, $email, $phone, $image);
        // echo $result;
    }
}
