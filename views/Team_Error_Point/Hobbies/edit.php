<?php

    require_once "../../../vendor/autoload.php";

    use App\Hobbies\Hobbies;
    use App\Message\Message;
    use App\Utility\Utility;

    if(!isset($_GET['id'])) {

        Message::message("You can't visit view.php without id (ex: view.php?id=23)");
        Utility::redirect("index.php");
    }

    $obj = new Hobbies();

    $obj->setData($_GET);

    $singleData = $obj->view();

    $hobbiesArray = explode(", ", $singleData->hobbies);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hobbies - Edit</title>
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
            <h2>Hobbies Edit Form</h2>
            <form class="form-horizontal" action="update.php" method="post">

                <!--///////////////////////////////////////////////////////-->
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $singleData->id ?>">
                <!--///////////////////////////////////////////////////////-->

                <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $singleData->name ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="hobbies">Select Hobbies: </label>
                    <div class="col-sm-9">
                        <div style="height: 7px"></div>
                        <input type="checkbox" id="hobbies" name="Hobbies[]" value="Gardening" <?php if(in_array("Gardening",$hobbiesArray)) echo "checked" ?>> Gardening
                        <br><br>

                        <input type="checkbox" id="hobbies" name="Hobbies[]" value="Book Reading" <?php if(in_array("Book Reading",$hobbiesArray)) echo "checked" ?>> Book Reading
                        <br><br>

                        <input type="checkbox" id="hobbies" name="Hobbies[]" value="Photography" <?php if(in_array("Photography",$hobbiesArray)) echo "checked" ?>> Photography
                        <br><br>

                        <input type="checkbox" id="hobbies" name="Hobbies[]" value="Gaming" <?php if(in_array("Gaming",$hobbiesArray)) echo "checked" ?>> Gaming
                        <br><br>

                        <input type="checkbox" id="hobbies" name="Hobbies[]" value="Traveling" <?php if(in_array("Traveling",$hobbiesArray)) echo "checked" ?>> Traveling
                        <br><br>
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

