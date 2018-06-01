<?php
session_start();
if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
}else{
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Admin Panel</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>onlineshopping@eshop.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>1800-123-45678
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="assets/img/log.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a>Welcome <?php echo $admin; ?></a></li>
                            <li><a class="menu-top-active" href="index.html">Dashboard</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>

                </div>

            </div>
            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <h3 id="tpro">Fetching...</h3> 
                        <h4>Total Products</h4>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <h3 id="ttra">Fetching...</h3>
                        <h4>Total Transection</h4>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <h3 id="tspro">Fetching...</h3>
                        <h4>Total Sold Products</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <h3 id="tfu">Fetching...</h3>
                        <h4>Total Fund</h4>
                    </div>
                </div>

            </div>
           
            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Active  Notice Panel 
                                <div class="pull-right" >
                                    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    <span class="glyphicon glyphicon-cog"></span>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
  </ul>
</div>
                                </div>
                            </div>
                            <div class="panel-body">
                               
                                <ul >
                                   
                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-align-left text-success" ></span> 
                                                  Lorem ipsum dolor sit amet ipsum dolor sit amet
                                                 <span class="label label-warning" > Just now </span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-info-sign text-danger" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-info" > 2 min chat</span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >GO ! </span>
                                            </a>
                                    </li>
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >Let's have it </span>
                                            </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Just A Small Footer Button</a>
                            </div>
                        </div>
                    </div>
                    <hr />
                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tran. No.</th>
                                            <th>Amount</th>
                                            <th>User</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transection">
                                    </tbody>
                                </table>
                            </div>
                </div>
                <div class="col-md-6">
                     <div class="Compose-Message">               
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Add New Product
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" id="upload_product" action="upload_product.php" method="post">
                        <label>Enter Product Name : </label>
                        <input type="text" required name="pname" class="form-control" />
                        <label>Product Type :  </label>
                        <select name="ptype" required class="form-control">
                            <option value="">Select</option>
                            <option>Electronic</option>
                            <option>Others</option>
                        </select>
                        <label>Product Price : </label>
                        <input type="text" required name="pprice" class="form-control" />
                        <label>Product Discount : </label>
                        <input type="text" required name="pdise" class="form-control" />
                        <label>Product Image : </label>
                        <input type="file" required name="pic" class="form-control" />
                        <label>Product Description : </label>
                        <textarea rows="2" required name="descr" class="form-control"></textarea>
                        <hr />
                        <input type="submit" class="btn btn-success" value="Submit" />
                        <span id="status1"></span>
                        </form>
                    </div>
                    <div class="panel-footer text-muted">
                        <div class="progress" style="height:20px">
                          <div class="progress-bar bar1" role="progressbar" aria-valuenow="0"
                          aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                            <div class="percent1">0%</div>
                          </div>
                        </div>
                    </div>
                </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; Online Shopping
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script>
        setInterval(function(){
            $.post("dash.php",function(data){
                var obj = JSON.parse(data);
                $("#tpro").text(obj[0]);
                $("#ttra").text(obj[1]);
                $("#tspro").text(obj[2]);
                $("#tfu").text(obj[3]+"/-");
            });
            
            $.post("noti_tran.php",function(data){
                $("#transection").html(data);
            });
        },1000);
    </script>
    <script>
        $(function() {
            var bar = $('.bar1');
            var percent = $('.percent1');
            var status = $('#status1');
            status.css({"color":"red"});
            $("#upload_product").ajaxForm({
                beforeSend: function() {
                    status.text("Please wait...");
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.html(xhr.responseText);
                    status.css({"color":"green"});
                    //alert(xhr.responseText);
                    $("input[type=text]").val("");
                    $("input[type=file]").val("");
                    $("textarea").val("");
                }
            });
        }); 
    </script>
</body>
</html>
