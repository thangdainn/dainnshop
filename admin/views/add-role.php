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
                    <h4>Add Role</h4>
                </div>
                <div class="card-body">
                    <form action="../controllers/role.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="name" placeholder="Enter Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0">Permission</label>
                                <textarea required name="permission" placeholder="Enter Permission" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_role_btn">Save</button>
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