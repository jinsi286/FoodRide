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



$admin_id = $_SESSION["admin_id"];
if(!$admin_id)
{
    header("location:adminlogin.php");
}
else
{
    if(isset($_GET['order_id']))
    {
        $order_id = $_GET['order_id'];
        $dqry = "select del_id from orders where order_id = $order_id";
        $dres = mysqli_query($con,$dqry);
        $drow = mysqli_fetch_row($dres);
        $qry = "select * from delpartner where del_id = $drow[0]";
    }


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
    <style type="text/css">
       
#nav{
   width:100%;
   text-align:center;   
}
#nav div a{
   text-decoration:none;
   padding:10px;
}
    </style>
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

                            <a  class="navbar-brand" href="AdminDashboard.php">
                            <img src="icon1.png" height="100px" width="100px">
                            <figcaption>FoodRide</figcaption></a>
                        </header>
                        <!-- END LOGO SECTION -->
                        <!-- <ul class="nav navbar-top-links navbar-center"> -->
                            <br><br>
                            <div id="nav">
                                <div class="col-lg-12">
                        <div style="text-align: center;">

                            <div class="col-lg-1"><a href="ResApproved.php"><img src="manageRes.jpg" height="50px" width="50px"><figcaption>Restaurants<figcaption></a></div>

                            <div class="col-lg-1">
                            <a href="ResNotApproved.php">
                                <img src="pending.jpg" height="50px" width="50px">
                                <figcaption>Pending Requests</figcaption>
                                <!-- <span class="label label-danger"><?php echo $count1; ?></span> -->
                            </a>
                            </div>
                        
                        <div class="col-lg-1">
                            <a href="ResRegister.php">
                                <img src="addpartner.jpg" height="50px" width="50px">
                                <figcaption>Add Restaurant</figcaption>
                            </a>
                            </div>

                            <div class="col-lg-1">
                            <a href="category.php">
                                <img src="category.jpg" height="50px" width="50px">
                                <figcaption>Food Categories</figcaption>
                                <!-- <span class="label label-success"><?php echo $cat_count; ?></span> -->
                            </a>
                            </div>

                            <div class="col-lg-1">
                            <a href="">
                                <img src="order.jpg" height="50px" width="50px">
                                <figcaption>&nbsp;&nbsp;Orders</figcaption>
                            </a>
                            </div>

                            <div class="col-lg-1">
                            <a href="DeliveryReg.php">
                                <img src="addRes2.jpg" height="50px" width="50px">
                                <figcaption>Add a delivery partner</figcaption>
                            </a>
                            </div>
                            <div class="col-lg-1">
                            <a href="DeliveryReg.php">
                                <img src="profile.jpg" height="50px" width="50px">
                                <figcaption>Profile</figcaption>
                            </a>
                            </div>

                            <div class="col-lg-1">
                            <a href="Delivery.php">
                                <img src="delivery.jpg" height="50px" width="50px">
                                <figcaption>Deliver Partners</figcaption>
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

            <div class="inner" style="min-height:1100px;">
                <div class="row">
                    <div class="col-lg-11">

                        <br><br><br><br><br><br><br>
                        <h1></h1>

                        <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>Partner Details</h1>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <!-- <th>Password</th> -->
                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $res = mysqli_query($con,$qry);
                                            while ($row = mysqli_fetch_row($res)) 
                                            {
                                               echo "<tr>";
                                               echo "<td><img src = '$row[3]' height='50px' width='50px'></td>";
                                               echo "<td>$row[1]</td>";
                                               echo "<td>$row[2]</td>";
                                               echo "<td>$row[4]</td>";
                                               echo "<td>$row[5]</td>";
                                               // echo "<td>$row[6]</td>";
                                               
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                           
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
        <p>&copy;  binarytheme &nbsp;1014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-1.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-1.6.1-respond-1.1.0.min.js"></script>
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