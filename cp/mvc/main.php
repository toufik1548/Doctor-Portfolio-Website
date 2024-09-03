<?php

include("configs/config.php");

// Start the session
session_start();
if(!isset($_SESSION['sess_user_id'])){
header("location: $cp_url/login.php");
}

$logged_user_id = $_SESSION['sess_user_id'];

include("configs/functions.php");
include("configs/router.php");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dr. Maruf Al Hasan</title>

    <?php include("head.php"); ?>

</head>
<body>
    <main>
        <div id="throbber" style="display:none; min-height:120px;"></div>
        <div id="noty-holder"></div>
        <div id="wrapper">

            <?php include("nav.php"); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row" id="main">
                        <div class="col-sm-12 col-md-12 well" id="content">

                            <?php include("includes.php"); ?>

                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div><!-- /#page-wrapper -->
            <?php include("footer.php"); ?>             
        </div><!-- /#wrapper -->
    </main>
  

    <!-- Initialize Tooltip -->
    <script src="<?php echo $cp_url; ?>/js/script.js"></script>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>