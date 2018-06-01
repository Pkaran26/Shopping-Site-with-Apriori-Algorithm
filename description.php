<?php
session_start();
require_once("include/conn.php");
$ob = new Connect();
if(isset($_GET['product'])){
    $id = $_GET['product'];
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        $name = $_SESSION['name'];
    }else{
        $name = "";
    }
    $product = $ob->select_data("SELECT `product_name`, `product_price`, `descount`, `descr`, `product_img` FROM `product` WHERE product_id = '$id'",5);
}else{
    ?>
<script>
    window.location.href="index.php";
</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Item - Start Bootstrap Template</title>
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
              <li class="nav-item">
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

      <div class="row">

        <div class="col-lg-4">
            <br/>
            <img src="<?php echo $product[0][4]; ?>" class="img-fluid" />
            <div class="">
                <button pid="<?php echo $id; ?>" class="btn btn-success addtocard">Add to Card</button>
                <a href="buy.php?product=<?php echo $id; ?>" class="btn btn-info">Buy Now</a>
            </div>
            
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-8">

          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title"><?php echo $product[0][0]; ?></h3>
              <h4><strike><?php echo $product[0][1]; ?>/-</strike> <?php echo $product[0][1]-($product[0][1]*$product[0][2])/100; ?>/-</h4>
              <p style="color:red" class="card-text">Discount <?php echo $product[0][2]; ?>%</p>
                <p class="card-text"><?php echo $product[0][3]; ?></p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>
            
          
        </div>
        <!-- /.col-lg-9 -->

      </div>
        <br/>
        <h4>Recommanded Products</h4>
          <!-- /.card -->
        <div class="row" id="suggest"></div>
    </div>
    <!-- /.container -->

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
        function card(){
              $.post("card.php",function(data){
                  $("#card").text(data);
              });
          }
          card();
        $(document).on("click",".addtocard",function(){
            var pid = $(this).attr("pid");
            if(pid.length>0){
                $.post("addToCard.php",{pid:pid},function(data){
                    alert(data);
                    card();
                });
            }
        });
      </script>
      <script>
          
          function getProduct(id){
              $.post("getProduct.php",{id:id},function(data){
                  $("#suggest").append(data);
              });
          }
          
          function getRec(){
              var url = window.location.href;
              var product = url.indexOf('product');
              product = product + 8;
              product = url.charAt(product);
              $.post("admin/apriori.php",function(data){
                  console.log(data);
                var data = getSuggest(data,product);
                  console.log(data);
                for(i=0;i<data.length;i++){
                    if(data[i]!=product){
                        getProduct(data[i],product);
                    }
                }
              });
          }
          getRec();
            
    function getSuggest(data,id){
        var str = "";
        
        var ob = JSON.parse(data);
        for(i=0;i<ob.length;i++){
            if(ob[i].search(id)!=-1){
                str = ob[i]+", "+str;
            }
        }
        str = str.split(", ");
        var data2 = [];
        var x = 0;
        for(i=0;i<data.length;i++){
            if(data2.length==0){
                data2[x] = str[0];
            }
            for(j=0;j<data2.length;j++){
                if(data2[j]==str[i]){
                    break;
                }
            }
            if(data2.length==j){
                data2[x++] = str[i];
            }
        }
        var data3 = [];
       for(i=0;i<data2.length-2;i++){
        data3[i] = data2[i];
       }
        return data3;
    }
</script>
  </body>

</html>
