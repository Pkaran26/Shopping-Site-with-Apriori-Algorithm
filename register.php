<?php
session_start();
require_once("include/conn.php");
$ob = new Connect();
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signup</title>
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
              <li class="nav-item active dropdown">
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
        <h4>Signup</h4>
        <hr/>
        
      <div class="row">
        <!-- /.col-lg-3 -->
          <div class="col-lg-3"></div>
        <div class="col-lg-6">

          <div class="card mt-4">
            <div class="card-body">
              <br/>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Name</span>
                  <input type="text" id="name" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                </div>
                <br/>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Dob</span>
                  <input type="date" id="dob" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                </div>
                <br/>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Email</span>
                  <input type="email" id="email" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Address</span>
                  <input type="text" id="address" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
              </div>
                <br/>
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Password</span>
                  <input type="password" id="password" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
              </div>
                <br/>
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Re-Password</span>
                  <input type="password" id="rpassword" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
              </div>
            </div>
              <div class="card-footer">
                <p style="text-align:right">
                    <a href="login.php" class="btn btn-link">If you have an account please login</a>
                    <input type="button" id="checkout" value="Signup" class="btn btn-primary"/>
                </p>
              </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
          
      </div>
       
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
        $("#checkout").click(function(){
            var name = $("#name").val();
            var dob = $("#dob").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var password = $("#password").val();
            var rpassword = $("#rpassword").val();
            if(password == rpassword){
                $.post("regi.php",{name:name, dob:dob, email:email, address:address, password:password},function(data){
                    alert(data);
                    $("#name").val();
                    $("#dob").val();
                    $("#email").val();
                    $("#address").val();
                    $("#password").val();
                    $("#rpassword").val();
                    window.location.href="login.php";
                });
            }else{
                alert("password does not matched!");
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
       
      </script>
  </body>
</html>
