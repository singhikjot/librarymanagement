<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../index.php');
}
else{ 
    if($_GET['rid']!="")
    {
    $rid=intval($_GET['rid']);
    $rstatus=1;
    $sql="UPDATE tblissuedbookdetails set ReturnStatus='$rstatus' where id='$rid'";
    $query = mysqli_query($connect,$sql);
    $_SESSION['msg']="Book Returned successfully";
    }
    ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <title>Online Library Management System | Manage Issued Books</title>
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
  
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/style.css" rel="stylesheet" />
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      
<?php include('includes/header.php');?>

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
    </div>
     <div class="row">
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>



   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>
        </div>
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Issued Books 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT tblstudents.FullName,tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnStatus,tblissuedbookdetails.id as rid from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.ISBNNumber=tblissuedbookdetails.BookId ";
$query = mysqli_query($connect,$sql);
$cnt=1;
if(mysqli_num_rows($query) > 0)
{
while($result = mysqli_fetch_assoc($query))
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['FullName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['BookName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['ISBNNumber']);?></td>
                                            <td class="center"><?php echo htmlentities($result['IssuesDate']);?></td>
                                            <td class="center">
                                                <?php if($result['ReturnStatus']==0){?>
                                            <a href="manage-issued-books.php?rid=<?php echo htmlentities($result['rid']);?>"><button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button></a>
                                            <?php }
                                            else
                                                {
                                                 echo htmlentities("Book Retured");
                                                }
                                                ?>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            
    </div>
    </div>

   
  <?php include('includes/footer.php');?>
    
    <script src="assets/js/jquery-1.10.2.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
 
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
     
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
