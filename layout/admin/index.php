<?php

include("header.php");
include("menu.php");
include("top-nav.php");

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'category':
            include('category/list.php');
            break;
        case 'product':
            include('product/list.php');
            break;
        default:
            include('home.php');
            break;
    }
} else {
    include('home.php');
}

include("footer.php");
