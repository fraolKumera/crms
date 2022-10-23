<!DOCTYPE html>
<html>
<?php
include('include/head.php');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
include('include/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  
 <?php
//include('include/asside.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
       <i class="fa fa-question-circle"></i> All Requested List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
    </section>
  <?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "crs");
$query = "SELECT * FROM assigned_requests ORDER BY ID DESC";
$result = mysqli_query($connect, $query);
?>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <br /><br />
  <div class="container">
   <h2 align="center">All Requested Services</h2>
   <br />
   <div class="table-responsive">
     <table id="example2" class="table table-bordered table-hover">
     <tr>
          <th>ID</th>
          <th>Service Request Id</th>
          <th>Service Request Type</th>
          <th>Sender Id</th>
          <th>Subject</th>
          <th>Service Request Detail</th>
          <th>Assigned Department</th>
          <th>Service Status</th>
          <th>Service Process Time</th>
          <th>Service Started Date</th>
          <th>Service Request Condition</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["ID"].'</td>
       <td>'.$row["request_id"].'</td>
       <td>'.$row["request_type"].'</td>
       <td>'.$row["sender_id"].'</td>
       <td>'.$row["request_subject"].'</td>
       <td>'.$row["request_detail"].'</td>
       <td>'.$row["department_name"].'</td>
       <td>'.$row["executive_officer_status"].'</td>
       <td>'.$row["process_time"].'</td>
       <td>'.$row["date"].'</td>
       <td>'.$row["request_condition"].'</td>
       <td><button type="button" name="view" class="btn btn-info view" ID="'.$row["ID"].'" >View</button></td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
   
  </div>
 </body>
</html>

<div id="post_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content"> 
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Request Details</h4>
   </div>
   <div class="modal-body" id="post_detail">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<script>
  
$(document).ready(function(){
 
 function fetch_post_data(ID)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{ID:ID},
   success:function(data)
   {
    $('#post_modal').modal('show');
    $('#post_detail').html(data);
   }
  });
 }

 $(document).on('click', '.view', function(){
  var ID = $(this).attr("ID");
  fetch_post_data(ID);
 });

 $(document).on('click', '.previous', function(){
  var ID = $(this).attr("ID");
  fetch_post_data(ID);
 });

 $(document).on('click', '.next', function(){
  var ID = $(this).attr("ID");
  fetch_post_data(ID);
 });
 
});
</script>

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
<!--table css-->
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>