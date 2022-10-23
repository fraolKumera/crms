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
//include('include/asside.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="margin-left: 0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="index.php"><h1>
        Completed Service Requets
      </h1></a>

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>

    </section>
  <div class="col-sm-12" id="Add">
                     
    <section class="content">
      <div class="row" >
            <div class="" style="width: ">
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Completed service Requests </b></h3></center> 
                      </div><br>
                       <table id="cart_table" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th>ID</th>
          <th>Request Id</th>
          <th>Sender Id</th>
          <th>Subject</th>
          <th>Request Detail</th>
          <th>Support Desk Officer Name</th>
        
          
                </tr>
                </thead>
                <?php
                include('conn.php');
                $user=$_SESSION['username'];
$sql1 = "SELECT * FROM user WHERE first_name='$user'" ;
$res = mysqli_query($conn,$sql1);
while($ro = mysqli_fetch_array($res)){
 
  $department=$ro['department'];
}
if($department=='Admin')
{
  $query = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND `request_condition`= 'DONE'";
}
else
{
  $query = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND `request_condition`= 'DONE' AND `department_name`='$department'";
}
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($rowcount == 0) {     
        }
             ?> <tbody>
                <tr>
          <td><?php echo $row['ID'];?></td>
      <?php $_SESSION['ID']=$row['ID'];?>
          <td><?php echo $row['request_id'];?></td>
          <td><?php echo $row['sender_id'];?></td>
          <td><?php echo $row['request_subject'];?></td>
          <td><?php echo $row['request_detail'];?></td>
          <td><?php echo $row['support_desk_name'];?></td>
           
                </tr>
                 <?php
                }
              }
               
                
                    ?>
              </tbody>
        </table> 

            </div>
            <!-- /.modal-content -->
          </div>
         </div>
       </div>
          <!-- /.modal-dialog -->
  </section>
    </section>
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