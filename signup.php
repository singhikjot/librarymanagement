    <?php 
session_start();
include('includes/connect.php');
error_reporting(0);
if(isset($_POST['signup']))
{  
$StudentId= $_POST['rollno'];  
$fname=$_POST['fullname'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email']; 
$password=md5($_POST['password']);
$sql = "SELECT * FROM tblstudents WHERE EmailId = '$email'";
$query = mysqli_query($connect,$sql);
if(mysqli_num_rows($query)==0)
{
$sql = "SELECT * FROM tblstudents WHERE StudentId = '$StudentId'";
$query = mysqli_query($connect,$sql);
if(mysqli_num_rows($query)==0)
{
$sql="INSERT INTO  tblstudents(StudentId,FullName,MobileNumber,EmailId,Password) VALUES('$StudentId','$fname','$mobileno','$email','$password')";
if(mysqli_query($connect,$sql))
{
echo '<script>alert("Your Registration Successfull ")</script>';
}   
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
else 
{
echo "<script>alert('StudentId already Registered');</script>";
}
}
else 
{
echo "<script>alert('Email Id already Registered');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | Student Signup</title>
    
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
                <h4 class="header-line">User Signup</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           SINGUP FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
<div class="form-group">
<label>Enter Roll Number</label>
<input class="form-control" type="text" name="rollno" autocomplete="off" required />
</div>


<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullname" autocomplete="off" required />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid"   autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>  

<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>                               
<button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

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
