<?php

?>
<input type="hidden" id="user-id" value="<?php echo Session::getUserId();
                                            ?>">

<div class="container purchaseOrder_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Home</a></li>
                    <li class="active"><a href="<?php echo BASE_URL ?>/purchaseOrder"><i class="fa fa-angle-right" aria-hidden="true"></i>Purchase Order</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="order_list">

                <div class="order_status_list d-flex justify-content-around">
                    <div class="order_status_item">
                        <a href="#" class="order_status_link order_status_link--current" data-order-status-id="0">All</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="1">To Confirm</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="5">To Ship</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="6">Completed</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="4">Cancelled</a>
                    </div>
                </div>

                <?php if (!empty($orders)) {
                ?>

                    <table class="order-table table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Resipient Name</th>
                                <th scope="col">Resipient Phone</th>
                                <th scope="col">Delivery Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orders as $order) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $order['id'] ?></th>
                                    <td><?php echo $order['resipient_name'] ?> </td>
                                    <td><?php echo $order['resipient_phonenumber'] ?></td>
                                    <td><?php echo $order['delivery_address'] ?></td>
                                    <td class="actions"><a href="#" data-id="<?php echo $order['id'] ?>" class="btn btn_detail">View Details</a>
                                        <?php
                                        if ($order['id_order_status'] == 1) {
                                        ?>
                                            <a href="#" data-id="<?php echo $order['id'] ?>" class="btn btn_cancel">Cancel</a>
                                        <?php
                                        }
                                        if ($order['id_order_status'] == 6) {
                                        ?>
                                            <a href="#" data-id="<?php echo $order['id'] ?>" class="btn btn_review">Cancel</a>
                                        <?php
                                        }
                                        ?>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <span class="order_none">No cart here</span>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function eventHandler() {

            // Sự kiện khi click vào các nút chọn trạng thái đơn hàng
            $('.order_status_link').click(function(e) {
                e.preventDefault();

                $('.order_status_link').removeClass('order_status_link--current');

                $(this).addClass('order_status_link--current');

                var userId = $('#user-id').val()
                var orderStatusId = $(this).data('order-status-id');
                console.log(orderStatusId)

                $.ajax({
                    url: base_url + '/purchaseOrder/orderByStatus',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        orderStatusId: orderStatusId,
                        userId: userId
                    },
                    success: function(response) {
                        $('.order-table tbody').html(response)
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Sự kiện hiển thị chi tiết sản phẩm 
            $(document).on('click', '.btn_detail', function(e) {
                e.preventDefault();

                var orderId = $(this).data('id');
                console.log(orderId)

                $.ajax({
                    url: base_url + '/purchaseOrder/orderDetail',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        orderId: orderId
                    },
                    success: function(response) {
                        console.log(response);
                        console.log($('.modal .detail-table tbody'));
                        $('.modal .detail-table tbody').html(response);


                        $('.modal').show();
                    },
                    error: function(xhr, status, error) {

                        console.error(error);
                    }
                });
            });

            // Sự kiện ẩn modal khi click vào nút x
            $('.detail-layout__x-button').click(function() {

                $('.modal').hide();
            });

            // Sự kiện khi ấn vào nút cancel 
            $(document).on('click', '.btn_cancel', function(e) {
                e.preventDefault();
                var orderId = $(this).data('id');
                var $row = $(this).closest('tr');
                var $button = $(this);
                Swal.fire({
                    title: "Are you sure you want to cancel this cart?",
                    showDenyButton: true,
                    // showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: base_url + '/purchaseOrder/cancelOrder',
                            type: 'POST',
                            dataType: 'html',
                            data: {
                                orderId: orderId
                            },
                            success: function(response) {
                                $button.remove();
                                Swal.fire("Saved!", "", "success");

                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });

                    }
                });
            });

            var orderIdReview;

            $(document).on('click', '.btn_review', function(e) {
                e.preventDefault();
                orderIdReview = $(this).data('id');

                $.ajax({
                    url: base_url + '/purchaseOrder/showReview',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        orderId: orderIdReview
                    },
                    success: function(response) {
                        console.log(response);
                        $('#reviewForm').html(response);


                        $('.modal__review').show();
                    },
                    error: function(xhr, status, error) {

                        console.error(error);
                    }
                });
            });



            // Sự kiện ẩn modal review khi nhấp vào nút x
            $('.review-layout__x-button').click(function() {
                console.log('click');
                $('.modal__review').hide();
            });

            var rating = 0;
            $(document).on('click', '.star-rating input', function() {
                var index = $('.star-rating input').index(this);
                $('.star-rating label').each(function(labelIndex) {
                    $(this).css('color', labelIndex <= index ? '#ffe400' : '#838383');
                });
                rating = index + 1;
                console.log(rating);
            });


            $('#reviewForm').submit(function() {
                var comment = $('#comment').val();
                var userId = $('#user-id').val();
                var productId = $('#productSelected').val();
                var orderId = orderIdReview;

                $.ajax({
                    url: base_url + '/purchaseOrder/review',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        productId: productId,
                        userId: userId,
                        orderId: orderId,
                        star: rating,
                        message: comment
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Review Success!",
                            text: "Click ok to exit",
                            icon: "success"
                        });
                        console.log(response);
                        $('.modal__review').hide();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
                return false;
            })
        }


        $(document).ready(function() {
            eventHandler();
        });
    </script>
    <!-- Modal Order Detail -->
    <div class="modal">
        <div class="modal__overlay">
        </div>
        <div class="modal__body">
            <div class="detail-layout">
                <div class="detail-layout__container">
                    <div class="detail-layout__header">
                        <i class="detail-layout__icon fa fa-clipboard"></i>
                        <h3 class="detail-layout__heading">Order Details</h3>
                        <div class="detail-layout__x-button">
                            <i class="detail-layout__x-icon fa fa-close"></i>
                        </div>
                    </div>
                    <div class="detail-layout__form">
                        <table class="table detail-table">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Review -->
    <div class="modal__review">
        <div class="modal__review__overlay">

        </div>
        <div class="modal__review__body">
            <div class="review-layout">
                <div class="review-layout__container">
                    <div class="review-layout__header">
                        <i class="review-layout__icon fa fa-star"></i>
                        <h3 class="review-layout__heading">Review Product</h3>
                        <div class="review-layout__x-button">
                            <i class="review-layout__x-icon fa fa-close"></i>
                        </div>
                    </div>
                    <div class="review-layout__form">
                        <form id="reviewForm">
                            <!-- <label for="rating">Rating (0-5):</label>
                            <div class="star-rating">
                                <input type="radio" name="rating1" id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" name="rating2" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" name="rating3" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" name="rating4" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" name="rating5" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                            <label for="comment">Comment:</label>
                            <textarea class="commentInput" id="comment" name="comment"></textarea>
                            <button class="btn btn_review_submit" type="submit">Review</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>