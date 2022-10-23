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
include('include/asside.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

    </section>
  <div class="col-sm-12" id="Add">
                      <section class="panel" >
                           <div class="alert alert-info fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <h4><center>Denied Requests</center></h4>
                              </div> 
                              <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Request List</h3>
           <form action="new_reg_search.php" method="POST" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
          </form>
            </div>
            </div>
          </div>
          </div>

       
                              <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
          <th>ID</th>
          <th>Request Id</th>
          <th>Sender Id</th>
          <th>Request Type</th>
          <th>Subject</th>
          <th>Request Detail</th>
                </tr>
                </thead>
                <?php
                include('conn.php');
                $query = "SELECT * FROM `requests` WHERE support_desk_status=1";
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
          <td><?php echo $row['request_id'];?></td>
          <td><?php echo $row['sender_id'];?></td>
          <td><?php echo $row['request_type'];?></td>
          <td><?php echo $row['subject'];?></td>
          <td><?php echo $row['request_detail'];?></td>
                
                <?php
                }
              }
               
                
                    ?>           
                        
            
                
                </tr>
              </tbody>
        </table> 
      
            </div>
            <!-- /.modal-content -->
          </div>
          
          <!-- /.modal-dialog -->
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