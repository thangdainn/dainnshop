<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>
    DAINNSHOP ADMIN
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

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



  <?php
  $currentURL = $_SERVER['REQUEST_URI'];
  if (strpos($currentURL, '/statistical') !== false) {
    // echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/font-awesome/css/font-awesome.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/nprogress/nprogress.css">';
    // echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/statistic.css">';
    // echo '<link rel="stylesheet" type="text/css" href="../assets/build/css/custom.min.css">';
    echo '<script src="../assets/vendors/jquery/dist/jquery.min.js"></script>';
  }
  ?>

  <style>
    .form-control {
      border: 1px solid #e91e63 !important;
      padding: 8px 10px;
    }

    .form-select {
      border: 1px solid #e91e63 !important;
      padding: 8px 10px;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php include('sidebar.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include('navbar.php'); ?>