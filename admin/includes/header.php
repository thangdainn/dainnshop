<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>
    Dainn Shop Admin
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="icon" type="image/png" href="../assets/logo/favicon.ico" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.min.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/custom.css" rel="stylesheet" />

  <!-- Alertify Js -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->

  <?php
  $currentURL = $_SERVER['REQUEST_URI'];
  if (strpos($currentURL, '/statistical') !== false || strpos($currentURL, '/statisticalTopSale') !== false) {
    // echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/font-awesome/css/font-awesome.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/nprogress/nprogress.css">';
    // echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/statistic.css">';
    // echo '<link rel="stylesheet" type="text/css" href="../assets/build/css/custom.min.css">';
    echo '<script src="../assets/vendors/jquery/dist/jquery.min.js"></script>';
  } else {
    echo '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>';
    echo '<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>';
    echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">';
  }
  ?>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php include('sidebar.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include('navbar.php'); ?>