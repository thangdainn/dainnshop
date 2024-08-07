<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
$user = $_SESSION['auth_user']['fullname'];
$role_id = $_SESSION['role_id'];
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../views/index.php">
            <span class="ms-0 font-weight-bold text-white">DAINNSHOP ADMIN
                <br>
                <p>User: <?= $user ?></p>

            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "index.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">DASHBOARD</span>
                </a>
            </li>
            <?php
            if ($role_id == 3 || $role_id == 8) {
            ?>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "orders.php" || $page == "view-order.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/orders.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Orders</span>
                    </a>
                </li>
            <?php
            }
            if ($role_id == 8) {
            ?>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "role.php" || $page == "add-role.php" || $page == "edit-role.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/role.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Roles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "user.php" || $page == "add-user.php" || $page == "edit-user.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/user.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "category.php" || $page == "add-category.php" || $page == "edit-category.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/category.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "brand.php" || $page == "add-brand.php" || $page == "edit-brand.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/brand.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Brands</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "size.php" || $page == "add-size.php" || $page == "edit-size.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/size.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Sizes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "products.php" || $page == "add-product.php" || $page == "edit-product.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/products.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "product-sizes.php" || $page == "add-product-size.php" || $page == "edit-product-size.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/product-sizes.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Management Variable</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "statistical.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/statistical.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Revenue Statistics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "statisticalTopSale.php" ? 'active bg-gradient-primary' : ''; ?>" href="../views/statisticalTopSale.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Statistics Top Sales</span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="../controllers/logout.php" type="button"> Logout </a>
        </div>
    </div>
</aside>