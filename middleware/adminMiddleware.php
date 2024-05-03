<?php

include ('../admin/myfunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_id'] != 8)
    {
        redirect("../admin/login.php","Login to continue");
        exit();
    } 
}
else
{
    redirect("../admin/login.php","Login to continue");
    exit();
}
?>