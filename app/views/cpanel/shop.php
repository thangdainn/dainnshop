<div id="product-container" class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Home</a></li>
                    <li class="active"><a href="<?php echo BASE_URL ?>/shop"><i class="fa fa-angle-right" aria-hidden="true"></i>Shop</a></li>
                </ul>
            </div>

            <!-- Sidebar -->

            <div class="sidebar">
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <a>
                            Category
                            <i class="fa fa-chevron-down"></i>

                        </a>
                    </div>
                    <ul class="sidebar_categories collapse show showItem">
                        <li class="active" data-value="0"><a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>All</a></li>

                        <?php
                        foreach ($categories as $key => $cate) {
                        ?>
                            <li data-value="<?php echo $cate['id'] ?>"><a><?php echo $cate['name'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>



                <!-- Brands -->
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <a>
                            Brands
                            <i class="fa fa-chevron-down"></i>

                        </a>
                    </div>
                    <ul class="checkboxes brands collapse show showItem">
                        <?php
                        foreach ($brands as $key => $brand) {
                        ?>
                            <li data-value="<?php echo $brand['id'] ?>"><i class="fa fa-square-o" aria-hidden="true"></i><span><?php echo $brand['name'] ?></span></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- Sizes -->
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <a>
                            Sizes
                            <i class="fa fa-chevron-down"></i>

                        </a>
                    </div>
                    <ul class="checkboxes sizes collapse show showItem">
                        <?php
                        foreach ($sizes as $key => $size) {
                        ?>
                            <li data-value="<?php echo $size['id'] ?>"><i class="fa fa-square-o" aria-hidden="true"></i><span><?php echo $size['name'] ?></span></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- Price Range Filtering -->
                <div class="sidebar_section">
                    <div class="sidebar_title" style="cursor: default;">
                        <h5>Filter by Price</h5>
                    </div>
                    <p>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range"></div>
                    <div class="filter_button"><span>filter</span></div>
                </div>
            </div>

            <!-- Main Content -->

            <div class="main_content">

                <!-- Products -->

                <div class="products_iso">
                    <div class="row">
                        <div class="col">

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_top">
                                <ul class="product_sorting d-flex justify-content-between">
                                    <li>
                                        <span class="type_sorting_text">Default Sorting</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_type">
                                            <li class="type_sorting_btn"><span>Default Sorting</span></li>
                                            <li class="type_sorting_btn"><span>Latest</span></li>
                                            <li class="type_sorting_btn"><span>Price: Low to Hight</span></li>
                                            <li class="type_sorting_btn"><span>Price: Hight to Low</span></li>
                                        </ul>
                                    </li>
                                    <li style="width: 123px;">
                                        <span>Show</span>
                                        <span id="limit" class="num_sorting_text" style="margin-left: 23px;">12</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn"><span>12</span></li>
                                            <li class="num_sorting_btn"><span>16</span></li>
                                            <li class="num_sorting_btn"><span>20</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <!-- Product Grid -->

                            <div class="row product-container justify-content-start" style="margin: 40px 0px;">

                                <!-- Products -->
                                <?php
                                if (empty($products)) {
                                    echo "<h5>No products found.</h5>";
                                } else {
                                    foreach ($products as $key => $product) {
                                        
                                ?>
                                        <div data-value="<?php echo $product['id'] ?>" class="product-item">
                                            <div class="product product_filter">
                                                <div class="product_image">
                                                    <img src="<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>" loading="lazy" alt="">
                                                </div>
                                                <?php
                                                if ($product['type'] == "sale") {
                                                ?>
                                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name"><?php echo $product['name'] ?></h6>
                                                        <div class="product_price">$<?php echo $product['sale'] ?><span>$<?php echo $product['price'] ?></span></div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    if ($product['type'] == "new") {
                                                    ?>
                                                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="product_info">
                                                        <h6 class="product_name"><?php echo $product['name'] ?></h6>
                                                        <div class="product_price">$<?php echo $product['price'] ?></div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <input type="hidden" id="totalPage" value="<?php echo $totalPage ?>">
                            </div>
                            <div id="paging">
                                <ul class="pagination justify-content-center" id="pagination"></ul>
                            </div>

                            <?php
                            if (isset($_GET['keyword'])) {
                            ?>
                                <input type="hidden" id="keyword" value="<?php echo $_GET['keyword'] ?>">
                            <?php
                            } else {
                            ?>
                                <input type="hidden" id="keyword" value="">
                            <?php
                            }
                            ?>
                            <!-- <input type="hidden" id="limit" value="12"> -->

                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var url_page = base_url + "/product/paging";
</script>