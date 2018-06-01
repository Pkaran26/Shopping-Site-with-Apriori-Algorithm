<?php
require_once("include/conn.php");
$ob = new Connect();
$ip = $ob->get_client_ip();
//echo $ip;
$ip = str_replace(":","_",$ip);
$pid = $_POST['pid'];
$flg = 0;
if(file_exists("card/$ip.log")){
    $myfile = fopen("card/$ip.log", "r");
    if(filesize("card/$ip.log")>0){
        $data = fread($myfile,filesize("card/$ip.log"));
        fclose($myfile);
        $data = explode(", ",$data);
        array_pop($data);
        for($i=0;$i<count($data);$i++){
            if($pid==$data[$i]){
                $flg=1;
                break;
            }
        }   
    }
}
if($flg==0){
    $myfile = fopen("card/$ip.log", "a");
    $txt = $pid.", ";
    fwrite($myfile, $txt);
    fclose($myfile);   
    echo "Added";
}else{
    echo "Already Added";
}
?>