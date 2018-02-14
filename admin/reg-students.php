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
    
    <title>Online Library Management System | Manage Reg Students</title>
    
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
                <h4 class="header-line">Manage Registered Students</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Reg Students
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Email id </th>
                                            <th>Mobile Number</th>
                                            <th>Reg Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from tblstudents";
$query = mysqli_query($connect,$sql);

$cnt=1;
if(mysqli_num_rows($query) > 0)
{
while($result = mysqli_fetch_assoc($query))
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['StudentId']);?></td>
                                            <td class="center"><?php echo htmlentities($result['FullName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['EmailId']);?></td>
                                            <td class="center"><?php echo htmlentities($result['MobileNumber']);?></td>
                                             <td class="center"><?php echo htmlentities($result['RegDate']);?></td>
                                            
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
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
