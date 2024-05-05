<?php
include ('../models/myfunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_id'] != 8)
    {
        redirect("../views/login.php","Login to continue");
        exit();
    } 
}
else
{
    redirect("../views/login.php","Login to continue");
    exit();
}
?>