<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include ('../includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">
                    <h3>Products
                        <a href="add-product.php" class="btn btn-primary float-end"><i class="material-icons opacity-10">add</i>Add Products</a>
                    </h3>
                </div>
                <div class="card-body table-responsive" id="products_table">
                    <table class="table table-bordered table-striped align-items-center mb-0 table-shopping" style="display: block; height: 500px; overflow-y: scroll;width: 100%;table-layout:auto;">
                        <thead style="position: sticky; top: -0.1px; background: white;z-index: 10;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = getAll("products");

                                if(mysqli_num_rows($products) > 0)
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id'];?> </td>
                                                <td> <?= $item['name'];?> </td>
                                                <td style="min-width:12.9rem;">
                                                    <img src="../../upload/images/<?= $item['img']; ?>" width="50px" height="50px" alt="<?= $item['name'];?>">
                                                </td>
                                                <td style="min-width:10rem;"> 
                                                    <?= $item['status'] == '0'? "Hidden":"Visible" ?>
                                                </td>
                                                <td style="min-width:10rem;">
                                                    <a href="edit-product.php?id=<?= $item['id'];?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td style="min-width:10rem;">
                                                        <button type="button" class="btn btn-danger delete_product_btn" value="<?= $item['id'];?>" >Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
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
</div>
<script>$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();</script>

<?php include ('../includes/footer.php'); ?>