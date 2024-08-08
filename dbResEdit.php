<?php
session_start();
$con = mysqli_connect("localhost","root","","project");
if(!$con)
{
    echo "Connection failed";
}

$res_id = $_SESSION["res_id"];
if(!$res_id)
{
    header("location:ResLogin.php");
}


if(isset($_POST["save"]))
{
    $rest_name = $_POST["rest_name"];
    $address = $_POST["address"];
    $owner_name = $_POST["owner_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $filename = $_FILES["uploadimg"]["name"];
    if($filename != "")
    {
    	$tmpname = $_FILES["uploadimg"]["tmp_name"];    
        $folder = "RestaurantImages/".$filename;
        move_uploaded_file($tmpname,$folder);
        $rest_img = $folder;
        $qry = "update restaurant set rest_name = '$rest_name',address = '$address',image = '$rest_img',owner_name = '$owner_name',email = '$email',mobile = '$mobile',password = '$password'  where res_id = $res_id";
    }
    else
    {
    	$qry = "update restaurant set rest_name = '$rest_name',address = '$address',owner_name = '$owner_name',email = '$email',mobile = '$mobile',password = '$password' where res_id = $res_id";
    }
    $sres = mysqli_query($con,$qry);
    if(!$sres)
    {
        echo "failed";
    } 
    else
    {
    	header("location:ResProfile.php");
    }
}