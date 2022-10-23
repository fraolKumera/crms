<!DOCTYPE html>
<html>
<?php
session_start();
include('include/head.php');
?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper" style="background-color:#ecf0f5; ">
<?php
include('include/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
<?php
//include('include/nav.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		 <a href="change_password.php"> <h1>
			Change Password
		  </h1></a>
	</section>
 
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">

</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
<form method="post" id="passwordForm" enctype="multipart/form-data">
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
<br/><br/><br/>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<br/><br/><br/>
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" name="change_password" value="Change Password">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
    <!-- Main content -->
   </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
 include('include/footer.php');
?>
  <!-- Control Sidebar -->
 <?php
 include('include/setting.php');
 ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
// session_start(); //Start the session

// Connect To The database
// include('admin/conn.php');
if (isset($_POST["change_password"])) {
$password1=$_POST['password1'];
$password2=$_POST['password2'];
if($password1==$password2)
{
    // $query = "SELECT * FROM `user` WHERE first_name='".$_SESSION['username']."'";
    //     $result = mysqli_query($conn,$query);
    //         // output data of each row
    //         while($row = mysqli_fetch_assoc($result)) {
    //         echo $row['email'];
    //         }
    $pass=md5($password1);
    $sql = "UPDATE user SET `password`='$pass' WHERE `first_name`='".$_SESSION['username']."'";
    if(mysqli_query($conn,$sql))
    {
     
        echo "<script>alert('Password Changed Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Password Not Changed')</script>";
    }
}
else{
    echo "<script>alert('Password Not Matched')</script>";
 }
}