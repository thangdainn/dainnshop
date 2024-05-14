<?php
include('../models/adminconfig.php');
include('../models/dbcon.php');
include('../models/myfunctions.php');


if (isset($_POST['statistic_btn'])) {
    $categoryId = $_POST['categoryId'];
    $from_date = $_POST['startDate'];
    $to_date = $_POST['endDate'];

    $result = findProductByFilters($categoryId, $from_date, $to_date);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
} else if (isset($_POST['statisticTopSale_btn'])) {
    $from_date = $_POST['startDate'];
    $to_date = $_POST['endDate'];

    $result = findTop10SaleProduct($from_date, $to_date);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
}
