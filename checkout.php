<?php
require_once("include/conn.php");
$ob = new Connect();
$userid = $_POST['userid'];
$price = $_POST['price'];
$product = $_POST['product'];
$sql1 = "INSERT INTO `user_transaction`(`user_id`, `total_price`) VALUES ('$userid','$price')";

$chk = $ob->lastInsert($sql1);
if($chk!=0){
    $sql2 = "INSERT INTO `user_bought_product`(`TRANSACTION_id`, `user_id`, `pid`, `final_price`) VALUES ('$chk','$userid','$product','$price')";
    $tran = $ob->lastInsert($sql2);
    if($tran!=0){
        echo $chk;
    }else{
        $ob->ProcessQuery("delete from user_transaction where TRANSACTION_id = '$chk'");
        echo "try again";
    }
}else{
    echo "try again";
}
?>