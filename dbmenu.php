
<?php

$con = mysqli_connect("localhost","root","","project");
if(!$con)
{
    echo "Connection failed";
}
  

if(isset($_GET["delid"]))
{
    $delid = $_GET["delid"];
    $qry = "delete from items where item_id = $delid";
    $res = mysqli_query($con,$qry);
    if(!$res)
    {
        echo "deletion failed";
    }
    else
    {
        header("location:menu.php");
    }
}



if(isset($_POST["additem"]))
{
    if($_POST["additem"] == "Add")
    {
        echo $res_id = $_POST["res_id"];
        $cat_id = $_POST["category"];
        $item_name = $_POST["item_name"];
        $item_price = $_POST["item_price"];
        $filename = $_FILES["uploadimg"]["name"];
        $tmpname = $_FILES["uploadimg"]["tmp_name"]; 
        $price_date = date("Y-m-d");   
        $folder = "ItemImages/".$filename;
        move_uploaded_file($tmpname,$folder);

        $item_img = $folder;
        $qry = "insert into items (cat_id,res_id,item_name,item_img) values($cat_id,$res_id,'$item_name','$item_img')";
        $sres = mysqli_query($con,$qry);
        $sqry = "select max(item_id) from items";
        $resqry = mysqli_query($con,$sqry);
        $item_id = mysqli_fetch_row($resqry);
        $iqry = "insert into price (item_id,price,price_date) values($item_id[0],'$item_price','$price_date')";
        $ires = mysqli_query($con,$iqry);
        

        if(!$ires)
        {
            echo "failed";
        } 
        else
        {
            header("location:menu.php");
        }
    }

    if($_POST["additem"] == "Save")
    {
        
        $item_id = $_POST["euid"];
        $cat_id = $_POST["category"];
        $item_name = $_POST["item_name"];
        $filename = $_FILES["uploadimg"]["name"];
        if($filename != "")
        {
            $tmpname = $_FILES["uploadimg"]["tmp_name"];    
            $folder = "ItemImages/".$filename;
            print_r($_FILES["uploadimg"]);
            move_uploaded_file($tmpname,$folder);

            $item_img = $folder;
            echo $qry = "update items set item_name = '$item_name',cat_id = $cat_id,item_img = '$item_img' where item_id = $item_id";
        }
        else
        {
            echo $qry = "update items set item_name = '$item_name',cat_id = $cat_id where item_id = $item_id";
        }
        // die();
        $sres = mysqli_query($con,$qry);
        if(!$sres)
        {
            echo "failed";
        } 
        else
        {
            header('location:menu.php');
        }
    }
}

if(isset($_POST["changeprice"]))
{
    $item_id = $_POST["ch_id"];
    $price = $_POST["item_price2"];
    $price_date = $_POST["date2"];
    $qry = "insert into price(item_id,price,price_date) values ($item_id,'$price','$price_date')";
    $res = mysqli_query($con,$qry);
    $uqry = "update items set item_price = $price where item_id = $item_id";
    $ures = mysqli_query($con,$uqry);
    if(!$res)
        {
            echo "failed";
        } 
        else
        {
            header('location:menu.php');
        }
}


?>