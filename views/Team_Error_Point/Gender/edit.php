<?php

    require_once "../../../vendor/autoload.php";

    use App\Gender\Gender;
    use App\Message\Message;
    use App\Utility\Utility;

    if(!isset($_GET['id'])) {

        Message::message("You can't visit view.php without id (ex: view.php?id=23)");
        Utility::redirect("index.php");
    }

    $obj = new Gender();

    $obj->setData($_GET);

    $singleData = $obj->view();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gender - Edit</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../resources/bootstrap/css/bootstrap.min.css">
        <script src="../../../resources/bootstrap/js/jquery.js"></script>
        <script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
        <style>
            div.container{
                margin-top: 150px;
            }
            div.col-lg-6{
                background-color: ghostwhite;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h2>Gender Edit Form</h2>
            <form class="form-horizontal" action="update.php" method="post">

                <!--///////////////////////////////////////////////////////-->
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $singleData->id ?>">
                <!--///////////////////////////////////////////////////////-->

                <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $singleData->name ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="gender">Gender: </label>
                    <div class="col-sm-9">
                        <div style="height: 7px"></div>
                        <input type="radio" name="gender" value="Male" <?php if($singleData->gender == "Male") echo 'checked = "checked"' ?>> Male
                        <input type="radio" name="gender" value="Female" <?php if($singleData->gender == "Female") echo 'checked = "checked"' ?>> Female
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <script src="../../../resources/bootstrap/js/jquery.js"></script>

    <script>


        jQuery(

            function($) {
                $('#message').fadeOut (550);
                $('#message').fadeIn (550);
                $('#message').fadeOut (550);
                $('#message').fadeIn (550);
                $('#message').fadeOut (550);
                $('#message').fadeIn (550);
                $('#message').fadeOut (550);
            }
        )
    </script>
</body>
</html>

