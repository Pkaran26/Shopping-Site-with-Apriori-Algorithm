<?php
session_start();
if(isset($_SESSION['admin'])){
$admin = $_SESSION['admin'];
include_once("../include/conn.php");
require("../include/image_class.php");
$img = new Img();
$ob = new Connect();

$pname=$_POST['pname'];
$ptype = $_POST['ptype'];   
$pprice = $_POST['pprice'];
$pdise = $_POST['pdise'];
$pimg = $_FILES['pic'];
$pdescr = $_POST['descr'];
    
$name=$_FILES['pic']['name'];
$rand = rand(0,99);
$target_file = "../img/".$rand.$name;
$chk = $img->simpleUpload($pimg, "../img/$rand", "2097152");
if($chk==1){
    $chk = $ob->ProcessQuery("INSERT INTO `product`(`product_name`, `product_type`, `product_price`, `descount`, `descr`, `product_img`) VALUES ('$pname','$ptype','$pprice','$pdise','$pdescr','$target_file')");
    if($chk==1){
        echo "Product Added";
    }else {
        echo "Image not uploaded! error :'".$conn->error;
    }
}else {
    echo "Image not uploaded!";
}
}
?>