<?php
session_start();
$con = mysqli_connect("localhost","root","","project");
if(!$con)
{
    echo "Connection failed";
}
else
{
}

$res_id = $_SESSION["res_id"];
if(!$res_id)
{
    header("location:ResLogin.php");
}

$qry = "select * from restaurant where res_id = $res_id";
$res = mysqli_query($con,$qry);
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Blank Page</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
                <div id="top">

                    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 20px;">
                        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                            <i class="icon-align-justify"></i>
                        </a>
                        <!-- LOGO SECTION -->
                        <div class="row">
                        <header class="navbar-header">

                            <a  class="navbar-brand" href="ResDashboard.php">
                            <img src="icon1.png" height="100px" width="100px">
                            <figcaption>FoodRide</figcaption></a>
                        </header>
                        <!-- END LOGO SECTION -->
                        <!-- <ul class="nav navbar-top-links navbar-center"> -->
                            <br><br>
                            <div id="nav">
                                <div class="col-lg-12">
                        <div style="text-align: center;">

                            <div class="col-lg-1"><a class="quick-btn" href="ResCategory.php">
                                <i class="icon-th-large icon-3x"></i>
                                <span> Categories</span>
                                <!-- <span class="label label-success"><?php  $count; ?></span> -->
                            </a>
</div>

                            <div class="col-lg-1">
                            <a class="quick-btn" href="ResMenu2.php?menuid=1">
                                <i class="icon-food icon-3x"></i>
                                <span> Create Menu</span>
                            </a>
                            </div>
                        
                        <div class="col-lg-1">
                            <a class="quick-btn" href="ResOrders.php">
                                <i class="icon-bar-chart icon-3x"></i>
                                <span>Orders</span>
                                <!-- <span class="label btn-metis-4">0</span> -->
                            </a>
                            </div>

                            <div class="col-lg-1">
                            <a class="quick-btn" href="ResProfile.php">
                                <i class="icon-user icon-3x"></i>
                                <span>Profile</span>
                            </a>
                            </div>


                            
                        </div>

                    </div>
                </div>
                



                <!-- <ul class="nav navbar-top-links navbar-right">

                    ADMIN SETTINGS SECTIONS 

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    END ADMIN SETTINGS -->
                <!-- </ul>
 --> 
</div>
            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2></h2>
<br><br><br><br><br><br><br><br>


                    </div>
                </div>

                <?php 
                $row = mysqli_fetch_row($res);
                echo "<img src='$row[3]' height='200px' width='300px'><br>";
                echo "<h2>$row[1]</h2>";
                echo "$row[2]<br>";

                echo "<br><br><h3>Owner Details</h3><br>";
                echo "$row[4]<br>";
                echo "$row[5]<br>";
                echo "$row[6]<br>";
                echo "$row[7]<br>";
                ?>
                <a href="ResEdit.php?editid=1" class="btn btn-primary btn-lg">Edit</a>




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
