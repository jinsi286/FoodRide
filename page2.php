<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="./Images/Restaurants/download.png" type="image/icon type">
<link rel="stylesheet" href="home.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body onload="myload()">
<div class="loader-container" id = "loader">
    <img src="./Images/loader/loader.gif">
    
</div>

    <!--Header section start-->
    <header>
        <a href="#" class="logo"><i class="fa fa-utensils"></i>Foodies.</a>
        <nav class="navbar">
            <a class="active" href="./home.html">Home</a>
            <a href="./dishes.html">dishes</a>
            <a href="#" onclick="openAbout()">about</a>
            <a href="./contact.html" >Contact us</a>
           
            <a class="feed" id="feedback">feedback</a>
            <a href="#">Orders</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <a href="#" class="fas fa-heart"></a>
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
<!--Add-->
<div class="add">
 <div class="add-container">
 <img src="burgerbanner.jpg">
 <div class="textimg"><h2>30% off on your<br> first order</h2>
 <a href="./ksbakers.html"><button class="ordr">Order Now</button></a></div>
 
 </div>
</div>
<!--Add ends-->
<!--Specials-->
    <div class="spl">
        <h2>Our Specials</h2>
</div>
<div class="table">
    <a href="./dishes.html"><img src="./Images/Dishes/Chicken-Biryani.jpg" height="150"><h4>Biryani</h4></a>
    <a href="./dishes.html"><img src="./Images/Dishes/chicken.jpeg" height="150"><h4>Chicken Lolipop</h4></a>
    <a href="./dishes.html"><img src="./Images/Dishes/panner tikka.jpg" height="150"><h4>Panner Tikka</h4></a>
    <a href="./dishes.html"><img src="./Images/Dishes/garlicprawns.jpg" height="150"><h4>Garlic Prawns</h4></a>
    <a href="./dishes.html"><img src="./Images/Dishes/vegpulao.jpg" height="150"><h4>Veg Pulao</h4></a>
    <a href="./dishes.html"><img src="./Images/Dishes/apollo fish.jpg" height="150"><h4>Apollo fish</h4></a>
</div>

<!--Top Restaurants-->
<div class="top-re">
    <h2>Top Restaurants</h2>
</div>
<div class="table1">
    <a href="./Barbeque.html"><img src="./Images/Restaurants/barbeque.jpg" height="150"><h4>Barbeque</h4><p>tandoori, biryani, Starters</p></a>
    <a href="./mehfil.html"><img src="./Images/Restaurants/mehfil.jpg" height="150"><h4>Mehfil</h4><p>tandoori, biryani</p></a>
    <a href="./paradise.html"><img src="./Images/Restaurants/paradise.jpg" height="150"><h4>Paradise</h4><p>tandoori, biryani, Starters, deserts</p></a>
    <a href="./ramkibandi.html"><img src="./Images/Restaurants/ramkibandi.jpg" height="150"><h4>Ram Ki Bandi</h4><p>dosa</p></a>
    <a href="./dominos.html"><img src="./Images/Restaurants/dominos.jpg" height="150"><h4>Domino's</h4><p>Pizza, Burger</p></a>
    <a href="./vantilu.html"><img src="./Images/Restaurants/vantilu.jpeg" height="150"><h4>Vantillu</h4><p>tandoori, biryani, Starters</p></a>
    <a href="./platform65.html"><img src="./Images/Restaurants/platform65.jpg" height="150"><h4>Platform65</h4><p>tandoori, biryani, Starters</p></a>
</div>
<div class="container-grocery">
  <img src="./Images/banner/grocery-delivery.png" alt="Norway" style="width:100%;">
  <div class="text-block">
    <h2>Chotu!</h2>
    <h4>Anything you need, delivered</h4>
    <p>Get your grocery, meat, vegetables at your door step<br>
    Stay Home and Enjoy our services.</p>
    <div class="ordergrocery">
  <a href="https://api.whatsapp.com/send?phone=+917717406841&text=I wanted to order grocery/meat/vegetables" class="orderg" onclick="mygrocery()"><i class="fab fa-whatsapp"></i> Order Now</a>
  </div>
  </div>
  
</div>

<!--Restaurants-->
<div class="res">
    <h2>14 Restaurants</h2>
    <hr class="line">
</div>
<section class="barb" id="biryani">
    <h1 class="barbeque">Restaurants</h1>
    <hr class="line"> 
    <div class="box-container">
    <div class="box">
        <a href="./barbeque.html"><img src="./Images/Restaurants/barbeque.jpg"></a>
        <h3>Barbeque</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./mehfil.html"><img src="./Images/Restaurants/mehfil.jpg"></a>
        <h3>Mehfil</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./dominos.html"><img src="./Images/Restaurants/dominos.jpg"></a>
        <h3>Domino's</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Pizza ,Burger, Bread</p>

        </div>
        </div>
        <div class="box">
        <a href="./paradise.html"><img src="./Images/Restaurants/paradise.jpg"></a>
        <h3>Paradise</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./ramkibandi.html"><img src="./Images/Restaurants/ramkibandi.jpg"></a>
        <h3>Ram ki Bandi</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Idli, Dosa, Breakfast</p>

        </div>
        </div>
        <div class="box">
        <a href="./vantilu.html"><img src="./Images/Restaurants/vantilu.jpeg"></a>
        <h3>Vantillu</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./platform65.html"><img src="./Images/Restaurants/platform65.jpg"></a>
        <h3>Platform 65</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./hoteladaab.html"><img src="./Images/Restaurants/aadab.png"></a>
        <h3>Hotel Adaab</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./fishland.html"><img src="./Images/Restaurants/fishland.jpg"></a>
        <h3>Fish Land</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./hitech.html"><img src="./Images/Restaurants/hitech.jpg"></a>
        <h3>hitech</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./hotnspicy.html"><img src="./Images/Restaurants/hotnspicy.jpg"></a>
        <h3>Hot N Spicy</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./mughal.html"><img src="./Images/Restaurants/mughal.jpg"></a>
        <h3>Mughal Restaurants</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        <div class="box">
        <a href="./ksbakers.html"><img src="./Images/Restaurants/ksbakers.png"></a>
        <h3>KS Bakers</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <br>
            <p>Starters,biryani,tandoori</p>

        </div>
        </div>
        

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
                        <a href="https://www.linkedin.com/login"><i class="fab fa-linkedin-in"></i></a>

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