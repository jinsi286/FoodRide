<?php
    session_start();
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }

    if(isset($_GET["itemid"]) && isset($_GET["editid"]))
    {
        $item_id = $_GET["itemid"];
        $cart = $_SESSION["cart"];
        $size = count($cart);
        if($_GET['editid'] == 1)
        {
          for($i = 0; $i < $size; $i++)
          { 
              if($cart[$i][0] == $item_id && $cart[$i][2]<10)
              {
                  $cart[$i][2] = $cart[$i][2] + 1;

              }
          }
        }
        else
        {
          for($i = 0; $i < $size; $i++)
        { 
            if($cart[$i][0] == $item_id && $cart[$i][2]>1)
            {
                $cart[$i][2] = $cart[$i][2] - 1;

            }
            
        }
        }
        $_SESSION["cart"] = $cart;
         header("location:cart.php");

    }

    if(isset($_GET["itemid"]) && isset($_GET["delid"]))
    {
        $item_id = $_GET["itemid"];
        $cart = $_SESSION["cart"];
        $size = count($cart);
        for($i = 0; $i < $size; $i++)
        { 
            if($cart[$i][0] == $item_id)
            {
              unset($cart[$i]);
            }
        }
        $cart2 = array_values($cart);
        $_SESSION["cart"] = $cart2;
        header("location:cart.php");
        
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
            $_SESSION["res_id_prev"] = $res_id;
            unset($_SESSION["res_id_log"]);
            unset($_SESSION["item_id_log"]);
            $pqry = "select price from price where item_id = $item_id && price_date <= curdate()";
            $priceres = mysqli_query($con,$pqry);
            $pricerow = mysqli_fetch_row($priceres);
            $rowprice = $pricerow[0];

            if(isset($_SESSION["cart"]) && $res_id == $_SESSION['sameres'])
            {
              $cart = $_SESSION["cart"];
              $size = count($cart);
              $flag = false;
              for($i = 0; $i < $size; $i++)
              { 
                if($cart[$i][0]==$item_id)
                {
                  $_SESSION["itemexists"] = true;
                  $flag = true;
                }
                
              }

              if(!$flag)
              {
                  $qty = 1;
                    $newitem = array($item_id,$rowprice,$qty);
                    array_push($cart,$newitem);
                    $_SESSION["cart"] = $cart;
              }


            }
            else
            {
                if($res_id != $_SESSION['sameres'])
                {
                  if(isset($_SESSION['cart']))
                  {
                    $_SESSION['diffres'] = true;
                  }
                }
                $_SESSION['sameres'] = $res_id;
                $_SESSION["cart"] = array(array($item_id,$rowprice,1));
            }
            header("location:userMenu.php?res_id=$res_id");
    }

    
}


?>


<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,250,600,700,800,900&display=swap');

    * {
      font-family: "Poppins", sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    .column1 {
      width: 100%;
      padding: 10px;
      height: auto;


    }

    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 1.5em;
      min-width: 400px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      overflow-y: scroll;
      overflow: hidden;
    }

    .styled-table thead tr {
      color: #ffffff;
      text-align: left;
    }



    @media screen and (max-width: 600px) {
      .column1 {
        width: 100%;
      }
    }

    table {
      width: 100%;
    }

    .styled-table th,
    .styled-table td {
      padding: 12px 15px;
      font-weight: 600;
    }

    .styled-table td{
      color: rgb(58, 55, 54);
    }

     .styled-table tbody tr {
    border-bottom: 1px solid orangered;
} 


    .styled-table tbody tr:last-of-type {
      border-bottom: 2px solid orangered;
    }

    .styled-summary {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      min-width: 400px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      overflow-y: scroll;
      overflow: hidden;
    }

    .btn{
      position: absolute;
      top:55px;
      right:0;
      background-color: green;
      color: white;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
    }
    .btn2{
      position: absolute;
      background-color: orangered;
      color: white;
      width: 550px;
      font-weight: bold;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
      left: 30%;
    }
  </style>
</head>

<body>
  <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Shopping Cart</h2>
    <a class="btn" href="userhome2.php">  &#8592; Back to Home</a>
    <form name="frm" action="address.php" method="post">
    <table>
      <thead>
        <tr style="color:rgb(40, 40, 40)"> 
        <th colspan="4"><h3>Your Order details:</h3></th>
      </tr>
      </thead>
      
      <?php
                    
                        
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
                                    
      echo "<tr>";
        echo "<td><img src='$img' height='55px' width='75px'></td>";
        echo "<td>$name</td>";
        echo "<td>&#8377;".$cart[$i][1]."</td>";
        echo "<td><a style='text-decoration:none; padding:5px;color:black' href='cart.php?itemid=$item_id&editid=0' name='minus'>-</a>".$cart[$i][2]."<a style='text-decoration:none; padding:5px;color:black' href='cart.php?itemid=$item_id&editid=1' name='plus'>+</a></td>";
        echo "<td><a href='cart.php?itemid=$item_id&delid=1' style='text-decoration:none; color:red' name = 'delete' >x</a></td>";
      echo "</tr>";
    }
  }
  ?>
      <tr><br></tr>
    </table>

    <br>
    <h3 style="color:rgb(63, 61, 61); font-weight:bold">Summary</h3>
    <br>
    <h5>Total Price:
    <?php
        if(isset($_SESSION["cart"]))
                        {
                            $cart = $_SESSION["cart"];
                            $size = count($cart);
                            $sum = 0;
                            for($i = 0; $i < $size; $i++)
                            {   $value = $cart[$i][1] * $cart[$i][2];
                                $sum = $sum + $value;
                            }
                            echo '&nbsp;&nbsp;&nbsp;&#8377;'.$sum;
                            echo "<br>";
                        $tax = 0.05*$sum;
                        $_SESSION['tax'] = $tax;
                        echo "Tax : &nbsp;&nbsp;&nbsp;&#8377;".$tax.'</h5>';
                        $total = $sum + $tax;
                        $_SESSION['total'] = $total;
                        }
                        
    ?>
    <h5>Coupon Code: <input type="text" name="discount"><a href='#' style='color: white; background-color: green; padding:5px;margin-left: 5px; text-decoration: none;' name="apply" onclick="<?php discount()?>">Apply</a></h5>
    <?php 
      function discount()
      {
        echo "Yes";
      }
    ?>

    <h5></h5>

    <a href="address.php"><input type="submit" class="btn2" name="order" value="Place Order"></a>
    <?php
    if(isset($_POST["order"]))
    {
      $_SESSION['placeorder'] = true;
    }
    ?>
  </div>
  </div>
</form>

</body>

</html>