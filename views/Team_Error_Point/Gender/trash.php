<?php

require_once "../../../vendor/autoload.php";

use App\Gender\Gender;
use App\Utility\Utility;

$obj = new Gender();

$obj->setData($_GET);

$obj->trash();

Utility::redirect("trashed.php");