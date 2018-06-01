<?php
require_once("../include/conn.php");
$ob = new Connect();
$sql = "SELECT `tr_id`, user.name, `total_price`,  `tr_date` FROM `user_transaction`,user WHERE user_transaction.user_id = user.user_id limit 10";
$tran = $ob->select_data2($sql);
if($tran->num_rows>0){
    while($row = $tran->fetch_array()){
        echo '<tr>
            <td># '.$row[0].'</td>
            <td>'.$row[1].'</td>
            <td>
                <label class="label label-info">'.$row[2].' /- RS </label>
            </td>
            <td>'.$row[3].'</td>
        </tr>';       
    }
}
?>