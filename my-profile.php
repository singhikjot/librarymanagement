<?php 
session_start();
include('includes/connect.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | Student Signup</title>
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
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           My Profile
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post">
<?php 
$sid=$_SESSION['stdid'];
$sql="SELECT StudentId,FullName,EmailId,MobileNumber,RegDate from  tblstudents  where StudentId='$sid'";
$query = mysqli_query($connect,$sql);
$cnt=1;
if(mysqli_num_rows($query) > 0)
{   
    $result = mysqli_fetch_assoc($query);
{               ?>  

<div class="form-group">
<label>Student ID : </label>
<?php echo htmlentities($result['StudentId']);?>
</div>

<div class="form-group">
<label>Reg Date : </label>
<?php echo htmlentities($result['RegDate']);?>
</div>

<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($result['FullName']);?>" autocomplete="off" required readonly />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result['MobileNumber']);?>" autocomplete="off" required readonly />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result['EmailId']);?>"  autocomplete="off" required readonly />
</div>
<?php }} ?>
                              

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
