<?php  if (session_status() === PHP_SESSION_NONE) { 
    ini_set("session.gc_maxlifetime", 604800);
    ini_set("session.cookie_lifetime", 604800);
    session_set_cookie_params(604800);
    session_start(); 
}
include('../includes/dbconnection.php');
if (!isset($_SESSION['frsaid']) || strlen($_SESSION['frsaid']) == 0) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Food Recipe System | Unread Enquiry </title>
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="card">
    <div class="card-header">
     Unread Enquiry Details
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
         <tr>
                   <th>S.No</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Enquiry Date</th>
                     <th>Action</th>
                  </tr>
        </thead>
        <?php
$ret=mysqli_query($con,"select * from enquiries where adminRemark is null");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr class="gradeX">
                 <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['userName'];?></td>
                                        <td><?php  echo $row['userEmail'];?></td>
                                        <td><?php  echo $row['subject'];?></td>
                                        <td>
                                            <span class="badge badge-primary"><?php echo $row['postingDate'];?></span>
                                        </td>
                                         <td><a href="view-enquiry.php?enqid=<?php echo $row['id'];?>" class="btn btn-primary">View</a></td>
                </tr>
         <?php 
$cnt++;
       } ?>
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
<?php }  ?>