<?php
require_once("include/conn.php");
$ob = new Connect();
$userid = $_POST['userid'];
$price = $_POST['price'];
$product = $_POST['product'];
$price = substr($price,0,strlen($price)-2);
$total = explode(", ",$price);
$product = explode(", ",$product);
$tprict = 0;
for($i=0;$i<count($total);$i++){
    $tprict += $total[$i];
}
$sql1 = "INSERT INTO `user_transaction`(`user_id`, `total_price`) VALUES ('$userid','$tprict')";
$chk = $ob->lastInsert($sql1);
if($chk!=0){   
for($i=0;$i<count($total);$i++){
    $sql2 = "INSERT INTO `user_bought_product`(`TRANSACTION_id`, `user_id`, `pid`, `final_price`) VALUES ('$chk','$userid','$product[$i]','$total[$i]')";
    $tran = $ob->lastInsert($sql2);
    if($tran!=0){
        
    }else{
        $ob->ProcessQuery("delete from user_transaction where TRANSACTION_id = '$chk'");
        echo "try again";
    }
}
    echo $chk;
}else{
    echo "try again";
}
?>