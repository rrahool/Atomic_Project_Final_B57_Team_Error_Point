<?php

require_once "../../../vendor/autoload.php";

use App\Gender\Gender;
use App\Utility\Utility;

$obj = new Gender();

$obj->setData($_POST);

$obj->update();

Utility::redirect("index.php");