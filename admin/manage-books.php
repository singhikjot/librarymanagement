    <?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../index.php');
}
else{ 
    ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    
    <title>Online Library Management System | Manage Books</title>
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
                <h4 class="header-line">Manage Books</h4>
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
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>
</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Copy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT BookName,category,author,ISBNNumber,copies from  tblbooks";
$query = mysqli_query($connect,$sql);
$cnt=1;
if(mysqli_num_rows($query) > 0)
{
while($result = mysqli_fetch_assoc($query))
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['BookName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['category']);?></td>
                                            <td class="center"><?php echo htmlentities($result['author']);?></td>
                                            <td class="center"><?php echo htmlentities($result['ISBNNumber']);?></td>
                                            <td class="center"><?php echo htmlentities($result['copies']);?></td>
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
   
</body>
</html>
<?php } ?>
