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
                    <h3>Product Sizes
                        <a href="add-product-sizes.php" class="btn btn-primary float-end"><i class="material-icons opacity-10">add</i>Add Sizes</a>
                    </h3>
                </div>
                <div class="card-body table-responsive" id="product_sizes_table">
                    <table class="table table-bordered table-striped align-items-center mb-0 table-shopping" style="display: block; height: 500px; overflow-y: scroll;width: 100%;table-layout:auto;">
                        <thead style="position: sticky; top: -0.1px; background: white;z-index: 10;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product_sizes_query = "SELECT ps.*, p.name AS pname, p.img AS pimg, s.name AS sname
                                FROM products_size AS ps
                                LEFT JOIN products AS p ON ps.product_id = p.id
                                LEFT JOIN sizes AS s ON ps.size_id = s.id";

                            $product_sizes_query_run = mysqli_query($con, $product_sizes_query);

                            if (mysqli_num_rows($product_sizes_query_run) > 0) {
                                foreach ($product_sizes_query_run as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['product_id']; ?> </td>
                                        <td style="min-width:25.3rem;"> <?= $item['pname']; ?> </td>
                                        <td style="min-width:17.3rem;">
                                            <img src="../../upload/images/<?= $item['pimg']; ?>" width="50px" height="50px" alt="<?= $item['pname']; ?>">
                                        </td>
                                        <td style="min-width:8.3rem;"> <?= $item['sname']; ?> </td>

                                        <td style="min-width:8.3rem;"> <?= $item['quantity']; ?> </td>
                                        <td style="min-width:8.3rem;">
                                            <a href="edit-product-sizes.php?pid=<?= $item['product_id']; ?>&sid=<?= $item['size_id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('../includes/footer.php'); ?>