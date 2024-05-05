<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include('../includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">
                    <h4>Orders</h4>
                </div>
                <div class="card-body table-responsive" id="">
                    <table class="table table-bordered table-striped align-items-center mb-0 table-shopping" style="display: block; height: 500px; overflow-y: scroll;width: 100%;table-layout:auto;">
                        <thead style="position: sticky; top: -0.1px; background: white;z-index: 10;">
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Resipient Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getAllOrders();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['user_id']; ?> </td>
                                        <td style="min-width:17.3rem;"> <?= $item['resipient_name']; ?> </td>
                                        <td style="min-width:17.3rem;"> <?= $item['create_at']; ?> </td>
                                        <td style="min-width:17.3rem;">
                                            <?php
                                            switch ($item['id_order_status']) {
                                                case '1':
                                                    echo "Chờ duyệt";
                                                    break;
                                                case '4':
                                                    echo "Hủy đơn";
                                                    break;
                                                case '5':
                                                    echo "Đang giao";
                                                    break;
                                                case '6':
                                                    echo "Thành công";
                                                    break;
                                                default:
                                                    echo "Trạng thái không xác định";
                                            };
                                            ?>
                                        </td>
                                        <td>
                                            <a href="view-order.php?id=<?= $item['id']; ?>" class="btn btn-primary">View Details</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>