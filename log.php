<?php
session_start();
require_once("include/conn.php");
$ob = new Connect();
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "select user_id,name from `user` where email = '$email' and pass = '$pass'";

$chk = $ob->checkData($sql);
if($chk==1){
    $user = $ob->select_data($sql,2);
    $_SESSION['userid'] = $user[0][0];
    $_SESSION['name'] = $user[0][1];
    echo "Success ";
}else{
    echo "try again";
}
?>