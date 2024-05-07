<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include ('../includes/header.php');

if(isset($_GET['id']))
{
    $order_id = $_GET['id'];

    $orderData = checkIdNoValid($order_id);
    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
            <h4>Something went wrong</h4>
        <?php
        die();
    }
}
else
{
    ?>
        <h4>Something went wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($orderData);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <span class="text-white fs-3"> View Order</span>
                    <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"> </i> Back </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delivery Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">ID</label>
                                    <div class="border p-1">
                                        <?= $data['id']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">User ID</label>
                                    <div class="border p-1">
                                        <?= $data['user_id']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Resipient Name</label>
                                    <div class="border p-1">
                                        <?= $data['resipient_name']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Resipient Phone Number</label>
                                    <div class="border p-1">
                                        <?= $data['resipient_phonenumber']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Delivery Address</label>
                                    <div class="border p-1">
                                        <?= $data['delivery_address']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Note</label>
                                    <div class="border p-1">
                                        <?= $data['note']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $order_query = "SELECT `o`.`id` AS `oid`, `o`.`id_order_status`, `od`.*, `p`.* 
                                        FROM `order` AS `o`, `order_detail` AS `od`, `products` AS `p` 
                                        WHERE `od`.`order_id` = `o`.`id` AND `p`.`id` = `od`.`product_id` AND `o`.`id` = '$order_id'";

                                        $order_query_run = mysqli_query($con, $order_query);
                                        
                                        if(mysqli_num_rows($order_query_run) > 0)
                                        {
                                            foreach($order_query_run as $item)
                                            {
                                                ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="../../upload/images/<?= $item['img']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                        <?= $item['name']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        $<?= $item['total']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?= $item['quantity']; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <hr>
                            <h5>Total Price : 
                                <span class="float-end fw-bold">
                                    <?php
                                        $totalPrice = 0;
                                        foreach($order_query_run as $item)
                                        {
                                            $totalPrice += $item['total'];
                                        }
                                    ?>
                                    $<?= $totalPrice ?>
                                </span>
                            </h5>
                            <hr>
                            <label class="fw-bold">Payment Method</label>
                            <div class="border p-1 mb-3">
                                <?= $data['payment_method'] ?>
                            </div>
                            <label class="fw-bold">Status</label>
                            <div class="mb-3">
                                <form action="../controllers/code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>" >
                                    <select name="order_status" id="" class="form-select">
                                        <option value="1" <?= $data['id_order_status'] == '1'?"selected":"" ?>>Chờ duyệt</option>
                                        <option value="4" <?= $data['id_order_status'] == '4'?"selected":"" ?>>Hủy đơn</option>
                                        <option value="5" <?= $data['id_order_status'] == '5'?"selected":"" ?>>Đang giao</option>
                                        <option value="6" <?= $data['id_order_status'] == '6'?"selected":"" ?>>Thành công</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2 float-end" name="update_order_btn">Update Status</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../includes/footer.php'); ?>