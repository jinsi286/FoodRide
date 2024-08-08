<?php
    session_start();
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }

    if(isset($_GET["res_id"]) && isset($_GET["item_id"]))
    {
        $_SESSION["res_id_log"] = $_GET["res_id"];
        $_SESSION["item_id_log"] = $_GET["item_id"];
    }

    $userid = $_SESSION["user_id"];
    if(!$userid)
    {
        header("location:userLogin.php");
    }
    else
    {
        if(isset($_SESSION["res_id_log"]) && isset($_SESSION["item_id_log"]))
        {
            $res_id = $_SESSION["res_id_log"];
            $item_id = $_SESSION["item_id_log"];
            unset($_SESSION["res_id_log"]);
            unset($_SESSION["item_id_log"]);
            $pqry = "select price from price where item_id = $item_id && price_date <= curdate()";
            $priceres = mysqli_query($con,$pqry);
            $pricerow = mysqli_fetch_row($priceres);
            $rowprice = $pricerow[0];

            if(isset($_SESSION["cart"]))
            {
                $cart = $_SESSION["cart"];
                $newitem = array($item_id,$rowprice,1);
                array_push($cart,$newitem);
                $_SESSION["cart"] = $cart;


            }
            else
            {
                
                $_SESSION["cart"] = array(array($item_id,$rowprice,1));
            }
            
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h1><b>Shopping Cart</b></h1></div>
                            <div class="col align-self-center text-right text-muted"><?php
                     if(isset($_SESSION["cart"]))
                    { 
                        $cart = $_SESSION["cart"];
                        $size = count($cart);
                        echo $size." Item(s)";
                    }
                    else{ 
                        echo "0 item(s)";
                    }
                ?>
                    
                </div>
                    
                    
                    <?php
                    if(isset($_SESSION["cart"]))
                    {
                        
                        if(isset($_SESSION["cart"]))
                        {
                            $cart = $_SESSION["cart"];
                            $size = count($cart);
                            for($i = 0; $i < $size; $i++)
                            {
                                $item_id = $cart[$i][0];
                                $qry = "select * from items where item_id = $item_id";
                                $res = mysqli_query($con,$qry);
                                $row = mysqli_fetch_row($res);
                                $name = $row[3];
                                $img = $row[4];
                                    
                                        echo "<div class='row'>";
                                    echo "<div class='row main align-items-center'>";
                                        echo "<div class='col-2'><img class='img-fluid' src='$img'></div>";
                                        echo "<div class='col'>";
                                            // echo "<div class='row text-muted'>Shirt</div>";
                                            echo "<div class='row'>".$name."</div>";
                                        echo "</div>";
                                        echo "<div class='col'>";
                                            echo "<a href='#'>-</a><a href='#' class='border'>1</a><a href='#'>+</a>";
                                        echo "</div>";
                                        echo "<div class='col'>".$cart[$i][1];
                                        echo"<span class='close'>&#10005;</span></div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    
                                
                            }
                        }
                    }
                else
                {
                    echo "<h6>Your Cart is empty</h6>";
                }
                    ?> 
                    </div> 
                    </div>

                     
                    
                    <div class="back-to-shop"><a href="userhome2.php">&leftarrow;Back to Home</a><span class="text-muted"></span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&euro; 137.00</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                </div>
            </div>
            
        </div>
</body>
</html>