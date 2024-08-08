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


$sqry = "select * from items where res_id = $res_id";
$sres = mysqli_query($con,$sqry);




if(isset($_GET["editid"]))
{
    $euid = $_GET["editid"];
    $qry = "select * from items where item_id = $euid";
    $res = mysqli_query($con,$qry);
    if($res)
    {
        $row = mysqli_fetch_row($res);
    }
    $cat_id = $row[1];
    $item_name = $row[3];
    $item_img = $row[4];
    $qry = "select price from price where item_id = $euid";
    $res = mysqli_query($con,$qry);
    $srow = mysqli_fetch_array($res);
    $item_price = $srow[0];
    
}

if(isset($_GET["ch_id"]))
{
    $ch_id = $_GET["ch_id"];
    $pqry = "select * from price where item_id = $ch_id";
    $pres = mysqli_query($con,$pqry);
    $prow = mysqli_fetch_row($pres);
    $price = $prow[2];
    // $date = $row[3];
 }

?>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title></title>
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

            <div class="inner" style="min-height:1200px;padding-top:20px;">
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Food Menu</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class=<?PHP if(!(isset($euid)) || !(isset($ch_id))) echo""; else 
                                echo"active"; ?>><a href="#data" data-toggle="tab">Menu Items</a>
                                </li>
                                <li class=<?PHP if(isset($euid)) echo"active"; else 
                                echo"" ?>><a href="#New" data-toggle="tab">Add item</a>
                                </li>
                                <li class=<?php if(isset($ch_id)) echo "active"; else echo""?>><a href="#price" data-toggle="tab">Change Price</a>
                                </li>
                               
                            </ul>

                            <div class="tab-content">
                                <div class="<?PHP if(isset($euid) || isset($ch_id)) echo 'tab-pane fade in'; else echo 'tab-pane fade in active'; ?>"
                                 id="data">
                                   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Menu Items
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id</th> -->
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Edit</th>
                                            <th>Change Price</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            while($srow = mysqli_fetch_array($sres))
                                            {
                                               echo "<tr>";
                                               echo "<td><img src = '$srow[4]' align = 'center' height = '200px' width = '200px'/></td>";
                                               echo "<td>$srow[3]</td>";
                                               $priceqry = "select price from price where item_id = $srow[0] && price_date <= curdate()";
                                               $priceres = mysqli_query($con,$priceqry);
                                               $pricerow = mysqli_fetch_row($priceres);
                                               $rowprice = $pricerow[0];
                                               echo "<td>$rowprice</td>";
                                               echo "<td><a href='menu.php?editid=$srow[0]' class='btn btn-primary'>Edit</a></td>";
                                               echo "<td><a href='menu.php?ch_id=$srow[0]' class='btn btn-warning'>Change Price</a></td>";
                                               echo "<td><a href='dbmenu.php?delid=$srow[0]' class='btn btn-danger'>Delete</a></td>";
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
                                <div class="<?PHP if(isset($euid)) echo 'tab-pane fade in active'; else echo 'tab-pane fade in' ?>" id="New">
                                   <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add an item
                        </div>
                        <div class="panel-body">
                <form class="form-horizontal" id="popup-validation" name="frm" method = "post" action="dbmenu.php" enctype="multipart/form-data">


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Category</label>
                                            <div class="col-lg-4">
                                                <select name="category" id="category" class="validate[required] form-control">
                                                    <option value="">Choose a category</option>
                                                    <?php 
                                                        $qry = "select * from category";
                                                        $res = mysqli_query($con,$qry);
                                                        while($row = mysqli_fetch_row($res))
                                                        {
                                                            if($row[0]==$cat_id)
                                                            {
                                                                echo "<option value = '$row[0]' selected>$row[1]</option>";
                                                            }
                                                            else
                                                            {
                                                                 echo "<option value = '$row[0]'>$row[1]</option>";
                                                            }
                                                           
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="item_name" id="item_name" value="<?php if(isset($euid)){ echo $item_name; } else '';?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                        <label class="control-label col-lg-4">Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if(isset($euid)){ echo $item_img;} else{ echo 'assets/img/demoUpload.jpg';} ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="uploadimg"  /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                                            <label class="control-label col-lg-4">Price</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="item_price" id="item_price" value="<?php if(isset($euid)){ echo $item_price; } else '';?>"  >
                                            </div>
                                        </div>
                    
                     <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" name = "additem" value="<?php if(isset($euid)){echo 'Save'; } else{ echo 'Add';} ?>" class="btn btn-primary btn-lg " />
                                        </div>
                                        <input type="hidden" name="euid" value="<?php if(isset($euid)){echo $euid; } else{ echo '0';} ?>"/>
                                        <input type="hidden" name="res_id" value="<?php echo $res_id;?>"/>
                                    </form>

                            </div>
                    </div>
                </div>
                                </div>

                                <div class="<?php if(isset($ch_id)) echo 'tab-pane fade in active'; else echo 'tab-pane fade in'?>" id="price">
                                    <!-- <h4>Change Price</h4> -->
                                    <div class="row">
                                        <div class="col-lg-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Change price
                        </div>
                        <div class="panel-body">
                             <?php 
                             if(isset($ch_id))
                             {
                                $qry = "select item_name from items where item_id = $ch_id";
                                $res = mysqli_query($con,$qry);
                                $row = mysqli_fetch_row($res);
                                $item_name = $row[0];
                            } 
                            ?>
                            <br><br><br>
                <form class="form-horizontal" id="popup-validation" name="frm" method = "post" action="dbmenu.php" >
                    <div class="form-group">
                                            <label class="control-label col-lg-4">Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="item_name" id="item_name" value="<?php if(isset($ch_id)){ echo $item_name; } else '';?>" readonly = "<?php if(isset($ch_id)) echo 'readonly'; else '';?>">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="control-label col-lg-4">Price</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="item_price2" id="item_price2" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Date</label>

                                            <div class="col-lg-4">
                                                <input type="date" id="date2" name="date2" class="form-control" />
                                            </div>
                                        </div>
                                                             <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" name = "changeprice" value="Add" class="btn btn-warning btn-lg " />
                                        </div>
                                        <input type="hidden" name="ch_id" value="<?php if(isset($ch_id)){echo $ch_id; } else{ echo '0';} ?>"/>
                </form>
            </div>
        </div>
                <!-- <div class="col-lg-12"> -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            History
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id</th> -->
                                            <th>Price</th>
                                            <th>Effective from</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($ch_id))
                             {
                                            $qry = "select * from price where item_id = $ch_id order by price_id desc";
                                            $res = mysqli_query($con,$qry);
                                            while($row = mysqli_fetch_row($res))
                                            {
                                                echo "<tr>";
                                                echo "<td>$row[2]</td>";
                                                echo "<td>$row[3]</td>";
                                                echo "</tr>";
                                            }
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
    <script type="text/javascript">
        function disableprice()
        {
            document.getElementById("item_price").disabled = true;
        }

        function enableprice()
        {
            document.getElementById("item_price").disabled = false;

        }
    </script>
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