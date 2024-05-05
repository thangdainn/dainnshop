<?php
include('../middleware/adminMiddleware.php');
include ('../includes/header.php');
include('../models/adminconfig.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Brands
                        <a href="add-brand.php" class="btn btn-primary float-end"><i class="material-icons opacity-10">add</i>Add Brand</a>
                    </h3>
                </div>
                <div class="card-body" id="brand_table">
                    <table class="table table-bordered table-striped">
                        <thead>
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
                                $brand = getAll("brands");

                                if(mysqli_num_rows($brand) > 0)
                                {
                                    foreach($brand as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id'];?> </td>
                                                <td> <?= $item['name'];?> </td>
                                                <td>
                                                    <img src="../../upload/images/<?= $item['image'];?>" width="50px" height="50px" alt="<?= $item['name'];?>">
                                                </td>
                                                <td> 
                                                    <?= $item['status'] == '0'? "Hidden":"Visible" ?>
                                                </td>
                                                <td>
                                                    <a href="edit-brand.php?id=<?= $item['id'];?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <!-- <form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                                                        <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                                    </form> -->
                                                    <button type="button" class="btn btn-danger delete_brand_btn" value="<?= $item['id'];?>" >Delete</button>
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

<?php include ('../includes/footer.php'); ?>