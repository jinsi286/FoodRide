<?php
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }

    if(isset($_GET["cat_id"]))
    {
        $cat_id = $_GET["cat_id"];
    }
    else
    {
        header("location:userhome2.php");
    }

    $rqry = "select distinct res_id from items where cat_id = $cat_id";
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
<body onload="myload()">
<div class="loader-container" id = "loader">
    <img src="loader.gif">
    
</div>

    <!--Header section start-->
    <header>
        <a href="#" class="logo"><i class="fa fa-utensils"></i>FoodRide</a>
        <nav class="navbar">
            <a class="active" href="userhome2.php">Home</a>
            <a href="userRest.php">Restaurants</a>
            <a href="#">Orders</a>
            <a href="#" onclick="openAbout()">about</a>
            <a href="./contact.html" >Contact us</a>
           
            <!-- <a class="feed" id="feedback">feedback</a> -->
            
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <!-- <a href="#" class="fas fa-heart"></a> -->
            <a href="#" class="fas fa-shopping-cart"></a>
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="login.html" class="fas fa-sign-in-alt"></a>
            
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
            echo "<a href='userMenuCat.php?cat_id=$cat_id&res_id=$rrow[0]'><img src='$srow[3]' height='150px'></a>";
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
                    <span>Foodies.</span>
                </ul>
                <div class="map">
                    <ul>
                        <i class="fa fa-map-marker"></i>
                            <span>5th Floor,
                                A-118,Sangareddy, Hyderabad, Telangana - 502001
                            </span>
                    </ul>
                    </div>
                <div class="mail">
                    <ul>
                        <i class="fas fa-inbox"></i>
                        <span>
                            support@foodies.com
                        </span>
                    </ul>
                </div>
            </div>
            
            <div class="footer-col">
                <h4>Foodies</h4>
                <ul>
                    <li><a href="#" onclick="openAbout()">about us</a></li>
                    <li><a href="#">Our services</a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">Payment policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Delivery</a></li>
                    <li><a href="#">My orders</a></li>
                    <li><a href="#">Order Status</a></li>
                    <li><a href="#">Payment options</a></li>

                </ul>
                </div>
                <div class="footer-col">
                    <h4>Order Now</h4>
                    <ul>
                        <li><a href="./dishes.html">Biryani's</a></li>
                        <li><a href="./dishes.html">Restaurants</a></li>
                        <li><a href="./dishes.html">Starters</a></li>
                        <li><a href="./dishes.html">Fast food</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/login"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>

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