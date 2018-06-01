<?php
session_start();
require_once("include/conn.php");
$ob = new Connect();
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
}else{
    $name = "";
}
$ip = $ob->get_client_ip();
//echo $ip;
$ip = str_replace(":","_",$ip);
$a = file_exists("card/$ip.log");
$ff = 0;
if($a===FALSE) {
    $ff=1;
} else {
    $myfile = fopen("card/$ip.log", "r");
    $data = fread($myfile,filesize("card/$ip.log"));
    $str= $data;
    fclose($myfile);
    $data = explode(", ",$data);
    array_pop($data);
    $str = substr($str,0,strlen($str)-2);
}

$product = $ob->select_data2("SELECT `product_name`, `product_price`, `descount`, `descr`, `product_img` FROM `product` WHERE product_id in ($str)");
    ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shopping | Card</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Online Shopping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li>
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
              <li class="nav-item active">
              <a class="nav-link" href="viewCard.php"><b>Card(<span id="card">0</span>)</b></a>
            </li>
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if(!empty($name)){echo "Welcome ".$name;}else{echo "Guest Login";} ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php if(!empty($name)){
                echo '<a class="dropdown-item" href="logout.php">Logout</a>';
            }else{
                echo '<a class="dropdown-item" href="login.php">Login</a>';  
                echo '<a class="dropdown-item" href="register.php">Signup</a>';
            } ?>
        </div>
      </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <br/>
        <h4>Product Details</h4>
        <hr/>
        <form action="" method="post" id="checkout">
      <div class="row">
        <!-- /.col-lg-3 -->
        <div class="col-lg-8">
          <div class="card mt-4">
            <div class="card-body">
                <table style="width:100%">
                    <?php if(!empty($str)){ if($product->num_rows>0){
                        $i=0;
                        $tprice = "";
                        while($row = $product->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?>.</td>
                        <td><b><?php echo $row[0]; ?></b></td>
                        <td style="position:relative"><?php echo $row[1]; ?>/-
                            <a href="removeItem.php?pid=<?php echo $data[$i]; ?>">
                            <img style= "position:absolute; height:20px;width:20px; top:10px;right:10px;" src="css/delete-button-png-20.png" /></a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Discount</td>
                        <td> - <?php echo ($row[1]*$row[2])/100; ?>/-</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Final Price</td>
                        <td><b><?php echo $price = $row[1]-($row[1]*$row[2])/100; ?>/-</b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr/></td>
                    </tr>
                    <?php 
                            $i++;
                            $tprice = $price.", ".$tprice;
                        } }}else{?>
                        <tr>
                            <td colspan="3"><script>alert('Card empty!');
                                window.location.href = history.back();
                                </script>Card Empty</td>
                    </tr>
                    <?php }?>
                </table>
                <input type="hidden" id="price" value="<?php echo $tprice; ?>" />
                <input type="hidden" id="userid" value="<?php if(!empty($userid))echo $userid; ?>" />
                <input type="hidden" id="product" value="<?php echo $str; ?>" />
            </div>
              <div class="card-footer">
                <p style="text-align:right">
                    <a href="index.php" class="btn btn-success">Cancel</a>
                    <input type="submit" value="Checkout" class="btn btn-primary"/>
                </p>
              </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
          <div class="col-lg-4">
              <br/>
              <div class="card" style="width: 20rem;">
                  <?php
                  if(!empty($userid)){
                    $sql = "SELECT `name`, `email`, `addr` FROM `user` WHERE user_id='$userid'";
                    $userDetails = $ob->select_data($sql,3);
                  
                  ?>
                  <div class="card-body">
                      <?php if(count($userDetails[0])>0){?>
                    <h4 class="card-title"><?php echo $userDetails[0][0];?></h4>
                    <p class="card-text">Email : <?php echo $userDetails[0][1];?></p>
                    <p class="card-text">Address : <?php echo $userDetails[0][2];?></p>
                      <?php }}else{  ?>
                      <p class="card-text"><a href="login.php">Login to buy this product</a></p>
                      <?php } ?>
                  </div>
                </div>
          </div>
      </div>
        </form>
    </div>
    <!-- /.container -->
      <br/>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script>
        $("#checkout").submit(function(){
            $(this).attr("disabled","disabled");
            var userid = $("#userid").val();
            var price = $("#price").val();
            var product = $("#product").val();
            if(userid.length>0){
                $.post("checkout2.php",{userid:userid, price:price, product:product},function(data){
                if(data!="try again"){
                    emptyCard();
                    //  alert(data);
                    window.open("bill.php?transection="+data, "", "width=600,height=600");
                    window.location.href = history.back(); 
                }
                else{
                    alert(data);
                }
            });   
            }else{
                alert("Please login to buy this product");
            }
            return false;
        });
      </script>
      <script>
        function card(){
              $.post("card.php",function(data){
                  $("#card").text(data);
              });
          }
          card();
       function emptyCard(){
           $.post("emptyCard.php",function(data){
                  $("#card").text(data);
              });
       }
      
      </script>
  </body>
</html>
