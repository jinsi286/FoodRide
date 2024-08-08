<?php
    session_start();
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }

    $qry = "select distinct cat_id from items";
    $res = mysqli_query($con,$qry);
    $rqry = "select res_id from admin where approved = 1 && usertype_id=2";
    $rres = mysqli_query($con,$rqry);

    $user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="./Images/Restaurants/download.png" type="image/icon type">
<link rel="stylesheet" href="home2.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    
</div>

    <!--Header section start-->
    <header>
        <a href="#" class="logo"><i class="fa fa-utensils"></i>FoodRide</a>
        <nav class="navbar">
            <a class="active" href="userhome2.php">Home</a>
            <a href="userRest.php">Restaurants</a>
            <a href="userOrder.php">Orders</a>
            <a href="#" onclick="openAbout()">about</a>
            <a href="./contact.html" >Contact us</a>
           
            <!-- <a class="feed" id="feedback">feedback</a> -->
            
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <a href="userProfile.php" class="fa fa-user" aria-hidden="true"></i>
            <a href="userLogout.php" class="fas fa-sign-in-alt"></a>
            
        </div>
    </header>
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
    <!-- Header section ends-->

    <!--search form-->
    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close1"></i>
    </form>
    <!--Search Form ends-->

    <!--Home section start-->
    <section class="home" id="home-section">
<!--Add-->
<div class="add">
 <div class="add-container">
 <img src="burgerbanner.jpg">
 <div class="textimg"><h3>Welcome to</h3><h2 style="color:orange;">FoodRide</h2>
 <a href="userRest.php"><button class="ordr">Order Now</button></a></div>
 
 </div>
</div>
<!--Add ends-->
<!--Specials-->
    <div class="spl">
        <h2>Our Specials</h2>
</div>
<div class="table">
   
    <?php 

                    while($row = mysqli_fetch_row($res))
                    {
                        $cqry = "select * from category where cat_id = $row[0]";
                        $cres = mysqli_query($con,$cqry);
                        $crow = mysqli_fetch_row($cres);
                        echo "<a href='userRest.php?cat_id=$crow[0]'><img src='$crow[2]' height='150' width='250px'><h4>$crow[1]</h4></a>";
                    }
                ?>
</div>

<!--Restaurants-->
<br>
<br>
<div class="spl">
    <h2>&nbsp;&nbsp;&nbsp;Restaurants</h2>
    
    <br><br>
</div>

 <section class="barb" id="biryani">
    
    <div class="box-container">
    <?php

        while($rrow = mysqli_fetch_row($rres))
        {
            echo "<div class='box'>";
            $sqry = "select * from restaurant where res_id = $rrow[0]";
            $sres = mysqli_query($con,$sqry);
            $srow = mysqli_fetch_row($sres);
            echo "<a href='userMenu.php?res_id=$srow[0]'><img src='$srow[3]' height='150px'></a>";
            echo "<h2>$srow[1]</h2>";
            
            

        echo "</div>";
        }
    ?>
        

    </div>
    </section>
    

</section>
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
        // document.querySelector("#feedback").onclick=() =>{
        // document.querySelector("#co1").classList.toggle("active");
    // }
        document.querySelector("#close").onclick=() =>{
        document.querySelector("#co1").classList.toggle("active");
    }
    var preloader = document.getElementById("loading");
    function myload() {
        preloader.style.display="none";
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
    var preloader = document.getElementById("loader");
    
    function myloader(){
        preloader.style.display = "none";
    }
    function mygrocery(){
        confirm("Order Now on Whatsapp click ok to continue");
    }
    </script>
    
    <!--JavaScript ends -->

</body>
</html>