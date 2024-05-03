<?php
session_start();
include ('dbcon.php');

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getBy2ID($table, $product_id, $size_id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE product_id='$product_id' AND size_id='$size_id' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllOrders() {
    global $con;
  
    $status = mysqli_real_escape_string($con, 6); // Escape the status value
    $query = "SELECT * FROM `order` WHERE id_order_status!='$status'";  // Escape table name with backticks
    return $query_run = mysqli_query($con, $query);
}

function checkIdNoValid($order_id)
{
    global $con;

    $query = "SELECT * FROM `order` WHERE id='$order_id'";
    return mysqli_query($con, $query);
}
?>