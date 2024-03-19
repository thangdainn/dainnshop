<?php

class user extends Controller
{

    public function __construct()
    {
        $message = array();
        parent::__construct();
    }

    // public function index()
    // {
    //     $this->user();
    // }
    // public function user()
    // {
    //     $this->load->view("header");
    //     $this->load->view("cpanel/profile");
    //     $this->load->view("footer");
    // }
    public function profile($id)
    {
        Session::init();
        if (!Session::get('login')) {
            header('Location: ' . BASE_URL . '/login');
            exit();
        }
        $this->load->view("header");

        $userModel = $this->load->model("UserModel");
        $data['user'] = $userModel->findById($id);
        $this->load->view("cpanel/profile", $data);
        $this->load->view("footer");
    }

    public function updateProfile()
    {
        $message['isUpdateProfile'] = false;
        $message['msg'] = 'Update failed';

        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $userModel = $this->load->model("UserModel");
        if ($userModel->findByEmail($email) && $userModel->findByEmail($email)['id'] != $id) {
            $message['isUpdateProfile'] = false;
            $message['msg'] = 'Email already exists';
            echo json_encode($message);
            return;
        }
        //  else if ($userModel->findByPhone($phone) && $userModel->findByPhone($phone)['id'] != $id) {
        //     $message['isUpdateProfile'] = false;
        //     $message['msg'] = 'Phone already exists';
        //     echo json_encode($message);
        //     return;
        // }

        $flagUploadFile = false;
        $file_destination = null;

        if (isset($_FILES['image'])) {

            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_error = $file['error'];

            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            if ($file_error !== 4) {

                if (in_array($file_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Generate a unique file name
                    $file_new_name = uniqid('', true) . '_' . time() . '.' . $file_ext;

                    // Define the destination path
                    $file_destination = 'images/avatar/' . $file_new_name;

                    // Move the uploaded file
                    if (move_uploaded_file($file_tmp, 'upload/' . $file_destination)) {
                        $flagUploadFile = true;
                    }
                }
            }
        }
        $currentDateTime = date('Y-m-d H:i:s');
        if ($flagUploadFile) {
            $userModel->updateProfile($id, $fullname, $email, $phone, $currentDateTime, $file_destination);
            $message['isUpdateProfile'] = true;
            $message['msg'] = 'Update successful';
            $message['imagePath'] = $file_destination;

            Session::init();
            Session::set('fullName', $fullname);
            Session::set('img', $file_destination);
        } else if (!isset($_FILES['image'])) {
            $file_destination = null;
            $userModel->updateProfile($id, $fullname, $email, $phone, $currentDateTime, $file_destination);
            $message['isUpdateProfile'] = true;
            $message['msg'] = 'Update successful';

            Session::init();
            Session::set('fullName', $fullname);
        } else {
            $message['isUpdateProfile'] = false;
            $message['msg'] = 'Valid image';
        }
        echo json_encode($message);
    }
    public function changePassword()
    {
        $id = $_POST['id'];
        $currentPassword = $_POST['current_password'];

        $userModel = $this->load->model("UserModel");

        $user = $userModel->findById($id);
        if (!password_verify($currentPassword, $user['password'])) {
            $message['isChangePassword'] = false;
            $message['msg'] = 'Current password is incorrect';
            echo json_encode($message);
            return;
        }

        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $currentDateTime = date('Y-m-d H:i:s', strtotime('+7 hours'));
        $userModel->changePassword($id, $password, $currentDateTime);

        $message['isChangePassword'] = true;
        $message['msg'] = 'Change password successful';

        echo json_encode($message);
    }
}
