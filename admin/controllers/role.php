<?php
include('../models/adminconfig.php');
include('../models/dbcon.php');
include('../models/myfunctions.php');

if (isset($_POST['add_role_btn'])) {
    $name = $_POST['name'];
    $permission = $_POST['permission'];

    if ($name != "" && $permission != "") {
        $role_query_run = insertRole($name, $permission);

        if ($role_query_run) {
            redirect("../views/add-role.php", "Role Added Successfully");
        } else {
            redirect("../views/add-role.php", "Something went wrong");
        }
    } else {
        redirect("../views/add-role.php", "All fields are required");
    }
} else if (isset($_POST['update_role_btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $permission = $_POST['permission'];
    $status = $_POST['status'];
    $currentDateTime = date('Y-m-d H:i:s');
    
    if ($name != "" && $permission != "" && $status != "") {

        
        $role_query_run = updateRole($id, $name, $permission, $status, $currentDateTime);

        if ($role_query_run) {
            redirect("../views/edit-role.php?id=$id", "Role Updated Successfully");
        } else {
            redirect("../views/edit-role.php?id=$id", "Something went wrong");
        }
    } else {
        redirect("../views/edit-role.php?id=$id", "All fields are required");
    }
} else if (isset($_POST['delete_role_btn'])) {
    $role_id = $_POST['role_id'];

    $role_query = "UPDATE roles SET status = 0 WHERE id='$role_id' ";
    $role_query_run = mysqli_query($con, $role_query);

    if ($role_query_run) {
        echo 200;
    } else {
        echo 500;
    }
}
