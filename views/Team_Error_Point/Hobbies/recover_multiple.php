<?php
require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Hobbies\Hobbies;



$obj = new Hobbies();

$IDs = $_POST['selectedIDs'];

foreach($IDs as $id) {

    $_GET['id'] = $id;
    $obj->setData($_GET);
    $obj->recover();
}

Utility::redirect("index.php")
?>

