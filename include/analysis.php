<?php
require_once('../include/conn.php');
class Analysis{
    //public c1 = "";
    public function support_count1(){
        $ob = new Connect();
        $item_count = "";
        $items = $ob->select_data("SELECT product_id FROM product",1);
        $icount = count($items);
        for($i=0;$i<$icount;$i++){
            $itemc = $ob->select_data("SELECT count(pid) FROM `user_bought_product` WHERE pid = ".$items[$i][0],1);
            if($itemc[0][0]>=2){
                $item_count = $items[$i][0].", ".$item_count;
            }
        }
        $item_count = substr($item_count,0,strlen($item_count)-2);
        //$this->c1 = $item_count;
        return $item_count;
    }
    
    public function support_count2($item_count){
        //$item_count = "1, 3, 5";
        $ob = new Connect();
        $items = $ob->select_data("SELECT DISTINCT product.product_id,pid FROM `user_bought_product`,product WHERE product.product_id in ($item_count) and user_bought_product.pid in ($item_count) and product.product_id !=user_bought_product.pid",2);
        return $items;
    }
    
    public function support_count3($i1, $i2, $tran){
        //$item_count = "1, 3, 5";
        $ob = new Connect();
        $items = $ob->select_data2("SELECT count(*) FROM `tr_view` WHERE pid = '$i1' and tr_id = '$tran' UNION SELECT count(*) FROM `tr_view` WHERE pid = '$i2' and tr_id = '$tran'");
        if($items->num_rows==1){
            return $items->fetch_array();
        }else{
            return 0;
        }
        return 0;
    }
    
    public function support_count4($i1, $i2, $i3, $tran){
        //$item_count = "1, 3, 5";
        $ob = new Connect();
        $items = $ob->select_data2("SELECT count(*) FROM `tr_view` WHERE pid = '$i1' and tr_id = '$tran' UNION SELECT count(*) FROM `tr_view` WHERE pid = '$i2' and tr_id = '$tran' UNION SELECT count(*) FROM `tr_view` WHERE pid = '$i3' and tr_id = '$tran'");
        if($items->num_rows==1){
            return $items->fetch_array();
        }else{
            return 0;
        }
        return 0;
    }
}
?>