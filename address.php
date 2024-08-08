<?php
    session_start();
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }

    if(!isset($_SESSION['placeorder']))
    {
        header("userhome2.php");
    }

    $userid = $_SESSION["user_id"];
    $qry = "select * from user where user_id = $userid";
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
    .btn3{
      position: absolute;
      background-color: orange;
      color: white;
      /*width: 550px;*/
      /*font-weight: bold;*/
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
        right: 0;
        top: 150px;
    }
  </style>
</head>
<body>
    <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Confirm Address</h2>
    <a class="btn" href="cart.php">  &#8592; Back to Cart</a>
    <br>
    <a class="btn3" href="userhome2.php">  &#8592; Home</a>
     <form name="frm" action="#" method="post">
        <?php 
        $res = mysqli_query($con,$qry);
        $row = mysqli_fetch_row($res);
        ?>
    <table>
        <tr>
            <?php
            $flag = false;
            if($row[5]=='' && $row[8]=='')
            {
                ?>
                <td>Enter your Address:</td>
                <td><textarea rows="5px" cols="60px" name="address"></textarea></td>
                <?php
                $flag = true;

            }
            else
                {
                    ?>
                    <td>Select your address:</td>
                    <td><input type="radio" name="address" value='<?php echo $row[5];?>' required><?php echo $row[5];?>
                        <br>
                        <input type="radio" name="address" value='<?php echo $row[8];?>'><?php echo $row[8];?></td>
                        <?php 
                    }
                    ?>
        </tr>
    </table>
    <input type="submit" class="btn2" name="orderaddress" value="Proceed to order">
</form>
</div>
<?php 
    if(isset($_POST['orderaddress']))
    {
        if($flag)
    {
        $address = $_POST['address'];
        $uqry = "update user set address=$address where user_id = $userid";
        $res = mysqli_query($con,$uqry);
        $_SESSION['address'] = $_POST['address'];
    }
    else
    {
        $address = $_POST['address'];
        $_SESSION['address'] = $address;
    }
    $res_id = $_SESSION['res_id_prev'];
    $tax = $_SESSION['tax'];
    $date = date('Y-m-d');
    $total = $_SESSION['total'];
    echo $qry = "insert into orders (user_id,res_id,discount,tax,orderdate,address,total) values($userid,$res_id,0,$tax,'$date','$address',$total)";
    $res = mysqli_query($con,$qry);
    echo $sqry = "select max(order_id) from orders";
    $sres = mysqli_query($con,$sqry);
    $row = mysqli_fetch_row($sres);
    $cart = $_SESSION['cart'];
    $size = count($cart);
    for($i = 0; $i < $size; $i++)
        { 
            $item_id = $cart[$i][0];
            $qty = $cart[$i][2];
            $price = $cart[$i][1];

            echo $aqry = "insert into orderdetails(order_id,item_id,qty,price) values ($row[0],$item_id,$qty,$price)";
            $ares = mysqli_query($con,$aqry);
        }
        echo "<script>alert('Order Placed Successfully!')</script>";
        $ordered = true;
    if($ordered)
    {
        unset($_SESSION['cart']);
        unset($_SESSION['res_id_prev']);
        unset($_SESSION['tax']);
        unset($_SESSION['address']);
        unset($_SESSION['total']);
        $ref = true;
    }
    if($ref)
    {
        header("location:ordered.php");
    }
}
?>
</body>
</html>