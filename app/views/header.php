<?php
Session::init();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dainn Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="public/user/home/styles/bootstrap4/bootstrap.min.css">
    <link href="public/user/home/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/styles/categories_responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/home/styles/contact_responsive.css">
    
</head>

<body>
    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- My Account -->

                                    <li class="account" style="min-width: 150px">
                                        <a href="" id="prevent-default">

                                            <?php
                                            if (Session::isLogin()) {
                                                $fullName = Session::getFullName();
                                                echo "Welcome, $fullName";
                                            } else {
                                                echo "My Account";
                                            }
                                            ?>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <?php
                                        if (Session::isLogin()) {
                                        ?>
                                            <ul class="account_selection">
                                                <li><a href="<?php echo BASE_URL . '/auth/user_info' ?>"><i class=" fa fa-user" aria-hidden="true"></i>
                                                        Information</a>
                                                </li>
                                                <li><a href="<?php echo BASE_URL . '/auth/change_password' ?>"><i class=" fa fa-user" aria-hidden="true"></i>
                                                        Change Password</a>
                                                </li>
                                                <li><a href="<?php echo BASE_URL ?>/login/logout"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                        Logout</a>
                                                </li>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <ul class="account_selection">
                                                <li><a href="<?php echo BASE_URL ?>/login" onclick="onLogin()"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                                        Login</a></li>
                                                <li><a href="#" onclick="onRegister()"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                                        Register</a>
                                                </li>
                                            </ul>
                                        <?php
                                        }
                                        ?>

                                        <!-- <ul class="account_selection">
                                            <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                            <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="<?php echo BASE_URL ?>">dainn<span>shop</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="<?php echo BASE_URL ?>/">home</a></li>
                                    <li><a href="<?php echo BASE_URL ?>/shop">shop</a></li>
                                    <!-- <li><a href="#">promotion</a></li> -->
                                    <!-- <li><a href="#">pages</a></li> -->
                                    <li><a href="#">blog</a></li>
                                    <li><a href="<?php echo BASE_URL ?>/contacts">contact</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <!-- <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li> -->
                                    <li class="checkout">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="checkout_items" class="checkout_items">2</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <script>
            let btnAcc = document.getElementById('prevent-default');
            btnAcc.addEventListener('click', (e) => {
                e.preventDefault();
            })
        </script>