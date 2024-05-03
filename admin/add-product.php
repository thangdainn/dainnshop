<?php
include ('../middleware/adminMiddleware.php');
include ('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="name" placeholder="Enter Product Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" required name="img" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea required name="description" placeholder="Enter description" rows="3" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Price</label>
                                <input type="text" required name="price" placeholder="Enter Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Sale Price</label>
                                <input type="text" required name="sale" placeholder="Enter Sale Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Select Category</label>
                                <select name="category_id" class="form-select mb-2" >
                                    <option selected> Select Category</option>
                                    <?php
                                        $categories = getAll("categories");

                                        if(mysqli_num_rows($categories) > 0)
                                        {
                                            foreach($categories as $item)
                                            {
                                                ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No categories available";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0"> Select Brand</label>
                                <select name="brand_id" class="form-select mb-2" >
                                    <option selected> Select Brand</option>
                                    <?php
                                        $brands = getAll("brands");

                                        if(mysqli_num_rows($brands) > 0)
                                        {
                                            foreach($brands as $item)
                                            {
                                                ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Brands available";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Select Type</label>
                                <select name="type" class="form-select mb-2" >
                                    <option selected>Select Type</option>
                                    <option value="new">New</option>
                                    <option value="normal">Normal</option>
                                    <option value="sale">Sale</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Status</label> <br>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include ('includes/footer.php'); ?>