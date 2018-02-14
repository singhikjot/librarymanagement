<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../index.php');
}
else{ 

if(isset($_POST['issue']))
{
$studentid=$_POST['studentid'];
$bookid=$_POST['booikid'];
$sql="SELECT * FROM tblstudents WHERE StudentId = '$studentid'";
$querycheck = mysqli_query($connect,$sql);
    if(mysqli_num_rows($querycheck)==1)
    {
        $sql="SELECT * FROM tblbooks WHERE ISBNNumber = '$bookid'";
        $querycheck = mysqli_query($connect,$sql);
        if(mysqli_num_rows($querycheck)==1)
    {   $result = mysqli_fetch_assoc($querycheck);
        if($result['issued'] >0)
        {
            $issued = $result['issued'];
            $issued = --$issued;
$sql ="UPDATE tblbooks SET issued = '$issued' WHERE ISBNNumber = '$bookid'";
$query = mysqli_query($connect,$sql);
$sql="INSERT INTO  tblissuedbookdetails(StudentID,BookId) VALUES('$studentid','$bookid')";
$query = mysqli_query($connect,$sql);
$lastInsertId = mysqli_insert_id($connect);
if($lastInsertId)
{
$_SESSION['msg']="Book issued successfully";
header('location:manage-issued-books.php?rid=""');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
}
}
else
{
    $_SESSION['error']="Sorry all Books are issued";
}
}
else
{
    $_SESSION['error']="Invalid ISBN Number. Please try again";
}
}
else
{
    $_SESSION['error']="Invalid Student Id. Please try again";
}
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | Issue a new Book</title>
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <link href="assets/css/style.css" rel="stylesheet" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />   
<style type="text/css">
  .others{
    color:red;
}

</style>


</head>
<body>
<?php include('includes/header.php');?>
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issue a New Book</h4>
                
                            </div>

</div>
<div class="row">
     <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading">
Issue a New Book
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Student id<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="studentid"  autocomplete="off"  required />
</div>

<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="booikid"   required="required" />
</div>

 <div class="form-group">

  <button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book </button>
 </div>


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
<?php } ?>
