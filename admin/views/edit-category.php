<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include ('../includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $category = getByID('categories', $id);

                    if(mysqli_num_rows($category) > 0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Category
                                        <a href="category.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="../controllers/code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter Category Name" class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Upload Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <label for="">Current Image</label>
                                                <input type="hidden" name="old-image" value="<?= $data['image']; ?>">
                                                <img src="../../upload/images/<?= $data['image']; ?>" height="50px" width="50px" alt="">
                                            </div>
                                            <div class="col-md-12 ">
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
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