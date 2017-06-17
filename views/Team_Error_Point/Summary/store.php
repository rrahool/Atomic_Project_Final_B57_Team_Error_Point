<?php
require_once "../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Summary\Summary;

$obj = new Summary();

$obj->setData($_POST);

$obj->store();

Utility::redirect("create.php");