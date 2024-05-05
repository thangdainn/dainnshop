<?php
    include('../models/adminconfig.php');
    // include(APP_NAME . 'admin/models/dbcon.php');
    // include(APP_NAME . 'admin/models/myfunctions.php');

    include('../models/dbcon.php');
    include('../models/myfunctions.php');

if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Hash the entered password
    $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $login_query_run = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['fullname'];
        $useremail = $userdata['email'];
        $role_id = $userdata['role_id'];
        $stored_hashed_password = $userdata['password'];

        $_SESSION['auth_user'] = [
            'fullname' => $username,
            'email' => $useremail
        ];

        if (password_verify($_POST['password'], $stored_hashed_password)) {
            $_SESSION['role_id'] = $role_id;

            if($role_id == 8)
            {
                redirect("../views/index.php","Logged In Successfully");
            }
            else
            {
                redirect("../views/login.php","Account Does Not Have Dashboard Permissions");
            }
        } else {
            redirect("../views/login.php","Invalid Credentials");
        }
    }
    mysqli_stmt_close($stmt);
}