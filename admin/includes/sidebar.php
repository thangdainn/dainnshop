<?php
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../views/index.php">
            <span class="ms-1 font-weight-bold text-white">PHP ECOM</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "index.php"? 'active bg-gradient-primary':''; ?>" href="../views/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">DASHBOARD</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "category.php"? 'active bg-gradient-primary':''; ?>" href="../views/category.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                <span class="nav-link-text ms-1">All Categories</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-white <?= $page == "add-category.php"? 'active bg-gradient-primary':''; ?>" href="../views/add-category.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                <span class="nav-link-text ms-1">Add Category</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "brand.php"? 'active bg-gradient-primary':''; ?>" href="../views/brand.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                <span class="nav-link-text ms-1">All Brands</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-white <?= $page == "add-brand.php"? 'active bg-gradient-primary':''; ?>" href="../views/add-brand.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                <span class="nav-link-text ms-1">Add Brand</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "products.php"? 'active bg-gradient-primary':''; ?>" href="../views/products.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                <span class="nav-link-text ms-1">All Products</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-white <?= $page == "add-product.php"? 'active bg-gradient-primary':''; ?>" href="../views/add-product.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                <span class="nav-link-text ms-1">Add Products</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "product-sizes.php"? 'active bg-gradient-primary':''; ?>" href="../views/product-sizes.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                <span class="nav-link-text ms-1">All Product Sizes</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-white <?= $page == "add-product-sizes.php"? 'active bg-gradient-primary':''; ?>" href="../views/add-product-sizes.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                <span class="nav-link-text ms-1">Add Product Sizes</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "orders.php"? 'active bg-gradient-primary':''; ?>" href="../views/orders.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="../controllers/logout.php" type="button"> Logout </a>
        </div>
    </div>
</aside>