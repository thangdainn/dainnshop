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
                    <h4>Add User</h4>
                </div>
                <div class="card-body">
                    <form action="../controllers/user.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="fullname" placeholder="Enter Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Email</label>
                                <input type="email" required name="email" placeholder="Enter Email" class="form-control mb-2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Phone</label>
                                <input type="tel" required name="phone" placeholder="Enter Phone" class="form-control mb-2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Password</label>
                                <input type="text" required name="password" placeholder="Enter Password" class="form-control mb-2">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="mb-0">Select Role</label>
                                <select name="role_id" class="form-select mb-2" style="padding-left: 12px;">
                                    <?php
                                    $roles = getAllByStatus("roles", 1);

                                    if (mysqli_num_rows($roles) > 0) {
                                        foreach ($roles as $item) {
                                    ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No categories available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_user_btn">Save</button>
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