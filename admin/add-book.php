<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../index.php');
}
else{ 

if(isset($_POST['add']))
{
$bookname=$_POST['bookname'];
$category=$_POST['category'];
$author=$_POST['author'];
$isbn=$_POST['isbn'];
$copies=$_POST['copies'];
$sql="INSERT INTO  tblbooks(BookName,category,author,ISBNNumber,copies,issued) VALUES('$bookname','$category','$author','$isbn','$copies','$copies')";
$query = mysqli_query($connect,$sql);
$lastInsertId = mysqli_insert_id($connect);
if($lastInsertId)
{
$_SESSION['msg']="Book Listed successfully";
header('location:manage-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-books.php');
}

}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | Add Book</title>
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
                <h4 class="header-line">Add Book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" autocomplete="off"  required />
</div>

<div class="form-group">
<label> Category<span style="color:red;">*</span></label>
<select class="form-control" name="category" required="required">
<option value=""> Select Category</option>
<option value="cse">CSE</option>
<option value="ece">ECE</option>
<option value="civil">CIVIL</option>
<option value="pd">PD</option>

</select>
</div>


<div class="form-group">
<label> Author<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author"  required="required" autocomplete="off" />
</div>

<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn"  required="required" autocomplete="off" />
</div>

 <div class="form-group">
 <label>Copies Available<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="copies" autocomplete="off"   required="required" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add </button>

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
