<?php

require_once "../../../vendor/autoload.php";

use App\Utility\Utility;
use App\ProfilePicture\ProfilePicture;

$obj = new ProfilePicture();

$fileName       = time().$_FILES['image']['name'];

$source         = $_FILES['image']['tmp_name'];
$destination    = "Images/".$fileName;

move_uploaded_file($source, $destination);

$_POST['profilePicture'] = $fileName;

$obj->setData($_POST);

//Utility::dd($_POST);

$obj->store();

Utility::redirect("create.php");