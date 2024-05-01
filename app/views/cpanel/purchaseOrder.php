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
                                    <td><a href="#" data-id="<?php echo $order['id'] ?>" class="btn btn_detail">View Details</a></td>
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
                if (confirm("Are you sure you want to delete this product in your cart?")) {
                    $.ajax({
                        url: base_url + '/purchaseOrder/cancelOrder',
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            orderId: orderId
                        },
                        success: function(response) {
                            $row.remove();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        }

        $(document).ready(function() {
            eventHandler();
        });
    </script>
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
</div>