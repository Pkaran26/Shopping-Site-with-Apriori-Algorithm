<?php
require_once("include/conn.php");
$ob = new Connect();
$ip = $ob->get_client_ip();
//echo $ip;
$ip = str_replace(":","_",$ip);
$a = file_exists("card/$ip.log");
if($a===FALSE) {
    echo 0;
} else {
    $myfile = fopen("card/$ip.log", "r");
    if(filesize("card/$ip.log")>0){
        $data = fread($myfile,filesize("card/$ip.log"));
        fclose($myfile);
        $data = explode(", ",$data);
        array_pop($data);
        echo count($data);
    }else{
        echo 0;
    }
}
?>