<?php
include ('../models/myfunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_id'] != 8 && $_SESSION['role_id'] != 3)
    {
        redirect("../views/login.php","Login to continue");
        exit();
    } 
} else if (!isset($_SESSION['auth']))
{
    redirect("../views/login.php","Login to continue");
    exit();
}
else
{
    redirect("../views/index.php","Logged in successfully");
    exit();
}
?>