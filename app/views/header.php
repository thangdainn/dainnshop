<?php
if (session_status() == PHP_SESSION_NONE) {
    Session::init();
}

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
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/elegant/elegant-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/Magnific-popup/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/user/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/styles/header.css">
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
    } elseif (strpos($currentURL, '/cart') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/cart_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/cart_responsive.css">';
    } elseif (strpos($currentURL, '/purchaseOrder') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/purchaseOrder_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/purchaseOrder_responsive.css">';
        
    } elseif (strpos($currentURL, '/user') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/profile_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/contact_responsive.css">';
    } elseif (strpos($currentURL, '/index') !== false || strpos($currentURL, '/') !== false) {
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/main_styles.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/public/user/styles/responsive.css">';
    }
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/user/styles/footer.css">

    <script src="<?php echo BASE_URL ?>/public/user/js/jquery-3.2.1.min.js"></script>

</head>

<body>
    <!-- Page Preloder -->

    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">free shipping on all orders</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- My Account -->

                                    <li class="account" style="min-width: 162px">
                                        <a href="" class="prevent-default d-flex justify-content-center align-items-center">

                                            <?php
                                            if (Session::isLogin()) {
                                                $image = Session::getImg();
                                                $fullName = Session::getFullName();
                                            ?>
                                                <div class="avatar d-flex justify-content-center align-items-center">
                                                    <img src="<?php echo BASE_URL ?>/upload/<?php echo $image ?>" alt="">
                                                </div>
                                                <span class="full-name"><?php echo $fullName ?></span>
                                            <?php
                                            } else {
                                            ?>
                                                <i class="fa fa-user-circle" style="margin-right: 8px; font-size: 19px"></i>
                                                <span>Account</span>
                                            <?php
                                            }
                                            ?>

                                        </a>
                                        <?php
                                        if (Session::isLogin()) {
                                            $userId = Session::getUserId();
                                        ?>
                                            <ul class="account_selection">
                                                <li><a href="<?php echo BASE_URL . '/user/profile/' . $userId ?>"><i class=" fa fa-user" aria-hidden="true"></i>
                                                        Information</a>
                                                </li>

                                                <li><a href="<?php echo BASE_URL ?>/login/logout"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                        Logout</a>
                                                </li>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <ul class="account_selection">
                                                <li><a href="<?php echo BASE_URL ?>/login"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                                        Login</a></li>
                                                <li><a href="<?php echo BASE_URL ?>/login?register"><i class="fa fa-user-plus" aria-hidden="true"></i>
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
                                    <li>
                                        <?php
                                        if (Session::isLogin()) {
                                        ?>
                                            <a href="<?php echo BASE_URL ?>/purchaseOrder">purchase order</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?php echo BASE_URL ?>/login">purchase order</a>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                    <li><a href="#">about</a></li>
                                    <li><a href="<?php echo BASE_URL ?>/contact">contact</a></li>
                                </ul>
                                <ul class="navbar_user" style="display: flex; align-items: center;">
                                    <div class="search">
                                        <form id="formSubmit" action="<?php echo BASE_URL ?>/shop" method="get">
                                            <?php
                                            if (isset($_GET['keyword'])) {
                                            ?>
                                                <input value="<?php echo $_GET['keyword'] ?>" type="text" id="search" name="keyword" autocomplete="off" placeholder="Search...">
                                            <?php
                                            } else {
                                            ?>
                                                <input type="text" id="search" name="keyword" autocomplete="off" placeholder=" Search...">
                                            <?php
                                            }
                                            ?>

                                            <li>
                                                <a href="" id="btn_search"><i class="fa fa-search" aria-hidden="true"></i></a>
                                            </li>
                                        </form>

                                    </div>
                                    <!-- <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li> -->
                                    <li class="checkout">
                                        <a href="<?php echo BASE_URL ?>/cart">
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
                                echo $fullName;
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
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>/purchaseOrder">purchase order</a></li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>/about">about</a></li>
                    <li class="menu_item"><a href="<?php echo BASE_URL ?>/contact">contact</a></li>
                </ul>
            </div>
        </div>
        <script>
            var base_url = "<?php echo BASE_URL ?>";
            $(".prevent-default").on("click", function(e) {
                e.preventDefault();
            })

            $("#btn_search").on("click", function(e) {
                e.preventDefault()
                $("#formSubmit").submit();
            })
            $(window).on('load', function() {
                $(".loader").fadeOut();
                $("#preloder").delay(200).fadeOut("slow");

            });
        </script>
        <div class="fs_menu_overlay"></div>