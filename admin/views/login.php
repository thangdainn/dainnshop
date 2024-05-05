<?php

session_start();

if (isset($_SESSION['auth']) and $_SESSION['role_id'] == 8) {
    $_SESSION['message'] = 'You are already logged in';
    header('Location: index.php');
    exit();
} else if (isset($_SESSION['auth']) and $_SESSION['role_id'] == 3) {
    $_SESSION['message'] = 'You are already logged in';
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.min.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/custom.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/login.css" rel="stylesheet" />

    <title>
        DAINNSHOP ADMIN
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <div class="py-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                    if (isset($_SESSION['message'])) {
                    ?>
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                            <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card shadow">
                        <div class="card-header bg-gradient-primary ">
                            <h4 style="color:aliceblue">Admin Login</h4>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" name="login_btn" class="btn btn-primary bg-gradient-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/smooth-scrollbar.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../assets/js/custom.js"></script>

    <!-- Alertify Js -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

    <script>
        <?php
        if (isset($_SESSION['message'])) {
        ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');
        <?php
            unset($_SESSION['message']);
        }
        ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>