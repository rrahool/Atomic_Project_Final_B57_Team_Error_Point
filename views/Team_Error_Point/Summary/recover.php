<?php

require_once "../../../vendor/autoload.php";

use App\Summary\Summary;
use App\Utility\Utility;

$obj = new Summary();

$obj->setData($_GET);

$obj->recover();

Utility::redirect("index.php");