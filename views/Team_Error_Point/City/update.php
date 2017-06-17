<?php

require_once "../../../vendor/autoload.php";

use App\City\City;
use App\Utility\Utility;

$obj = new City();

$obj->setData($_POST);

$obj->update();

Utility::redirect("index.php");