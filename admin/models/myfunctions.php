<?php
session_start();
include('dbcon.php');


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return mysqli_query($con, $query);
}
function getAllByStatus($table, $status)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='$status'";
    return mysqli_query($con, $query);
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

function getAllOrders()
{
    global $con;

    $status = mysqli_real_escape_string($con, 6); // Escape the status value
    $query = "SELECT * FROM `order` ORDER BY create_at DESC";  // Escape table name with backticks
    return $query_run = mysqli_query($con, $query);
}

function checkIdNoValid($order_id)
{
    global $con;

    $query = "SELECT * FROM `order` WHERE id='$order_id'";
    return mysqli_query($con, $query);
}

function getExistingImagesByProductId($product_id)
{
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

function deleteImageFromProduct($product_id, $image_to_delete)
{
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


function findCountOrderByOrderStatus_Id($id)
{
    global $con;
    $query = "SELECT count(*) as totalOrder FROM `order` WHERE id_order_status = '$id'";
    return mysqli_query($con, $query);
}

function findCountReviewAtMonth()
{
    global $con;
    $query = "SELECT COUNT(*) AS countReview FROM reviews WHERE YEAR(create_at) = YEAR(CURRENT_DATE()) AND MONTH(create_at) = MONTH(CURRENT_DATE());";
    return mysqli_query($con, $query);
}
function findTotalPriceAtMonth($month)
{
    global $con;
    $query = "SELECT SUM(od.total) as totalPrice FROM `order` o JOIN order_detail od ON o.id = od.order_id WHERE YEAR(create_at) = YEAR(CURRENT_DATE()) AND MONTH(create_at) = '$month';";
    return mysqli_query($con, $query);
}

function findUserByEmail($email)
{
    global $con;
    $query = "SELECT * FROM users WHERE email='$email'";
    return mysqli_query($con, $query);
}

function insertUser($fullname, $email, $phone, $password, $role_id)
{
    global $con;
    $query = "INSERT INTO `users` (fullname, email, phone, password, role_id) VALUES ('$fullname','$email','$phone','$password','$role_id')";
    return mysqli_query($con, $query);
}

function updateUser($id, $fullname, $email, $phone, $role_id, $update_at, $status, $image = null, $password = null)
{
    global $con;
    $query = "UPDATE `users` SET fullname='$fullname', email='$email', phone='$phone', role_id='$role_id', update_at='$update_at', status='$status'";
    if ($image != null) {
        $query .= ", image='$image'";
    }
    if ($password != null) {
        $query .= ", password='$password'";
    }
    $query .= " WHERE id='$id'";

    return mysqli_query($con, $query);
}

function insertRole($name, $permission)
{
    global $con;
    $query = "INSERT INTO `roles` (name, permission) VALUES ('$name','$permission')";
    return mysqli_query($con, $query);
}

function updateRole($id, $name, $permission, $status, $update_at)
{
    global $con;
    $query = "UPDATE `roles` SET name='$name', permission='$permission', status='$status', update_at='$update_at' WHERE id='$id'";
    return mysqli_query($con, $query);
}

function insertSize($name, $description)
{
    global $con;
    $query = "INSERT INTO `sizes` (name, description) VALUES ('$name','$description')";
    return mysqli_query($con, $query);
}

function updateSize($id, $name, $description, $status, $update_at)
{
    global $con;
    $query = "UPDATE `sizes` SET name='$name', description='$description', status='$status', update_at='$update_at' WHERE id='$id'";
    return mysqli_query($con, $query);
}

function findProductByFilters($categoryId, $fromDate, $toDate)
{
    global $con;
    $query = "SELECT p.id, p.name, p.img, o.create_at, SUM(od.total) as netSales, COUNT(o.id) as totalOrder 
                FROM `products` p 
                JOIN order_detail od ON p.id = od.product_id 
                JOIN `order` o ON od.order_id = o.id 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.status = 1 AND o.id_order_status = 6";
    if ($categoryId != 0) {
        $query .= " AND c.id = '$categoryId'";
    }
    $query .= " AND DATE(o.create_at) > '$fromDate' AND DATE(o.create_at) < '$toDate' 
                GROUP BY p.id, p.name, p.img, o.create_at ORDER BY o.create_at ASC";
    return mysqli_query($con, $query);
}

function findTop10SaleProduct($fromDate, $toDate)
{
    global $con;
    $query = "SELECT p.id, p.name, p.img, SUM(od.total) as netSales, COUNT(o.id) as totalOrder 
                FROM `products` p 
                INNER JOIN order_detail od ON p.id = od.product_id 
                INNER JOIN `order` o ON od.order_id = o.id 
                WHERE p.status = 1 AND o.id_order_status = 6";
    $query .= " AND DATE(o.create_at) > '$fromDate' AND DATE(o.create_at) < '$toDate' 
                GROUP BY p.id, p.name, p.img ORDER BY SUM(od.total) DESC LIMIT 0, 10";
    return mysqli_query($con, $query);
}
