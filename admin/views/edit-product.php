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
                    $product = getByID("products",$id);
                    $images_images = getByProductID("images",$id);

                    if(mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Product
                                        <a href="products.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="../controllers/code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                            <div class="col-md-12">
                                                <label class="mb-0">Name</label>
                                                <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Upload Image (1 Image)</label>
                                                <input type="hidden" name="old-img" value="<?= $data['img']; ?>">
                                                <input type="file" name="img" class="form-control mb-2">
                                                <label class="mb-0">Current Image</label>
                                                <img src="../../upload/images/<?= $data['img']; ?>" alt="Product Image" height="50px" width="50px" >
                                            </div>
                                            <?php
                                                if(mysqli_num_rows($images_images) > 0)
                                                {
                                                    $count = 0;
                                                    ?>
                                                        <div class="col-md-12">
                                                            <label class="mb-0">Upload Additional Images (2 Images) </label>
                                                            <input type="hidden" name="image-old-image[]" value="<?= $item['image']; ?>">
                                                            <input type="file" name="additional_images[]" class="form-control mb-2" multiple>
                                                            <label class="mb-0">Current Additional Images</label>
                                                            <?php
                                                            foreach($images_images as $item)
                                                            {
                                                                if($count == 0)
                                                                {
                                                                    $count++;
                                                                    continue;
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                        <img src="../../upload/images/<?= $item['image']; ?>" alt="Product Image" height="50px" width="50px" >
                                                                    <?php
                                                                }
                                                                
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                            <div class="col-md-12">
                                                <label class="mb-0">Description</label>
                                                <textarea required name="description" placeholder="Enter description" rows="3" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Price</label>
                                                <input type="text" required name="price" value="<?= $data['price']; ?>" placeholder="Enter Price" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Sale Price</label>
                                                <input type="text" required name="sale" value="<?= $data['sale']; ?>" placeholder="Enter Sale Price" class="form-control mb-2">
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
                                                                    <option value="<?= $item['id'] ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> ><?= $item['name'] ?></option>
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
                                                                    <option value="<?= $item['id'] ?>" <?= $data['brand_id'] == $item['id']?'selected':'' ?> ><?= $item['name'] ?></option>
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
                                                    <option value="new" <?= $data['type'] == "new"?'selected':'' ?> >New</option>
                                                    <option value="normal" <?= $data['type'] == "normal"?'selected':'' ?> >Normal</option>
                                                    <option value="sale" <?= $data['type'] == "sale"?'selected':'' ?> >Sale</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Status</label> <br>
                                                <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                                            </div>
                                            <div class="col-md-12" >
                                                <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo "Product not found for given ID";
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