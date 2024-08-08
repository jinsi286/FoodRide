<?php

$con = mysqli_connect("localhost","root","","project");
if(!$con)
{
    echo "Connection failed";
}

if(isset($_GET["delid"]))
{
    $delid = $_GET["delid"];
    $qry = "delete from category where cat_id = $delid";
    $res = mysqli_query($con,$qry);
    if(!$res)
    {
        echo "deletion failed";
    }
    else
    {
        header("location:category.php");
    }
}

if($con)
{
    if(isset($_POST["addcat"]))
    {
        if($_POST["addcat"] == "Add")
        {
            $cat_name = $_POST["cat_name"];

            $filename = $_FILES["uploadimg"]["name"];
            $tmpname = $_FILES["uploadimg"]["tmp_name"];    
            $folder = "CategoryImages/".$filename;
            move_uploaded_file($tmpname,$folder);

            $cat_img = $folder;
            $qry = "insert into category (cat_name,cat_img) values('$cat_name','$cat_img')";
            $sres = mysqli_query($con,$qry);
            if(!$sres)
            {
                echo "failed";
            }
            else
            {
            	header("location:category.php");
            } 
        }

        if($_POST["addcat"] == "Save")
        {
            $cat_name = $_POST["cat_name"];
            $cat_id = $_POST["euid"];
            $filename = $_FILES["uploadimg"]["name"];
            if($filename != "")
            {
            	$tmpname = $_FILES["uploadimg"]["tmp_name"];    
	            $folder = "CategoryImages/".$filename;
	            move_uploaded_file($tmpname,$folder);
	            $cat_img = $folder;
	            $qry = "update category set cat_name = '$cat_name',cat_img = '$cat_img' where cat_id = $cat_id";
            }
            else
            {
            	$qry = "update category set cat_name = '$cat_name' where cat_id = $cat_id";
            }
            $sres = mysqli_query($con,$qry);
            if(!$sres)
            {
                echo "failed";
            } 
            else
            {
            	header("location:category.php");
            }
        }
    }
}

?>