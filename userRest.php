<?php
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }
    if(isset($_GET['cat_id']))
    {
        $cat_id = $_GET['cat_id'];
        $rqry = "select distinct res_id from items where cat_id = $cat_id";
    }
    else
    {
    $rqry = "select res_id from admin where approved = 1 && usertype_id=2";

    }
    $rres = mysqli_query($con,$rqry);
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
            <a href="userhome2.php">Home</a>
            <a class="active" href="userRest.php">Restaurants</a>
            <a href="userOrder.php">Orders</a>
            <a href="#" onclick="openAbout()">about</a>
            <a href="contact.html" >Contact us</a>
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
        <!--Restaurants-->
<br>
<br>
<div class="spl">
    <h2>&nbsp;&nbsp;&nbsp;Restaurants</h2>
    <!-- <hr class="line"> -->
    <br><br>
</div>

 <section class="barb" id="biryani">
    <!-- <h2>Our Specials</h2>
    <hr class="line">  -->
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