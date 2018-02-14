<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{   
$email=$_POST['emailid'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,StudentId FROM tblstudents WHERE EmailId='$email' and Password='$password'";
$query= mysqli_query($connect,$sql);
if(mysqli_num_rows($query) > 0)
{   
    $result = mysqli_fetch_assoc($query);
 $_SESSION['stdid']=$result['StudentId'];
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
}
else{
echo "<script>alert('Invalid Details');</script>";
}
}


?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/validation.js"></script>
</head>
<body background="assets/img/red.jpg">
<?php include('includes/header.php');?>
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
                       
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form"  name="loginform" method="post">

<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="text" id="email" name="emailid" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
</div>

 <button type="submit" onclick ="return ValidateUserLogin()"  name="login" class="btn btn-info" >LOGIN </button> | <a href="signup.php">Not Register Yet</a>
</form>
 </div>
</div>
</div>
</div>            
             
 
    </div>
    </div>
     
 <?php include('includes/footer.php');?>
     
</body>
</html>
