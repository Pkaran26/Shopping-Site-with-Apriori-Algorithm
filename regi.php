<?php
require_once("include/conn.php");
$ob = new Connect();
$name = $_POST['name'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$addr = $_POST['address'];
$pass = $_POST['password'];

$sql = "INSERT INTO `user`(`name`, `dob`, `pass`, `email`, `addr`) VALUES ('$name', '$dob', '$pass', '$email', '$addr')";

$chk = $ob->ProcessQuery($sql);
if($chk==1){
    echo "Success";
}else{
    echo "try again";
}
?>