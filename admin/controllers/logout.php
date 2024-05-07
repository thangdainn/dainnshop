<?php
session_start();

include('../models/adminconfig.php');

if(isset($_SESSION['auth']) || isset($_SESSION['role_id']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    unset($_SESSION['role_id']);
    $_SESSION['message'] = 'Logged out successfully';
}

header('Location: ../views/login.php')

?>