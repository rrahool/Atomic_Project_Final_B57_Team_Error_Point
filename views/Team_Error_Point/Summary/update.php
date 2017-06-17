<?php

require_once "../../../vendor/autoload.php";

use App\Summary\Summary;
use App\Utility\Utility;

$obj = new Summary();

$obj->setData($_POST);

$obj->update();

Utility::redirect("index.php");