<?php

?>
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
                        <a href="#" class="order_status_link" data-order-status-id="all">All</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="1">To Confirm</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="2,3,5">To Ship</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="6">Completed</a>
                    </div>
                    <div class="order_status_item">
                        <a href="#" class="order_status_link" data-order-status-id="4">Cancelled</a>
                    </div>

                    <script>
                        $(document).ready(function() {
                
                            $('.order_status_link').click(function(e) {
                                e.preventDefault(); 

                                $('.order_status_link').removeClass('order_status_link--current');

                                $(this).addClass('order_status_link--current');


                                var orderStatusId = $(this).data('order-status-id');


                                var url = "app/controllers/purchaseOrder.php";
                                console.log(url);
                                $.ajax({
                                    url: url,
                                    method: 'POST',
                                    data: {
                                        orderStatusId: orderStatusId
                                    },
                                    success: function(response) {
                                        console.log(response);   
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Js dùng để chuyển màu order status -->
                    <!-- <script>
                        document.querySelectorAll('.order_status_link').forEach(link => {
                            link.addEventListener('click', function(event) {
                                event.preventDefault();
                               
                                document.querySelectorAll('.order_status_link--current').forEach(otherLink => {
                                    otherLink.classList.remove('order_status_link--current');
                                });
                                
                                this.classList.add('order_status_link--current');
                            });
                        });
                    </script> -->
                </div>



                <?php if (!empty($orders)) {
                    echo '<table class="table mt-5">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">#</th>';
                    echo '<th scope="col">Resipient Name</th>';
                    echo '<th scope="col">Resipient Phone</th>';
                    echo '<th scope="col">Delivery Address</th>';
                    echo '<th scope="col">Action</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    foreach ($orders as $order) {
                        echo '<tr>';
                        echo '<th scope="row">' . $order['id'] . '</th>';
                        echo '<td>' . $order['resipient_name'] . '</td>';
                        echo '<td>' . $order['resipient_phonenumber'] . '</td>';
                        echo '<td>' . $order['delivery_address'] . '</td>';
                        echo '<td><a href="#" class="btn btn_detail">View Details</a></td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '
                    <span class="order_none">Không có đơn hàng cho người dùng</span>
                    ';
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>