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
                        <li class="active"><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>All</a></li>

                        <?php
                        foreach ($categories as $key => $cate) {
                        ?>
                            <li><a href="#"><?php echo $cate['name'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- Price Range Filtering -->


                <!-- Brands -->
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <a>
                            Brands
                            <i class="fa fa-chevron-down"></i>

                        </a>
                    </div>
                    <ul class="checkboxes collapse show showItem">
                        <?php
                        foreach ($brands as $key => $brand) {
                        ?>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span><?php echo $brand['name'] ?></span></li>
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
                    <ul class="checkboxes collapse show showItem">
                        <?php
                        foreach ($sizes as $key => $size) {
                        ?>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span><?php echo $size['name'] ?></span></li>
                        <?php
                        }
                        ?>
                    </ul>
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
                                <ul class="product_sorting">
                                    <li>
                                        <span class="type_sorting_text">Default Sorting</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_type">
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                        </ul>
                                    </li>
                                    <!-- <li>
                                        <span>Show</span>
                                        <span class="num_sorting_text">6</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn"><span>6</span></li>
                                            <li class="num_sorting_btn"><span>12</span></li>
                                            <li class="num_sorting_btn"><span>24</span></li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <!-- <div class="pages d-flex flex-row align-items-center">
                                    <div class="page_current">
                                        <span>1</span>
                                        <ul class="page_selection">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                        </ul>
                                    </div>
                                    <div class="page_total"><span>of</span> 3</div>
                                    <div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                </div> -->

                            </div>

                            <!-- Product Grid -->

                            <div class="row product-container" style="margin: 40px 0px;">

                                <!-- Products -->
                                <?php
                                foreach ($products as $key => $product) {
                                ?>
                                    <div class="product-item">
                                        <div class="product discount product_filter">
                                            <div class="product_image">
                                                <img src="<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>" alt="">
                                            </div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="<?php echo BASE_URL ?>/product/detail/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h6>
                                                <div class="product_price"><?php echo ($product['price'] - $product['sale']) ?><span><?php echo $product['price'] ?></span></div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>
                                <?php
                                }
                                ?>
                                <input type="hidden" id="page" name="page" value="1">
                                <input type="hidden" id="totalPage" value="<?php echo $totalPage ?>">
                            </div>

                            <a id="loadPage" href="#product-container"></a>
                            <input type="hidden" id="keyword" name="keyword">
                            <input type="hidden" id="categoryCode" name="categoryCode">
                            <ul class="pagination justify-content-center" id="pagination" style="margin-top: 20px;"></ul>


                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let page = $('#page').val();
    let totalPage = $('#totalPage').val();
    totalPage = parseInt(totalPage);
    let currentPage = parseInt(page);
    $(function() {
        window.pagObj = $('#pagination').twbsPagination({
            totalPages: totalPage,
            visiblePages: 5,
            startPage: currentPage,
            onPageClick: function(event, page) {
                if (page !== currentPage) {
                    $('#page').val(page - 1);
                    let data = {
                        page: page - 1,
                        limit: 16
                    };
                    autoClickTagA()
                    currentPage = page;
                    paging(data);
                }
            }
        })
    });

    function autoClickTagA() {
        var link = document.getElementById("loadPage");
        var clickEvent = new MouseEvent("click", {
            "view": window,
            "bubbles": true,
            "cancelable": false
        });
        link.dispatchEvent(clickEvent);
    }

    function paging(data) {
        let url = '<?php echo BASE_URL ?>/product/paging';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            data: data,
            success: function(data) {
                $('.product-container').empty();
                $('.product-container').html(data);

            },
            error: function() {

            }
        })
    }
</script>