<?php

require "../vendor/autoload.php";

$file = file_exists('../install/install.php');
var_dump($file);
if ($file == true) {
    include_once '../install/install.php';
} else {

    include_once Config\Config::Params('template');

}
