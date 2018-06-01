<?php
    require_once('../include/conn.php');
    require_once('../include/analysis.php');
    $ob = new Connect();
    $ana = new Analysis();

$item_count = $ana->support_count1();
$item_count = $ana->support_count2($item_count);
$c = count($item_count);
$item_count2 = "";
$item_count2 = array();
$tran = $ob->select_data2("select tr_id from user_transaction");
if($tran->num_rows>0){
    while($row = $tran->fetch_array()){
        for($i=0;$i<$c;$i++){
            $chk = $ana->support_count3($item_count[$i][0], $item_count[$i][1],$row[0]);
           // echo $chk[0];
            if($chk[0]==1){
                $str = $item_count[$i][0].", ".$item_count[$i][1];
                $str2 = $item_count[$i][1].", ".$item_count[$i][0];
                for($j=0;$j<count($item_count2);$j++){
                    if($item_count2[$j] == $str || $item_count2[$j] == $str2){
                        break;
                    }
                }
                if($j==count($item_count2))
                array_push($item_count2,$str);
                //array_push($item_count2,$item_count[$i][1]);
            }
        }
    }
}
//print_r($item_count2);
//echo "<br/><br/>";
$l4 = array();
for($i=0;$i<count($item_count2);$i++){
    $d = explode(", ",$item_count2[$i]);
    for($j=$i+1;$j<count($item_count2);$j++){
        $e = explode(", ",$item_count2[$j]);
        //1,3
        //1,5
        if($d[0] == $e[0]){
            $ss = $d[0].", ".$d[1].", ".$e[1];
            array_push($l4,$ss);
        }
        //3,1
        //5,1
        else if($d[1] == $e[1]){
            $ss = $d[0].", ".$d[1].", ".$e[0];
            array_push($l4,$ss);
        }
    }
}
//  print_r($l4);
$l5 = array();

$tran = $ob->select_data2("select tr_id from user_transaction");
if($tran->num_rows>0){
    while($row = $tran->fetch_array()){
        for($i=0;$i<count($l4);$i++){
            $a = explode(", ",$l4[$i]);
            $chk = $ana->support_count4($a[0], $a[1], $a[2],$row[0]);

            if($chk[0]==1){
                $flg = 0;
           // echo $chk[0]." ".$a[0].", ".$a[1].", ".$a[2]."<br/>";
                $str = $a[0].", ".$a[1].", ".$a[2];
                $str2 = $a[1].", ".$a[2].", ".$a[0];
                $str3 = $a[2].", ".$a[0].", ".$a[1];
                $str4 = $a[0].", ".$a[1].", ".$a[2];
                $str5 = $a[1].", ".$a[0].", ".$a[2];
                $str6 = $a[2].", ".$a[1].", ".$a[0];
                for($j=0;$j<count($l5);$j++){
                    if($l5[$j] == $str){
                        $flg = 1;
                        break;
                    } if( $l5[$j] == $str2){
                        $flg = 1;
                        break;
                    } if( $l5[$j] == $str3){
                        $flg = 1;
                        break;
                    } if( $l5[$j] == $str4){
                        $flg = 1;
                        break;
                    } if( $l5[$j] == $str5){
                        $flg = 1;
                        break;
                    }if( $l5[$j] == $str6){
                        $flg = 1;
                        break;
                    }
                }
                if($flg==0)
                array_push($l5,$str);
                //array_push($item_count2,$item_count[$i][1]);
            }
        }
    }
}
//print_r($l5);
echo json_encode($l5);
?>