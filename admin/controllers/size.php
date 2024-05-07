<?php
include('../models/adminconfig.php');
include('../models/dbcon.php');
include('../models/myfunctions.php');

if (isset($_POST['add_size_btn'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if ($name != "" && $description != "") {
        $size_query_run = insertSize($name, $description);

        if ($size_query_run) {
            redirect("../views/add-size.php", "Size Added Successfully");
        } else {
            redirect("../views/add-size.php", "Something went wrong");
        }
    } else {
        redirect("../views/add-size.php", "All fields are required");
    }
} else if (isset($_POST['update_size_btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $currentDateTime = date('Y-m-d H:i:s');
    
    if ($name != "" && $description != "" && $status != "") {

        
        $size_query_run = updateSize($id, $name, $description, $status, $currentDateTime);

        if ($size_query_run) {
            redirect("../views/edit-size.php?id=$id", "Size Updated Successfully");
        } else {
            redirect("../views/edit-size.php?id=$id", "Something went wrong");
        }
    } else {
        redirect("../views/edit-size.php?id=$id", "All fields are required");
    }
} else if (isset($_POST['delete_size_btn'])) {
    $size_id = $_POST['size_id'];

    $size_query = "UPDATE sizes SET status = 0 WHERE id='$size_id' ";
    $size_query_run = mysqli_query($con, $size_query);

    if ($size_query_run) {
        echo 200;
    } else {
        echo 500;
    }
}
