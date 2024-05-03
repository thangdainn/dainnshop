<?php
include ('../middleware/adminMiddleware.php');
include ('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product Sizes</h4>
                </div>
                <div class="card-body" id="product_sizes_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $product_sizes_query = "SELECT ps.*, p.name AS pname, p.img AS pimg, s.name AS sname
                                FROM products_size AS ps
                                LEFT JOIN products AS p ON ps.product_id = p.id
                                LEFT JOIN sizes AS s ON ps.size_id = s.id";

                                $product_sizes_query_run = mysqli_query($con, $product_sizes_query);
                                
                                if(mysqli_num_rows($product_sizes_query_run) > 0)
                                {
                                    foreach($product_sizes_query_run as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['product_id'];?> </td>
                                                <td> <?= $item['pname'];?> </td>
                                                <td>
                                                    <img src="../upload/images/<?= $item['pimg']; ?>" width="50px" height="50px" alt="<?= $item['pname'];?>">
                                                </td>
                                                <td> <?= $item['sname'];?> </td>

                                                <td> <?= $item['quantity'];?> </td>
                                                <td>
                                                    <a href="edit-product-sizes.php?pid=<?= $item['product_id'];?>&sid=<?= $item['size_id'];?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete_product_sizes_btn" 
                                                            value="<?= $item['product_id']; ?>|<?= $item['size_id'];?>"
                                                            name="delete_product_sizes_btn">Delete</button>
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

<?php include ('includes/footer.php'); ?>