<?php

session_start();
$con = mysqli_connect("localhost","root","","project");
if(!$con)
{
    echo "Connection failed";
}

$email = $_SESSION["email"];
if(!$email)
{
    header("location:adminLogin.php");
}
    
$sqry = "select * from category";
$sres = mysqli_query($con,$sqry);

if(isset($_GET["editid"]))
{
    $euid = $_GET["editid"];
    $qry = "select * from category where cat_id = $euid";
    $res = mysqli_query($con,$qry);
    if($res)
    {
        $row = mysqli_fetch_row($res);
    }
     $cat_name = $row[1];
     $cat_img = $row[2];
    
}





?>




<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>My Project Title Goes Here</title>
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
     <link rel="stylesheet" href="assets/plugins/validationengine/css/validationEngine.jquery.css" />
       <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
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

                            <a  class="navbar-brand"  href="AdminDashboard.php">
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
                            <a href="adminOrders.php">
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
                            <a href="adminProfile.php">
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

            <div class="inner" style="min-height:1200px;padding-top:20px;">
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Food Categories</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class=<?PHP if(isset($euid)) echo""; else 
                                echo"active" ?>><a href="#data" data-toggle="tab">Categories</a>
                                </li>
                                <li class=<?PHP if(isset($euid)) echo"active"; else 
                                echo"" ?>><a href="#New" data-toggle="tab">Add Category</a>
                                </li>
                               
                            </ul>

                            <div class="tab-content">
                                <div class="<?PHP if(isset($euid)) echo 'tab-pane fade in'; else echo 'tab-pane fade in active'; ?>" id="data">
                                   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Categories
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id</th> -->
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            while($srow = mysqli_fetch_array($sres))
                                            {
                                               echo "<tr>";
                                               // echo "<td>$row[0]</td>";
                                               echo "<td><img src = '$srow[2]' align = 'center' height = '150px' width = '200px'/></td>";
                                               echo "<td>$srow[1]</td>";
                                               echo "<td><a href='category.php?editid=$srow[0]' class='btn btn-primary'>Edit</a></td>";
                                               echo "<td><a href='category.php?delid=$srow[0]' class='btn btn-danger'>Delete</a></td>";
                                                    echo "</tr>";

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
                                <div class="<?PHP if(isset($euid)) echo 'tab-pane fade  in active'; else echo 'tab-pane fade in' ?>" id="New">
                                   <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add a category
                        </div>
                        <div class="panel-body">
                <form class="form-horizontal" id="popup-validation" name="frm" method = "post" action="dbcategory.php" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="cat_name" id="cat_name" value="<?php if(isset($euid)){ echo $cat_name; } else "";?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                        <label class="control-label col-lg-4">Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if(isset($euid)){ echo $cat_img;} else{ echo 'assets/img/demoUpload.jpg';} ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="uploadimg"  /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" name = "addcat" value="<?php if(isset($euid)){echo 'Save'; } else{ echo 'Add';} ?>" class="btn btn-primary btn-lg " />
                                        </div>
                                        <input type="hidden" name="euid" value="<?php if(isset($euid)){echo $euid;} else{echo '0';} ?>"/>
                                    </form>

                            </div>
                    </div>
                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
       <!--END PAGE CONTENT -->

</div>
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

     <script src="assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="assets/js/validationInit.js"></script>
    <script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(function () { 
            $('#dataTables-user').dataTable();
            formValidation(); });
        </script>
     <!--END PAGE LEVEL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
