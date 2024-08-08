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

$del_id = $_SESSION["del_id"];
if(!$del_id)
{
    header("location:deliveryLogin.php");
}

$qry = "select order_id from delpartner where del_id = $del_id";
$res = mysqli_query($con,$qry);
$row = mysqli_fetch_row($res);
$sqry = "select * from orders where order_id = $row[0]";

if(isset($_GET['status_id'])&&isset($_GET['order_id']))
 {
        $order_id = $_GET["order_id"];
        $status_id = $_GET['status_id'];
        echo $qry = "update orders set status_id = $status_id where order_id = $order_id";
        $res = mysqli_query($con,$qry);
        if(!$res)
        {
            echo "failed";
        }

        $qry = "update delpartner set assigned = 0 && order_id = 0 where del_id = $del_id";
        $dres = mysqli_query($con,$qry);
    }

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
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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

                            <a  class="navbar-brand" href="DelDashboard.php">
                            <img src="icon1.png" height="100px" width="100px">
                            <figcaption>FoodRide</figcaption></a>
                        </header>
                        <!-- END LOGO SECTION -->
                        <!-- <ul class="nav navbar-top-links navbar-center"> -->
                            <br><br>
                            <div id="nav">
                                <div class="col-lg-12">
                        <div style="text-align: center;">

                            <div class="col-lg-1"><a class="quick-btn" href="partnerDel.php">
                                <i class="icon-bar-chart icon-3x"></i>
                                <span>Delivery</span>
                                
                            </a>
</div>

                            <div class="col-lg-1">
                            <a class="quick-btn" href="delProfile.php">
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
                        <br><br><br><br><br><br>

                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Deliveries Assigned</h2>
                        </div>
                        <div>
                            <?php
                                            $res = mysqli_query($con,$sqry);
                                            while($row = mysqli_fetch_array($res))
                                            
                                                    {
                                                        echo "<tr><td><h3>Pickup From:</h3></td></tr>";
                                                        $nqry = "select rest_name,address from restaurant where res_id = $row[2]";
                                                    $nres = mysqli_query($con,$nqry);
                                                    $nrow = mysqli_fetch_row($nres);
                                                    echo "<h4><tr><td>$nrow[0]</td></tr>";
                                                    echo "<br>";
                                                    echo "<tr><td>$nrow[1]</td></tr>";
                                                    echo "<br>";
                                                   
                                                    echo "<tr><td>Bill Value: &#8377;$row[7]</td></tr></h4>";
                                                        // echo "<br>";
                                                        if($row[8]==2)
                                                        {
                                                            echo "<tr><td><a href='partnerDel.php?order_id=$row[0]&status_id=3' class='btn btn-warning'>Picked Up</a></td></tr>";
                                                        }
                                                        else
                                                        {
                                                            echo "<tr><stron><em><td style='color:green'>Picked Up</td></em></strong></tr>";
                                                        }
                                                    echo "<br><br><br><br>";
                                                    echo "<tr><td><h3>Deliver To:</h3></td></tr>";
                                                     $nqry = "select name from user where user_id = $row[1]";
                                                    $nres = mysqli_query($con,$nqry);
                                                    $nrow = mysqli_fetch_row($nres);
                                                    echo "<h4><tr><td>$nrow[0]</td></tr>";
                                                    echo "<br>";
                                                    echo "<tr><td>$row[6]</td></tr>";
                                                    echo "<br>";
                                                    if($row[8]==3)
                                                        {
                                                            echo "<tr><td><a href='partnerDel.php?order_id=$row[0]&status_id=4' class='btn btn-success'>Delivered</a></td></tr>";
                                                        }
                                                        if($row[8]==4)
                                                        {
                                                            echo "<tr><td style='color:green'><em>Delivered</em></td></tr>";
                                                        }
                                                }
                                                ?>
                        </div>
                    </div>
                </div>

                    </div>
                </div>

                <hr />




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
     <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>