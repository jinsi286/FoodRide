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
      text-align: left;
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
      background-color: orange;
      color: white;
      font-weight: bold;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
    }
  </style>
</head>
<body>

    <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Your Profile</h2>
    <a class="btn" href="userhome2.php">  &#8592; Back to Home</a>
    <form name="frm" action="#" method="post">
        <table>
      
      <?php

      $qry = "select * from user where user_id = $userid";
      $res = mysqli_query($con,$qry);
      $row = mysqli_fetch_row($res);
                                    
      echo "<tr>";
      echo "<td>Name:</td>";
      echo "<td><input type='text' name='name' value='$row[1]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Email:</td>";
      echo "<td><input type='text' name='email' value='$row[2]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Password:</td>";
      echo "<td><input type='text' name='password' value='$row[3]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Mobile:</td>";
      echo "<td><input type='text' name='mobile' value='$row[4]'></td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>Address:</td>";
      echo "<td><textarea name='address' cols='60px' rows='5px'>$row[5]</textarea>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Date of Birth:</td>";
      echo "<td><input type='date' name='dob' value='$row[6]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Gender:</td>";
      echo "<td><input type='radio' name='gender' value='1'";
        if($row[7]==1)
        {
            echo 'checked';
        }

      echo ">Male";
      echo "<input type='radio' name='gender' value='0'";
      
        if($row[7]==0)
        {
            echo 'checked';
        }

        echo ">Female</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Alternate Adress:</td>";
      echo "<td><textarea name='altaddress' cols='60px' rows='5px'>$row[8]</textarea>";
      echo "</tr>";
    

  ?>
      <tr colspan='2'><td><input type="submit" class="btn2" name="update" value="Update"></td></tr>
    </table>
    
    </form>

    <?php
    if(isset($_POST["update"]))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $altaddress = $_POST['altaddress'];
        $qry = "UPDATE user SET name='$name',email='$email',password='$password',mobile='$mobile',address='$address',dob='$dob',gender=$gender,alternateadd='$altaddress' WHERE user_id = $userid";
        $res = mysqli_query($con,$qry);
        if($res)
        {
            echo "<script type='text/javascript'>";
            echo "alert('Updated Successfully')";
            echo "</script>";
            $flag = true;
        }

        if($flag)
        {
            header("location:userhome2.php");
        }


    }
    ?>
    
    </body>
    </html>
