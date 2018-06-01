<?php
require_once("include/conn.php");
$ob = new Connect();
$ip = $ob->get_client_ip();
$pid = $_GET['pid'];
$ip = str_replace(":","_",$ip);
$a = file_exists("card/$ip.log");
if($a===FALSE) {
    echo 0;
} else {
    $myfile = fopen("card/$ip.log", "r");
    $data = fread($myfile,filesize("card/$ip.log"));
    fclose($myfile);
    $data = explode(", ",$data);
    array_pop($data);
    for($i=0;$i<count($data);$i++){
        if($pid==$data[$i]){
            unset($data[$i]);
            break;
        }
    }
    $myfile = fopen("card/$ip.log", "w");
    if(count($data)>0)
     $txt = implode(", ",$data).", ";
    else
        $txt = "";
    fwrite($myfile, $txt);
}
?>
<script>
    alert('Item Removed');
    window.location.href = history.back();
</script>