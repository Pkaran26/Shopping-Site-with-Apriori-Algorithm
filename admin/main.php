<?php
    require_once('../include/conn.php');
    $ob = new Connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping | Admin</title>
</head>
<body>
    <?php
    $item_count = "";
    $items = $ob->select_data("SELECT product_id FROM product",1);
    $icount = count($items);
   // echo $items[2][0];
    
    //minimum support cost = 2
    for($i=0;$i<$icount;$i++){
        $itemc = $ob->select_data("SELECT count(pid) FROM `user_bought_product` WHERE pid = ".$items[$i][0],1);
        if($itemc[0][0]>=2){
            $item_count = $items[$i][0].", ".$item_count;
        }
    }
   echo $item_count = substr($item_count,0,strlen($item_count)-2);
    
    //join
    $items = $ob->select_data("SELECT DISTINCT product.product_id,pid FROM `user_bought_product`,product WHERE product.product_id in ($item_count) and user_bought_product.pid in ($item_count) and product.product_id !=user_bought_product.pid",2);
  //  print_r($items);
    
    //minimum support cost in transections
    $item_count = "";
    $transc = $ob->select_data("SELECT tr_id FROM `user_transaction` WHERE 1",1);
    $itemc = count($transc);
  //  print_r($transc);
    for($i=0;$i<$itemc;$i++){
        $pid = "";
        $pid = $ob->select_data("SELECT DISTINCT pid FROM `user_bought_product` WHERE TRANSACTION_id = ".$transc[$i][0],1);
        if(count($pid)>1){
            for($j=0;$j<count($pid);$j++){
                $x = $pid[$j][0];
            }
            $item_count
        }
    }
 //   print_r($items);
    ?>
    
    
</body>
</html>