<?php
require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Birthday\Birthday;


$obj = new Birthday();

$IDs = $_POST['selectedIDs'];

foreach($IDs as $id) {
    $_GET['id'] = $id;
    $obj->setData($_GET);
    $obj->trash();
}

Utility::redirect("trashed.php")
?>