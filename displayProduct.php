<?php
require_once("include/conn.php");
$ob = new Connect();
$next = $_POST['next'];
$product = $ob->select_data2("select * from product order by product_id desc limit $next,4");
if($product->num_rows>0){
    while($row = $product->fetch_array()){ 
?>
<div class="col-lg-3 col-md-6 mb-4">
<div class="card">
  <a style="color:black" href="description.php?product=<?php echo $row[0]; ?>">
<img class="card-img-top" src="<?php echo $row[6]; ?>" alt=""/>
<div class="card-body">
  <h4 class="card-title"><?php echo $row[1] ?></h4>
    <p class="card-text"><b><strike><?php echo $row[3]; ?>/-</strike> <?php echo $row[3]-($row[3]*$row[4])/100; ?>/-</b></p>
    <p class="card-text">Discount <b><?php echo $row[4]; ?>%</b></p>
  <p class="card-text"><?php echo $row[5]; ?></p>
</div>
  </a>
<div class="card-footer">
    <button pid="<?php echo $row[0]; ?>" class="btn btn-success addtocard">Add to Card</button>
    <a href="buy.php?product=<?php echo $row[0]; ?>" class="btn btn-info">Buy Now</a>
</div>
</div>
</div>
<?php
}
}else{
    echo 0;
}
?>