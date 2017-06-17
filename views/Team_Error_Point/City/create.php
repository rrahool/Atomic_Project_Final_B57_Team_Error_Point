<?php

    require_once "../../../vendor/autoload.php";

    use App\Message\Message;

    if(!isset($_SESSION))
        session_start();

    $msg = Message::message();

    echo "<div> <div id='message'> $msg </div> </div>";

?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>



    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../../resources/create_pages/city/main.css" type="text/css" />
    <link rel="stylesheet" href="../../../resources/create_pages/city/select-boxes.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script src="../../../resources/bootstrap/js/jquery.js"></script>
    <!-- Document Title
    ============================================= -->
    <title>Add City</title>


</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="transparent-header page-section dark">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <br>
                    <h1>CITY</h1>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul class="one-page-menu">
                        <li><a href="#"><div>Home</div></a></li>
                        <li class="current"><a href="create.php"><div>Add City</div></a></li>
                        <li><a href="index.php"><div>City List</div></a></li>
                        <li><a href="trashed.php"><div>Trash List</div></a></li>

                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->

    <section id="slider" style="background: url('../../../images/landing2.jpg') center; overflow: visible;" data-height-lg="500" data-height-md="500" data-height-sm="600" data-height-xs="600" data-height-xxs="600">
        <div class="container clearfix">

            <form action="store.php" method="post" role="form" class="landing-wide-form landing-form-overlay dark nobottommargin clearfix" style="padding-bottom: 100px;">
                <div class="heading-block nobottommargin nobottomborder" style="text-align: center">
                    <h2>Select Your City</h2>
                    <span>Type Your Name & Select City</span>
                </div>
                <div class="line" style="margin: 20px 0 30px;"></div>
                <div class="col_full">
                    <input type="text" name="name" class="form-control input-lg not-dark" value="" placeholder="Your Name*">
                </div>
                <div class="col_full">
                    <select class="form-control" name="city" style="background: white; height: 50px;">
                        <option value="Dhaka">DHAKA</option>
                        <option value="Chittagong">CHITTAGONG</option>
                        <option value="Khulna">KHULNA</option>
                        <option value="Sylhet">SYLHET</option>
                        <option value="Rajshahi">RAJSHAHI</option>
                        <option value="Barisal">BARISHAL</option>
                        <option value="Rangpur">RANGPUR</option>
                    </select>
                </div>

                <div class="col_full nobottommargin">
                    <button class="btn btn-lg btn-danger btn-block nomargin" value="submit" type="submit" style="">SUBMIT</button>
                </div>

                <div class="clearfix"></div>

            </form>

        </div>
    </section>

    <!-- Content
    ============================================= -->
    <section id="content" style="overflow: visible;">

        <div class="content-wrap">

            <div class="promo promo-dark promo-full landing-promo header-stick">
                <div class="container clearfix">
                    <h3>Team <span style="color: #DBAB83">Error Point</span> Creation <i class="icon-circle-arrow-right" style="position:relative;top:2px;"></i></h3>
                    <span>You'll love our beautiful &amp; interactive designs that makes your web surfing fun.</span>
                </div>
            </div>

        </div>

    </section><!-- #content end -->

</div>





<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="../../../resources/create_pages/city/jquery.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="../../../resources/create_pages/city/functions.js"></script>



<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-23255544-12', 'auto');
    ga('send', 'pageview');
</script><script>jQuery(document).ready(function(e){e("#primary-menu > ul li").find('.new-badge').children("div").append('<span class="label label-danger" style="display:inline-block;margin-left:8px;position:relative;top:-1px;text-transform:none;">New</span>')});</script>
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"839484a19a","applicationID":"5289971","transactionName":"ZQEDZxZUD0FZVkxfX1xLNEENGglGVVkXVVFcEgBAS1kAXFxcVlEdB0oRWxQ=","queueTime":0,"applicationTime":0,"atts":"SUYAEV5OHE8=","errorBeacon":"bam.nr-data.net","agent":""}</script>



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