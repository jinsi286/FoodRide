
<?php
    session_start();
    $con = mysqli_connect("localhost","root","","project");
    if(!$con)
    {
        echo "Connection failed";
    }


    $userid = $_SESSION["user_id"];
    if(!$userid)
    {
        header("location:userLogin.php");
    }


    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
 </style>
</head>

<body>
  <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Order History</h2>
    <a class="btn" href="userhome2.php">  &#8592; Back to Home</a>
    <form name="frm" action="address.php" method="post">
    
          <?php 
                $qry = "select * from orders where user_id = $userid order by order_id desc";
                $res = mysqli_query($con,$qry);
                while($row = mysqli_fetch_row($res))
                {
                  echo '<table align="left">';
                  echo '<thead>';
                    echo '<tr style="color:rgb(40, 40, 40)">';
                    $sqry = "select rest_name,address,image from restaurant where res_id = $row[2]";
                    $sres = mysqli_query($con,$sqry);
                    $srow = mysqli_fetch_row($sres);
                    echo "<td><img src='$srow[2]' height='55px' width='75px'";
                    echo "colspan='4' style='text-decoration:underline'>&nbsp;&nbsp;$srow[0]</td>";
                    echo "<tr><td colspan='4' style='font-size:15px;color:grey'>Address:&nbsp;&nbsp;$srow[1]</td></tr>";
                    echo '</thead>';
                    $mqry = "select * from orderdetails where order_id = $row[0]";
                    $mres = mysqli_query($con,$mqry);
                    echo "<tbody style='font-size:20px'>";

                    while($mrow = mysqli_fetch_row($mres))
                    {
                        $iqry = "select item_name from items where item_id = $mrow[2]";
                        $ires = mysqli_query($con,$iqry);
                        $irow = mysqli_fetch_row($ires);
                        echo "<tr><td>$irow[0]&nbsp;x&nbsp;";
                        echo "$mrow[3]</td>";
                      }
                      echo "<tr><td style='color:darkblue'>Total Price:&nbsp;&#8377;&nbsp;$row[7]</td></tr>";
                      echo "<tr><td style='color:grey'>Ordered on :&nbsp;&nbsp;$row[5]</td></tr>";
                      if($row[8]==0)
                      {
                        echo "<tr><td style='color:red'>Ordered<strong><em></em></strong></td></tr>";
                      }
                      else if($row[8]==1)
                      {
                        echo "<tr><td style='color:red'>Accepted<strong><em></em></strong></td></tr>";
                        echo "<tr><td style='color:grey'>Your order is being prepared...<strong><em></em></strong></td></tr>";
                      }
                      else if($row[8]==2)
                      {
                        echo "<tr><td style='color:red'>Prepared<strong><em></em></strong></td></tr>";
                        echo "<tr><td style='color:grey'>Your order is ready to be picked Up..<strong><em></em></strong></td></tr>";
                      }
                      else if($row[8]==3)
                      {
                        echo "<tr><td style='color:red'>Picked Up<strong><em></em></strong></td></tr>";
                        $dqry = "select * from delpartner where del_id = $row[9]";
                        $dres = mysqli_query($con,$dqry);
                        $drow = mysqli_fetch_row($dres);
                        echo "<tr><td><strong>Delivery Partner Details:</strong></td></tr>";
                        echo "<tr><td style='color:grey'>$drow[1]<br>Contact number: +91 $drow[5]<strong><em></em></strong></td></tr>";

                    }
                    else
                    {
                        echo "<tr><td style='color:green'>Delivered<strong><em></em></strong></td></tr>";
                    }

                      echo "<tr><td style='color:red'><strong><em></em></strong></td></tr>";
                      echo "</tbody>";
                    echo '</table>';
                    echo "<hr>";
                }

                ?>
      </tr>
      </thead>
    </table>
  </form>
</div>
</body>
</html>
      