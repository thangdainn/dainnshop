<?php

class login extends Controller
{

    public function __construct()
    {
        $message = array();
        $data = array();
        // Session::checkSession();

        parent::__construct();
    }

    public function index()
    {
        $this->login();
    }
    public function login()
    {
        // $this->load->view("header");
        Session::init();
        if (Session::get("login") == true) {
            header('Location:' . BASE_URL . '/');
        }
        $this->load->view("cpanel/login");
        // $this->load->view("footer");
    }
    public function dashboard()
    {
        Session::checkSession();
        $this->load->view("header");
        $this->load->view("cpanel/home");
        $this->load->view("footer");
    }

    public function authentication()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loginModel = $this->load->model('LoginModel');
        $check = $loginModel->findByEmail($email);
        if (isset($check['email'])) {
            if (password_verify($password, $check['password'])) {
                Session::init();
                Session::set('login', true);
                Session::set('email', $check['email']);
                // Session::set('fullName', $check['fullname']);
                Session::set('fullName', "dao duc thang");
                Session::set('roleId', $check['group_id']);
                header('Location:' . BASE_URL . '/');
            } else {
                header('Location:' . BASE_URL . '/login');
            }
        } else {
            $message['msg'] = 'Information Login is incorrect';
            header('Location:' . BASE_URL . '/login');
        }
    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header('Location:' . BASE_URL . '/');
    }
}