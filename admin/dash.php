<?php
require_once("../include/conn.php");
$ob = new Connect();
$data = array();

$sql = "select count(*) from product";
$chk = $ob->select_data($sql,1);
array_push($data, $chk[0][0]);

$sql = "SELECT count(*) FROM `user_transaction`";
$chk = $ob->select_data($sql,1);
array_push($data, $chk[0][0]);

$sql = "SELECT count(*) FROM `user_bought_product`";
$chk = $ob->select_data($sql,1);
array_push($data, $chk[0][0]);

$sql = "SELECT sum(total_price) FROM `user_transaction`";
$chk = $ob->select_data($sql,1);
array_push($data, $chk[0][0]);

echo json_encode($data);
?>