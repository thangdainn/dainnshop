<?php

spl_autoload_register(function ($class) {
    if ($class != "pagination") {
        include_once "system/libs/" . $class . ".php";
    }
});
include_once "config/config.php";
$main = new Main();
