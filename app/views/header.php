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
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/user/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <?php
    $currentURL = $_SERVER['REQUEST_URI'];
    if (strpos($currentURL, '/shop') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/categories_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/paging.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/categories_responsive.css">';
    } elseif (strpos($currentURL, '/product') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/single_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/single_responsive.css">';
    } elseif (strpos($currentURL, '/contact') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/contact_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/contact_responsive.css">';
    } elseif (strpos($currentURL, '/index') !== false || strpos($currentURL, '/') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/main_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/responsive.css">';
    }
    ?>
    <script src="<?php echo BASE_URL ?>/public/user/js/jquery-3.2.1.min.js"></script>

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
                                        <a href="#" id="prevent-default">

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
                                    <li><a href="<?php echo BASE_URL ?>">home</a></li>
                                    <li><a href="<?php echo BASE_URL ?>/shop">shop</a></li>
                                    <li><a href="#">purchase order</a></li>
                                    <li><a href="#">about</a></li>
                                    <li><a href="<?php echo BASE_URL ?>/contact">contact</a></li>
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


        <!-- Hamburger Menu -->

        <div class="hamburger_menu">
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    <li class="menu_item has-children">
                        <a href="#">
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
                            <ul class="menu_selection">
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
                            <ul class="menu_selection">
                                <li><a href="<?php echo BASE_URL ?>/login" onclick="onLogin()"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                        Login</a></li>
                                <li><a href="#" onclick="onRegister()"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                        Register</a>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>

                    </li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>">home</a></li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>/shop">shop</a></li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>">purchase order</a></li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>">about</a></li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>/contact">contact</a></li>
                </ul>
            </div>
        </div>
        <script>
            let btnAcc = document.getElementById('prevent-default');
            btnAcc.addEventListener('click', (e) => {
                e.preventDefault();
            })
        </script>
        <div class="fs_menu_overlay"></div>