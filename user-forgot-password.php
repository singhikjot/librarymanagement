<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(isset($_POST['change']))
{

$email = $_POST['email'];
$mobile = $_POST['mobile'];
$newpassword = md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblstudents WHERE EmailId='$email' and MobileNumber='$mobile'";
$query= mysqli_query($connect,$sql);
if(mysqli_num_rows($query) > 0)
{
$con="UPDATE tblstudents SET Password='$newpassword' WHERE EmailId='$email' and MobileNumber='$mobile'";
$chngpwd1 = mysqli_query($connect,$con);
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | Password Recovery </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
<?php include('includes/header.php');?>
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">User Password Recovery</h4>
</div>
</div>
           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" name="chngpwd" method="post"  action="" onSubmit="return valid();">

<div class="form-group">
<label>Enter Reg Email id</label>
<input class="form-control" type="email" name="email" required autocomplete="off" />
</div>

<div class="form-group">
<label>Enter Reg Mobile No</label>
<input class="form-control" type="text" name="mobile" required autocomplete="off" />
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="newpassword" required autocomplete="off"  />
</div>

<div class="form-group">
<label>ConfirmPassword</label>
<input class="form-control" type="password" name="confirmpassword" required autocomplete="off"  />
</div> 

 <button type="submit" name="change" class="btn btn-info">Change Password</button> | <a href="index.php">Login</a>
</form>
 </div>
</div>
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
