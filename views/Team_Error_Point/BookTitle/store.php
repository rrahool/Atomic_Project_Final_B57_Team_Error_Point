<?php

require_once "../../../vendor/autoload.php";

use App\BookTitle\BookTitle;
use App\Utility\Utility;

$objBookTitle = new BookTitle();

$objBookTitle->setData($_POST);

$objBookTitle->store();

Utility::redirect("create.php");