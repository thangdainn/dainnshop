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
                    <h3>Users
                        <a href="add-user.php" class="btn btn-primary float-end"><i class="material-icons opacity-10">add</i>Add User</a>
                    </h3>
                </div>
                <div class="card-body" id="user_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = getAll("users");

                            if (mysqli_num_rows($users) > 0) {
                                foreach ($users as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['fullname']; ?> </td>
                                        <td>
                                            <img src="../../upload/<?= $item['image']; ?>" width="50px" height="50px" style="border-radius: 50%;" alt="<?= $item['fullname']; ?>">
                                        </td>
                                        <td> <?= $item['email']; ?> </td>
                                        <td> <?= $item['phone']; ?> </td>
                                        <td> <?= $item['role_id'] == 8 ? "Admin" : "User"; ?> </td>
                                        <td>
                                            <?= $item['status'] == '0' ? "Hidden" : "Visible" ?>
                                        </td>
                                        <td>
                                            <a href="edit-user.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete_user_btn" value="<?= $item['id']; ?>" <?= $item['status'] == '0' ? "disabled" : ""; ?>>Delete</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
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

<?php include('../includes/footer.php'); ?>