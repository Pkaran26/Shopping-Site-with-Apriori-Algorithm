<?php
session_start();
require_once("include/conn.php");
$ob = new Connect();
if(isset($_SESSION['userid']) and isset($_GET['transection'])){
    $uid = $_SESSION['userid'];
    $tr = $_GET['transection'];
    $sql = "SELECT
    USER.name,
    USER.email,
    USER.addr,
    user_bought_product.TRANSACTION_id,
    user_bought_product.final_price,
    product.product_name
FROM user, user_bought_product, product WHERE product.product_id = user_bought_product.pid and user_bought_product.user_id = user.user_id and user_bought_product.TRANSACTION_id = '$tr' and user_bought_product.user_id = '$uid'";
    
    $details = $ob->select_data($sql,6);
  //  print_r($details);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shopping</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
  </head>
  <body>
   
    <!-- Page Content -->
    <div class="container">
        <?php
        $c = count($details);
        if($c==1){ ?>
      <!-- Page Features -->
      <div class="row text-center">
          <div class="col-lg-8 col-md-8 mb-8">
              <table class="table table-bordered">
                  <tr>
                    <td colspan="4"><h4 class="card-title">Invoice</h4></td>
                  </tr>
                  <tr>
                    <td>Customer Name</td>
                      <td colspan="2"><?php echo $details[0][0] ?></td>
                      <td></td>
                  </tr>
                  <tr>
                    <td>Product Name</td>
                      <td><?php echo $details[0][5] ?></td>
                      <td>Price</td>
                      <td><b><?php echo $details[0][4] ?>/-</b></td>
                  </tr>
                  <tr>
                    <td>Payment Method</td>
                      <td>Online Paid</td>
                      <td>Transection id </td>
                      <td><?php echo $details[0][3] ?></td>
                  </tr>
                  <tr>
                    <td>Customer Email</td>
                      <td colspan="3"><?php echo $details[0][1] ?></td>
                  </tr>
                  <tr>
                    <td>Customer Address</td>
                      <td colspan="3"><?php echo $details[0][2] ?></td>
                  </tr>
              </table>
              <button class="btn btn-light">Print</button>
          </div>
        </div>
        <?php }
        else if($c>1){?>
            <div class="row text-center">
          <div class="col-lg-8 col-md-8 mb-8">
              <?php
                             for($i=0;$i<$c;$i++){ ?>
              <table class="table table-bordered">
                  
                  <tr>
                    <td colspan="4"><h4 class="card-title">Invoice</h4></td>
                  </tr>
                  <tr>
                    <td>Customer Name</td>
                      <td colspan="2"><?php echo $details[$i][0] ?></td>
                      <td></td>
                  </tr>
                  <tr>
                    <td>Product Name</td>
                      <td><?php echo $details[$i][5] ?></td>
                      <td>Price</td>
                      <td><b><?php echo $details[$i][4] ?>/-</b></td>
                  </tr>
                  <tr>
                    <td>Payment Method</td>
                      <td>Online Paid</td>
                      <td>Transection id </td>
                      <td><?php echo $details[$i][3] ?></td>
                  </tr>
                  <tr>
                    <td>Customer Email</td>
                      <td colspan="3"><?php echo $details[$i][1] ?></td>
                  </tr>
                  <tr>
                    <td>Customer Address</td>
                      <td colspan="3"><?php echo $details[$i][2] ?></td>
                  </tr>
                  
              </table>
              <?php } ?>
              <button class="btn btn-light">Print</button>
          </div>
        </div>
        <?php }
        else{ ?>
            <script>window.location.href = history.back();</script>
        <?php } ?>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script>
        $("button").click(function(){
            $(this).hide();
            window.print();
            $(this).show();
        });
      </script>
  </body>

</html>
