<?php

    require_once "../../../vendor/autoload.php";

    use App\ProfilePicture\ProfilePicture;
    use App\Message\Message;
    use App\Utility\Utility;

    if(!isset($_GET['id'])) {

        Message::message("You can't visit view.php without id (ex: view.php?id=23)");
        Utility::redirect("index.php");
    }

    $obj = new ProfilePicture();

    $obj->setData($_GET);

    $singleData = $obj->view();

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profile Picture - Single</title>
        <link rel="stylesheet" href="../../../resources/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../resources/w3css/4/w3.css">
        <script src="../../../resources/bootstrap/js/jquery.js"></script>
        <script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>


    <div class="w3-container">
        <div class="w3-row">
            <div style="min-height: 100px;"></div>
            <div class="w3-container w3-quarter"></div>

            <div class="w3-card-4 w3-half">

                <header class="w3-container w3-blue">
                    <h2>Single Information - Profile Picture</h2>
                </header>

                <?php
                    echo "
                        <ul class='w3-ul w3-card-4'>
                            <li class='w3-padding-64'>
                                <img src='Images/$singleData->profile_picture' class='w3-left w3-round w3-margin-right' style='width:150px; height: 150px'>
                                <span class='w3-badge w3-red'>$singleData->id</span><br>
                                <span class='w3-xxlarge'>$singleData->name</span><br>
                                <span class='w3-large' style='color: seagreen'>$singleData->profile_picture</span>
                                <br><br><br>
                            </li>
                        </ul>
                    ";
                ?>

            </div>
            <div class="w3-container w3-quarter"></div>
        </div>
    </div>
    <!--<div class="w3-container">
        <div class="w3-row">
            <div class="col-sm-6">
                <div class="w3-panel w3-blue w3-card-4">
                    <h2> Single Book Information - Profile Picture </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="w3-table-all w3-hoverable">
                    <?php
//                        echo "
//                                <tr>
//                                    <td>ID: </td>
//                                    <td>$singleData->id</td>
//                                </tr>
//                                <tr>
//                                    <td>Profile Picture: </td>
//                                    <td>$singleData->name</td>
//                                </tr>
//                                <tr>
//                                    <td>Author: </td>
//                                    <td>$singleData->image</td>
//                                </tr>
//";
                    ?>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>-->


</body>
</html>
