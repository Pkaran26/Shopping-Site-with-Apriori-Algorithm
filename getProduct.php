<?php

require_once("include/conn.php");
$ob = new Connect();
$id = $_POST['id'];    
$product = $ob->select_data2("SELECT `product_name`, `product_price`, `descount`, `descr`, `product_img` FROM `product` WHERE product_id = '$id'");
if($product->num_rows>0){
    while($row = $product->fetch_array()){
        echo '<div style="margin-bottom:15px !important;" class="col-lg-4 col-md-4 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="'.$row[4].'" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a style="color:black" href="description.php?product='.$id.'">'.$row[0].'</a>
                  </h4>
                  <a style="color:black" href="description.php?product='.$id.'">
                  <h5>'.$row[1].'/- </strike> '.($row[1]-($row[1]*$row[2])/100).'/-</h5>
                  <p class="card-text" style="color:red">Discount '.$row[2].'%</p>
                  <p class="card-text">'.$row[3].'</p>
                  </a>
                </div>
                <div class="card-footer">
                  <button pid="'.$id.'" class="btn btn-success addtocard">Add to Card</button>
                <a href="buy.php?product='.$id.'" class="btn btn-info">Buy Now</a>
                </div>
              </div>
            </div>';
    }
}
?>