<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include('../includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product Sizes
                        <a href="product-sizes.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="../controllers/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Select Product</label>
                                <select name="product_id" class="form-select mb-2">
                                    <option selected> Select Product</option>
                                    <?php
                                    $product = getAll("products");

                                    if (mysqli_num_rows($product) > 0) {
                                        foreach ($product as $item) {
                                    ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No products available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0"> Select Size</label>
                                <select name="size_id" class="form-select mb-2">
                                    <option selected> Select Size</option>
                                    <?php
                                    $sizes = getAll("sizes");

                                    if (mysqli_num_rows($sizes) > 0) {
                                        foreach ($sizes as $item) {
                                    ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No sizes available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Quantity</label>
                                <input type="text" required name="quantity" placeholder="Enter Quantity" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2" name="add_product_sizes_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('../includes/footer.php'); ?>