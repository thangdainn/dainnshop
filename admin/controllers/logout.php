<?php
session_start();

include('../models/adminconfig.php');

if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['message'] = 'Logged out successfully';
}

header('Location: ../views/login.php')

?>