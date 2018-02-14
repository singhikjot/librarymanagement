<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:../index.php');
}
else{?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>Online Library Management System | Admin Dash Board</title>
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php include('includes/header.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php
$sql ="SELECT id from tblstudents";
$query =mysqli_query($connect,$sql);
$count = mysqli_num_rows($query);
?>
                            <h3><?php echo htmlentities($count);?></h3>
                           Student Registered
                        </div>
                    </div>

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
<?php 
$sql1 ="SELECT id from tblbooks ";
$query1 = mysqli_query($connect,$sql1);
$count1 = mysqli_num_rows($query1);
?>


                            <h3><?php echo htmlentities($count1);?></h3>
                      Total Books
                        </div>
                    </div>
                      <div class="col-md-3">
  </div>
        </div>   
    </div>
    </div>
<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
