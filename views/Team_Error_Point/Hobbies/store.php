<?php

require_once "../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Hobbies\Hobbies;

$obj = new Hobbies();

$strHobbies = implode(", ", $_POST['Hobbies']);

$_POST['hobbies'] = $strHobbies;

$obj->setData($_POST);

$obj->store();

Utility::redirect("create.php");