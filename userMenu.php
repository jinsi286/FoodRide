<?php
session_start();
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }

    $flag1 = false;

    if(isset($_SESSION['itemexists']))
    {
        $res_id = $_GET["res_id"];
        unset($_SESSION['itemexists']);
        echo  "<script type='text/javascript'>alert('Item already added to cart!')</script>";
        $flag1 = true;
    }

    if(isset($_SESSION['diffres']))
    {
        $res_id = $_GET["res_id"];
        unset($_SESSION['diffres']);
        $qry = "select rest_name from restaurant where res_id = $res_id";
        $res = mysqli_query($con,$qry);
        $row = mysqli_fetch_row($res);
        echo  "<script type='text/javascript'>alert('You have items in your cart from $row[0]')</script>";
        $flag1 = true;
    }

    if($flag1)
    {
        header("Refresh:0");
    }
    
    if(!isset($_GET["res_id"]))
    {
        if($_SESSION["res_id_log"] > -1 && $_SESSION["item_id_log"] > -1)
        {
            $res_id = $_SESSION["res_id_log"];
            $item_id = $_SESSION["item_id_log"];
        }
        else
        {
            header("location:userRest.php");
        }
    }
    else
    {
        $res_id = $_GET["res_id"];
    }
    
    $rqry = "select * from restaurant where res_id = $res_id";
    $rres = mysqli_query($con,$rqry);
    $rrow = mysqli_fetch_row($rres);
    $name = $rrow[1];
    $image = $rrow[3];
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <link rel="icon" href="./Images/Restaurants/download.png" type="image/icon type">
<link rel="stylesheet" href="menu2.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    
    <!--Header section start-->
    <header>
        <a href="#" class="logo"><i class="fa fa-utensils"></i>FoodRide</a>
        <nav class="navbar">
            <a class="active" href="userhome2.php">Home</a>
            <a href="userRest.php">Restaurants</a>
            <a href="userOrder.php">Orders</a>
            <a href="#" onclick="openAbout()">about</a>
            <a href="contact.html" >Contact us</a>
           
            <!-- <a class="feed" id="feedback">feedback</a> -->
            
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="login.html" class="fas fa-sign-in-alt"></a>
            
        </div>

         <!--search form-->
    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close1"></i>
    </form>
    <!--Search Form ends-->
    </header>

<!--Rating Form starts-->

<div class="back">
    <div class="container1" id="co1">
        <div class="post">
            <div class="text">Thanks for Rating us!</div>
            <div class="edit">Edit</div>
            <i class="fas fa-times" id="close"></i>
    
        </div>
        <div class="star-widget">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="#">
            <i class="fas fa-times" id="close"></i>
            <h4></h4>
            <div class="textarea">
                <textarea cols="30" placeholder="Describe your experience"></textarea>
    
            </div>
            
            <div class="btn">
                <button type="submit">Post</button>
            </div>
        </form>
        </div>    
    </div>
    </div>
<!--Rating form ends-->
<!--side bar-->

<nav class="sidebar">
    <div class="text">
    <!-- <a href="./ksbakers.html"><i class="fa fa-home"></i></a> -->
    <?php echo "<a href='userMenu.php?res_id=$res_id'><h2><b style='color: black'>Menu</b></h2></a>";?>


   <br>
    <ul>

        <?php       
            if(isset($_GET["res_id"]))
            {
                $res_id = $_GET["res_id"];
                $qry = "select distinct cat_id from items where res_id = $res_id";
                $res = mysqli_query($con,$qry);
                while($row = mysqli_fetch_row($res))
                {
                    $sqry = "select * from category where cat_id = $row[0]";
                    $sres = mysqli_query($con,$sqry);
                    $srow = mysqli_fetch_row($sres);
                    echo "<li><a href='#' onclick=''>$srow[1]</a></li>";
                }

            }
            else
            {
                if (isset($_SESSION["res_id_log"])) 
                {
                    $res_id = $_SESSION["res_id_log"];
                    $qry = "select distinct cat_id from items where res_id = $res_id";
                    $res = mysqli_query($con,$qry);
                    while($row = mysqli_fetch_row($res))
                    {
                        $sqry = "select * from category where cat_id = $row[0]";
                        $sres = mysqli_query($con,$sqry);
                        $srow = mysqli_fetch_row($sres);
                        echo "<li><a href='userMenuCat.php?res_id=$res_id&cat_id=$srow[0]' onclick=''>$srow[1]</a></li>";
                }
            }
            }
        ?>    

    </ul>
</div>
</nav>
<!--Side bar ends-->

