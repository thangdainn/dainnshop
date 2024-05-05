<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include ('../includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['pid']) && isset($_GET['sid']))
                {
                    $product_id = $_GET['pid'];
                    $size_id = $_GET['sid'];

                    $product_sizes = getBy2ID('products_size', $product_id, $size_id);

                    if(mysqli_num_rows($product_sizes) > 0)
                    {
                        $data = mysqli_fetch_array($product_sizes);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Product Sizes
                                        <a href="product-sizes.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="../controllers/code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="mb-0">Product Name</label>
                                                <div class="border p-1 mb-3">
                                                    <?php
                                                        $products = getAll("products");
                
                                                        if(mysqli_num_rows($products) > 0)
                                                        {
                                                            foreach($products as $item)
                                                            {
                                                                if($data['product_id'] == $item['id'])
                                                                {
                                                                    echo $item['name'];
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "No Products available";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Product Size</label>
                                                <div class="border p-1 mb-3">
                                                    <?php
                                                        $sizes = getAll("sizes");
                
                                                        if(mysqli_num_rows($sizes) > 0)
                                                        {
                                                            foreach($sizes as $item)
                                                            {
                                                                if($data['size_id'] == $item['id'])
                                                                {
                                                                    echo $item['name'];
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "No Sizes available";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Quantity</label>
                                                <input type="text" required name="quantity" value="<?= $data['quantity']; ?>" placeholder="Enter Quantity" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_product_sizes_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo "Category not found";
                    }
                }
                else
                {
                    echo "ID missing from url";
                }
            ?>
        </div>
    </div>
</div>
</div>

<?php include ('../includes/footer.php'); ?>