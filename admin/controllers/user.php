<?php
include('../models/adminconfig.php');
include('../models/dbcon.php');
include('../models/myfunctions.php');

if (isset($_POST['add_user_btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    if (!preg_match("/^0\d{9}$/", $phone)) {
        redirect("../views/edit-user.php?id=$id", "Invalid phone number");
    }
    if ($fullname != "" && $email != "" && $phone != "" && $password != "" && $role_id != "") {
        if (mysqli_num_rows(findUserByEmail($email)) > 0) {
            redirect("../views/add-user.php", "Email already exists");
        }
        $password = password_hash($password, PASSWORD_DEFAULT);


        $user_query_run = insertUser($fullname, $email, $phone, $password, $role_id);

        if ($user_query_run) {
            redirect("../views/add-user.php", "User Added Successfully");
        } else {
            redirect("../views/add-user.php", "Something went wrong");
        }
    } else {
        redirect("../views/add-user.php", "All fields are required");
    }
} else if (isset($_POST['update_user_btn'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role_id = $_POST['role_id'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $currentDateTime = date('Y-m-d H:i:s');
    if (!preg_match("/^0\d{9}$/", $phone)) {
        redirect("../views/edit-user.php?id=$id", "Invalid phone number");
    }
    if ($fullname != "" && $email != "" && $phone != "" && $role_id != "") {
        if (mysqli_num_rows(findUserByEmail($email)) > 0 && mysqli_fetch_array(findUserByEmail($email))['id'] != $id) {
            redirect("../views/edit-user.php?id=$id", "Email already exists");
        }

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
                    if (move_uploaded_file($file_tmp, '../../upload/' . $file_destination)) {
                        $flagUploadFile = true;
                    }
                }
            }
        }
        if ($password != "") {
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $password = null;
        }
        $user_query_run = updateUser($id, $fullname, $email, $phone, $role_id, $currentDateTime, $status, $file_destination, $password);

        if ($user_query_run) {
            redirect("../views/edit-user.php?id=$id", "User Updated Successfully");
        } else {
            redirect("../views/edit-user.php?id=$id", "Something went wrong");
        }
    } else {
        redirect("../views/edit-user.php?id=$id", "All fields are required");
    }
} else if (isset($_POST['delete_user_btn'])) {
    $user_id = $_POST['user_id'];

    $user_query = "UPDATE users SET status = 0 WHERE id='$user_id' ";
    $user_query_run = mysqli_query($con, $user_query);

    if ($user_query_run) {
        echo 200;
    } else {
        echo 500;
    }
}
