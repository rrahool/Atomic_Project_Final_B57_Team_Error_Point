<?php
require_once "../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Birthday\Birthday;

$obj = new Birthday();

$obj->setData($_POST);

$obj->store();

Utility::redirect("create.php");