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
                    <h3>Add Categories
                        <a href="category.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="../controllers/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="name" placeholder="Enter Category Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" accept=".jpg, .png" required name="image" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2" name="add_category_btn">Save</button>
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