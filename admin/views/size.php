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
                        <a href="add-size.php" class="btn btn-primary float-end"><i class="material-icons opacity-10">add</i>Add Size</a>
                    </h3>
                </div>
                <div class="card-body" id="size_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sizes = getAll("sizes");

                            if (mysqli_num_rows($sizes) > 0) {
                                foreach ($sizes as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['name']; ?> </td>
                                        <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"> <?= $item['description']; ?> </td>
                                        <td>
                                            <?= $item['status'] == '0' ? "Hidden" : "Visible" ?>
                                        </td>
                                        <td>
                                            <a href="edit-size.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete_size_btn" value="<?= $item['id']; ?>" <?= $item['status'] == '0' ? "disabled" : ""; ?>>Delete</button>
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