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
                $user = getByID('users', $id);

                if (mysqli_num_rows($user) > 0) {
                    $data = mysqli_fetch_array($user);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit User
                                <a href="user.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/user.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-0">Name</label>
                                        <input type="text" required name="fullname" value="<?= $data['fullname']; ?>" placeholder="Enter Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-0">Email</label>
                                        <input type="email" required name="email" value="<?= $data['email']; ?>" placeholder="Enter Email" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-0">Phone</label>
                                        <input type="tel" required name="phone" value="<?= $data['phone']; ?>" placeholder="Enter Phone" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-0">Password</label>
                                        <input type="text" name="password" placeholder="Enter password when you want to change" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="mb-0">Select Role</label>
                                        <select name="role_id" class="form-select mb-2" style="padding-left: 12px;">
                                            <!-- <option selected></option> -->
                                            <?php
                                            $roles = getAllByStatus("roles", 1);

                                            if (mysqli_num_rows($roles) > 0) {
                                                foreach ($roles as $item) {
                                            ?>
                                                    <option value="<?= $item['id'] ?>" <?= $data['role_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No categories available";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="mb-0">Select Status</label>
                                        <select name="status" class="form-select mb-2" style="padding-left: 12px;">
                                            <!-- <option selected></option> -->
                                            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Disable</option>
                                            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Visible</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="image" class="mb-0">Upload Image</label>
                                        <input type="file" name="image" class="form-control" accept=".jpg, .png">

                                    </div>
                                    <div class="col-md-2 mb-3" style="margin-left: 3rem;">
                                        <label for="" class="d-block">Current Image</label>
                                        <img src="../../upload/<?= $data['image']; ?>" height="50px" width="50px" style="border-radius: 50%;" alt="">
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_user_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "User not found";
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