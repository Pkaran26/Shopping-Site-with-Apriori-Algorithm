<?php
require_once("include/conn.php");
$ob = new Connect();
$ip = $ob->get_client_ip();
$ip = str_replace(":","_",$ip);
@unlink("card/$ip.log");
echo 0;
?>