<section class="home" id="home">
    <div class="barb">
    <h2><?php echo $name;?></h2>
    <h2><img src="<?php echo $image;?>" height="100"></h2>
    <hr class="line">
    </div>
</section>
<section class="brd">
    
    <!-- <h4>Bread</h4>  --> 
    <div class="box-bread">
    
        <?php
            $mqry = "select * from items where res_id = $res_id";
            $mres = mysqli_query($con,$mqry);
            while($mrow = mysqli_fetch_row($mres))
            {
                echo "<div class='box'>";
                echo "<img src='$mrow[4]' height='150px'>";
                echo "<h3>$mrow[3]</h3>";
                $pqry = "select price from price where item_id = $mrow[0] && price_date <= curdate()";
                $priceres = mysqli_query($con,$pqry);
                                               $pricerow = mysqli_fetch_row($priceres);
                                               $rowprice = $pricerow[0];
                echo "<span>₹$rowprice</span>";
                echo "<br>";
                echo "<a href='cart.php?item_id=$mrow[0]&res_id=$res_id' class='btn'>Add to cart</a>";
            echo "</div>";
            }
        ?>
        
    
</div>
    
</section>
<div class="arrow">

<a href="#home"><i class="fas fa-arrow-up"></i></a>
</div>
<div id="about" class="about">
    <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="about-overlay">
        <h1>About us</h1>
        <p>Launched in 2021, Our technology platform connects customers,<br> 
        restaurant partners and delivery partners, serving their multiple needs. <br>
        Customers use our platform to search and discover restaurants, read and write customer 
        generated reviews and view and upload photos,<br> order food delivery, book a table and make 
        payments while dining-out at restaurants. On the other hand,<br> we provide restaurant partners 
        with industry-specific marketing tools which enable them to engage and acquire customers<br> to 
        grow their business while also providing a reliable <br>and efficient last mile delivery service. 
        We also operate a one-stop procurement solution, <br>Hyperpure, which supplies high quality ingredients 
        and kitchen products to restaurant partners.<br> We also provide our delivery partners with transparent 
        and flexible earning opportunities. </p>
    </div>
</div>
<!--Footer Section-->
<footer class="footer">
    <div class="container">
        <div class="row">
            
            <div class="footer-col">
                <ul>
                    <i class="fa fa-utensils"></i>
                    <span>FoodRide</span>
                </ul>
                <div class="map">
                    <ul>
                        <i class="fa fa-map-marker"></i>
                            <span style="font-size: medium;">Address : A-118, Orbit, Vapi, Gujarat - 396191
                            </span>
                    </ul>
                    </div>
                <div class="mail">
                    <ul>
                        <i class="fas fa-inbox"></i>
                        <span style="color:orange;font-size: medium;">
                            Write us at : support@foodride.com
                        </span>
                    </ul>
                </div>
            </div>
            

            </div>
            </div>
            

</footer>

<!--Home  ends-->


<!--Java Script-->
<script>
        let menu = document.querySelector('#menu-bars');
        let navbar = document.querySelector('.navbar');
        
        menu.onclick = () => {
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');
        }
        window.onscroll=() => {
            menu.classList.remove('fa-times');
            navbar.classList.remove('active');
        }
        document.querySelector('#search-icon').onclick=() => {
            document.querySelector('#search-form').classList.toggle('active');
        }
        document.querySelector('#close1').onclick=() => {
            document.querySelector('#search-form').classList.toggle('active');
        }
        document.querySelector("#feedback").onclick=() =>{
        document.querySelector("#co1").classList.toggle("active");
    }
        document.querySelector("#close").onclick=() =>{
        document.querySelector("#co1").classList.toggle("active");

    }
    function myfun(){
        document.getElementById("cakes").style.display="block";
    }
    function myfunction(){
        document.getElementById("precakes").style.display="block";
    }
    function mypastry(){
        document.getElementById("pastry").style.display="block";
    }
    function myburger(){
        document.getElementById("burger").style.display="block";
    }
    function mybread(){
        document.getElementById("bread").style.display="block";
    }
    function mysandwich(){
        document.getElementById("sandwich").style.display="block";
    }
    function mypizza(){
        document.getElementById("nonpizza").style.display="block";
    }
    
        const btn = document.querySelector("button");
        const post = document.querySelector(".post");
        const widget = document.querySelector(".star-widget");
        const editBtn = document.querySelector(".edit");
    
        btn.onclick = () =>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = () =>{
            widget.style.display = "block";
            post.style.display = "none";
        }
        return false;
    }
      function openAbout(){
        document.getElementById("about").style.width = "100%";

    }
    function closeNav(){
        document.getElementById("about").style.width = "0%";
    }
   
       
</script>
<!--JavaScript ends -->

</body>
</html>