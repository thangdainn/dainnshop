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
                    <h4>Roles
                        <a href="add-role.php" class="btn btn-info float-end"><i class="material-icons opacity-10">add</i>Add Role</a>
                    </h4>
                </div>
                <div class="card-body" id="user_table">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $roles = getAll("roles");

                            if (mysqli_num_rows($roles) > 0) {
                                foreach ($roles as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['name']; ?> </td>
                                        <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"> <?= $item['permission']; ?> </td>
                                        <td>
                                            <?= $item['status'] == '0' ? "Hidden" : "Visible" ?>
                                        </td>
                                        <td>
                                            <a href="edit-role.php?id=<?= $item['id']; ?>" class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete_role_btn" value="<?= $item['id']; ?>" <?= $item['status'] == '0' ? "disabled" : ""; ?>>Delete</button>
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