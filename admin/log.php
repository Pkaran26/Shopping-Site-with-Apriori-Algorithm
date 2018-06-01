<?php
session_start();
require_once("../include/conn.php");
$ob = new Connect();
$email = $_POST['username'];
$pass = $_POST['userpass'];

$sql = "select admin_name from `admin` where username = '$email' and userpass = '$pass'";

$chk = $ob->checkData($sql);
if($chk==1){
    $user = $ob->select_data($sql,1);
    $_SESSION['admin'] = $user[0][0];
    echo '<script>
    window.location.href = "home.php";
</script>';
}else{
    echo '<script>
    alert("try again");
    window.location.href = "index.php";
</script>';
}
?>