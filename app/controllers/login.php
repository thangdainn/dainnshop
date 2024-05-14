<?php

class login extends Controller
{

    public function __construct()
    {
        $message = array();
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        Session::init();
        if (Session::get("login")) {
            header('Location:' . BASE_URL . '/');
        }
        $this->load->view("cpanel/login");
    }


    public function authentication()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userModel = $this->load->model('UserModel');
        $check = $userModel->findByEmail($email);
        if (isset($check['email'])) {
            if (password_verify($password, $check['password'])) {
                Session::init();
                Session::set('login', true);
                Session::set('email', $check['email']);
                Session::set('userId', $check['id']);
                Session::set('fullName', $check['fullname']);
                Session::set('img', $check['image']);
                Session::set('roleId', $check['role_id']);
                $message['isLogin'] = true;
                $message['msg'] = 'Login successful';
            } else {
                $message['isLogin'] = false;
                $message['msg'] = 'Information Login is incorrect';
            }
        } else {
            $message['isLogin'] = false;
            $message['msg'] = 'Information Login is incorrect';
        }
        echo json_encode($message);
    }
    public function register()
    {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $userModel = $this->load->model('UserModel');
        $check = $userModel->findByEmail($email);
        if (isset($check['email'])) {
            $message['isRegister'] = false;
            $message['msg'] = 'Email was registered';
        } else {
            $userModel->register($fullname, $email, $phone, password_hash($password, PASSWORD_DEFAULT));
            $message['isRegister'] = true;
            $message['msg'] = 'Register successful';
        }
        echo json_encode($message);
    }
    public function mailForgot()
    {
        $email = $_POST['email'];
        $userModel = $this->load->model('UserModel');
        $check = $userModel->findByEmail($email);
        if (isset($check['email'])) {
            $message['isCheckMailForgot'] = true;
        } else {
            $message['isCheckMailForgot'] = false;
            $message['msg'] = 'Email is not registered';
        }
        echo json_encode($message);
    }
    public function forgotPassword()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userModel = $this->load->model('UserModel');
        $check = $userModel->findByEmail($email);
        if (isset($check['email'])) {
            $currentDateTime = date('Y-m-d H:i:s', strtotime('+7 hours'));
            $userModel->forgotPassword($email, password_hash($password, PASSWORD_DEFAULT), $currentDateTime);

            $message['isForgotPassword'] = true;
            $message['msg'] = 'Change password successful';
        } else {
            $message['isForgotPassword'] = false;
            $message['msg'] = 'Change password failed';
        }
        echo json_encode($message);
    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header('Location:' . BASE_URL . '/login');
    }
}
