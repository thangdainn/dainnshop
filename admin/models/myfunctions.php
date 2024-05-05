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

function getByProductID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE product_id='$id' ";
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

function getExistingImagesByProductId($product_id) {
    global $con;
  
    $existing_images = array();
    $query = "SELECT image FROM images WHERE product_id = '$product_id'";
    $result = mysqli_query($con, $query);
  
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $existing_images[] = $row['image'];
      }
    }
  
    return $existing_images;
}

function deleteImageFromProduct($product_id, $image_to_delete) {
    global $con; // Assuming $con is your established database connection
  
    $stmt = mysqli_prepare($con, "DELETE FROM images WHERE product_id = ? AND image = ?");
  
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "is", $product_id, $image_to_delete);
        mysqli_stmt_execute($stmt);
  
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Image record successfully deleted
            return true;
        } else {
            // No image record deleted (might not exist)
            return false;
        }
    } else {
        // Error preparing the statement
        error_log("Error deleting image from product: " . mysqli_error($con));
        return false;
    }
}
?>