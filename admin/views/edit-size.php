<?php
include('../models/adminconfig.php');
include('../middleware/adminMiddleware.php');
include('../includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $size = getByID('sizes', $id);

                if (mysqli_num_rows($size) > 0) {
                    $data = mysqli_fetch_array($size);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Size
                                <a href="size.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/size.php" method="POST">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-0">Name</label>
                                        <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="mb-0">Description</label>
                                        <textarea required name="description" placeholder="Enter Permission" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="mb-0">Select Status</label>
                                        <select name="status" class="form-select mb-2" style="padding-left: 12px;">
                                            <!-- <option selected></option> -->
                                            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Disable</option>
                                            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Visible</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_size_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Size not found";
                }
            } else {
                echo "ID missing from url";
            }
            ?>
        </div>
    </div>
</div>
</div>

<?php include('../includes/footer.php'); ?>