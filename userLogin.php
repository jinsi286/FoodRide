<?php
session_start();
$con = mysqli_connect("localhost","root","","project");
if(!$con)
{
    echo "Connection failed";
}
else
{
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login/Register</title>
        <link rel="stylesheet" href="login2.css">
        
    </head>
<body>
    
  <div class="container">
      <div class="formbx">
        <div class="form signinform">
            <form name="frm" action="#" method="post">
                <a href="userhome2.php"><h2 style="color: orangered">FoodRide</h2></a>
                <h3>Sign In</h3>
                <input type="text" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <a>
                <input type="submit" value="Login" name="login">
                </a>
                <br><br>
            </form>

            <h4>Dont Have an Account ?</h4>
            <a href="userRegister.php" style="color: redorange">
            Sign Up
          </a>
        </div>
      </div>
      </div>

      <?php
        if(isset($_POST["login"]))
        {
          $email = $_POST["email"];
          $password = $_POST["password"];
          $qry = "select * from user where email = '$email' && password = '$password'";
          $res = mysqli_query($con,$qry);
          $cnt = mysqli_num_rows($res);


          if($cnt>=1)
          {
            $row = mysqli_fetch_row($res);
            $_SESSION["user_id"] = $row[0];
            if(isset($_SESSION["res_id_log"])  && isset($_SESSION["item_id_log"]))
            {
                   header("location:userMenu.php");
            }
            else
            {
                header("location:userhome2.php");
            }
            
          }
          else
          {
            echo "failed";
          }
        }
      ?>
      
</body>
</html>