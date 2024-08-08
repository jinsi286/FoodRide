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
     
      <div class="formbx" style="height:550px">
        
        <div class="form signinform">
            <form name="frm" action="#" method="post">
              <br>
                <a href="userhome2.php"><h2 style="color: orangered">FoodRide</h2></a>
                <h3>Sign Up</h3>

                <input type="text" placeholder="Enter Your Name" name="name" required>
                <input type="text" placeholder="Email" name="email" required>
                <!-- <input type="date" placeholder=" Enter your Date of birth"> -->
                <input type="password" placeholder="Password" name="password" required>
                <input type="password" placeholder="Confirm password" required>
                <input type="submit" name="register" value="Register">
            </form>
            <h4>Already have an Account ?</h4>
            <a href="userLogin.php" style="color: redorange">
            Sign In
          </a>
        </div>
      </div>
      </div>


      <?php 
        if(isset($_POST["register"]))
        {
          $name = $_POST["name"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $qry = "insert into user (name,email,password) values ('$name','$email','$password')";
          $res = mysqli_query($con,$qry);

          if($res)
          {
            
             header("location:userhome2.php");
          }
          else
          {
            echo "failed";
          }
        }
      ?> 
      
</body>
</html>