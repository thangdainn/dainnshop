<?php

include('../middleware/adminMiddleware.php');
include ('../includes/header.php');
include('../models/adminconfig.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">
                    <h3>Categories
                        <a href="add-category.php" class="btn btn-primary float-end"><i class="material-icons opacity-10">add</i>Add Category</a>
                    </h3>
                    
                </div>
                <div class="card-body table-responsive" id="category_table">
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
                                $category = getAll("categories");

                                if(mysqli_num_rows($category) > 0)
                                {
                                    foreach($category as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td style="min-width:10.1rem;"> <?= $item['id'];?> </td>
                                                <td style="min-width:18.3rem;"> <?= $item['name'];?> </td>
                                                <td style="min-width:12.9rem;">
                                                    <img src="../../upload/images/<?= $item['image'];?>" width="50px" height="50px" alt="<?= $item['name'];?>">
                                                </td>
                                                <td style="min-width:10rem;"> 
                                                    <?= $item['status'] == '0'? "Hidden":"Visible" ?>
                                                </td>
                                                <td style="min-width:10rem;">
                                                    <a href="edit-category.php?id=<?= $item['id'];?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <?php
                                                    if($item['status'] == 0)
                                                    {
                                                        ?>
                                                        <td style="min-width:10rem;">
                                                            <!-- <form action="code.php" method="POST">
                                                                <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                                                                <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                                            </form> -->
                                                            <button type="button" class="btn btn-danger delete_category_btn" value="<?= $item['id'];?>" style="  pointer-events: none;cursor: not-allowed;opacity: 0.65;filter: alpha(opacity=65);-webkit-box-shadow: none;box-shadow: none;">Delete</button>
                                                        </td>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <td style="min-width:10rem;">
                                                            <!-- <form action="code.php" method="POST">
                                                                <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                                                                <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                                            </form> -->
                                                            <button type="button" class="btn btn-danger delete_category_btn" value="<?= $item['id'];?>" >Delete</button>
                                                        </td>
                                                        <?php
                                                    }
                                                ?>
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