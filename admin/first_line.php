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
  
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Approved Service Request List
          <div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
              <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
            </button>
            <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>
        </div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Approved Service Request List</li>
        </ol>
      </section>
	             <div id="Add">
                    
                      <section class="content">
      <div class="row" >
            <div class="">
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>All Executive Officer's Request List</b></h3></center> 
                      </div><br>
                       <table id="cart_table" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Request Id</th>
                              <th>Sender Id</th>
                              <th>Service Request Type</th>
                              <th>Subject</th>
                              <th>Request Detail</th>
                              <th>Fist Line Officer</th>
                              <th>End Date</th>
                              <th>Attachement</th>
                              <th>Status<th>
                            </tr>
                          </thead>
                            <?php
                            include('conn.php');
                            $username=$_SESSION['username'];
                            $user_query="SELECT * FROM user WHERE `first_name`='$username'";
                            $user_result=$conn->query($user_query);
                            while($userrow = $user_result->fetch_assoc()) {
                              $user_department = $userrow['department'];
                            }
                            if($user_department=='Admin')
                            {
                              $query = "SELECT * FROM `assigned_requests` ";
                            }
                            elseif($user_department=='Help Desk'){
                              $query = "SELECT * FROM `assigned_requests` ";
                            }
                            else{
                            $query = "SELECT * FROM `assigned_requests` WHERE  `department_name`='$user_department'";
                            }
                            // $query = "SELECT * FROM `assigned_requests`";
            $result = $conn->query($query);
            $rowcount = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($rowcount == 0) {     
                    }
                      $_SESSION['mgr']=$row['ovd_mgr'];
                         ?> <tbody>
                            <tr>
                            <?php $aattachement=$row['attachement'];?>
                      <td><?php echo $row['ID'];?></td>
                  <?php $_SESSION['ID']=$row['ID'];?>
                      <td><?php echo $_SESSION['rid']=$row['request_id'];?></td>
                      <td><?php echo $_SESSION['sid']=$row['sender_id'];?></td>
                      <td><?php echo $_SESSION['rt']=$row['request_type'];?></td>
                      <td><?php echo $_SESSION['rs']=$row['request_subject'];?></td>
                      <td><?php echo $row['request_detail'];?></td>
                      <td><?php echo $row['support_desk_name'];?></td>
                      <td><?php 
                      $time=date('Y-m-d h:i:s');
                             $sec_off=$row['executive_officer_process_time'];
                             $selectedTime = $row['date'];
                             $endTime = strtotime("+".$sec_off." day", strtotime($selectedTime));
                            echo $endtime=date('Y-m-d h:i:s', $endTime)
                            ?></td>
                      <td>
                      <?php $file = "./../uploads/.$aattachement";?> 
         <?php if ($aattachement=="")
         {
          echo "No Attached file";
         }
         else
         {echo "<a href='download.php?nama=".$file."'>
                <i class='fa fa-download'></i> download file. $aattachement
              </a>";
         }?>
                 
                      </td>
                    <td><?php 
                if ($endtime>$time AND $row['executive_officer_status'] == 0)
                 {
                  ?><input type="submit" value="<?php echo "Pending";?>" class="btn btn-primary btn-mini pull-right" data-toggle="modal" data-target="#modal-default"<?php
                 }
                 else if ($endtime>$time AND $row['executive_officer_status'] == 1 AND $row['request_condition'] != 'DONE') {
                  ?> <input type="submit" value="<?php echo "InProgress";?>" class="btn bg-yellow btn-mini pull-right" data-toggle="modal" data-target="#modal-default"><?php
                 }
                  else if ($endtime>$time AND $row['executive_officer_status'] == 2) {
                   ?><input type="submit" value="<?php echo "Denied";?>" class="btn bg-navy btn-mini pull-right" data-toggle="modal" data-target="#modal-default"><?php
                 }
                if ($endtime>$time AND $row['request_condition'] == 'DONE') {
                  ?><input type="submit" value="<?php echo "Completed";?>" class="btn btn-success btn-mini pull-right" data-toggle="modal" data-target="#modal-default">
                  <?php
                 }
                 if ($endtime>$time AND $row['executive_officer_status'] == 3 AND $row['request_condition'] == '') {
                  ?><input type="submit" value="<?php echo "InProgress";?>" class="btn bg-yellow btn-mini pull-right" data-toggle="modal" data-target="#modal-default">
                  <?php
                 }
                 if ($endtime<$time){
                  ?><input type="submit" value="<?php echo "Date_Passed";?>" class="btn btn-danger btn-mini pull-right" data-toggle="modal" data-target="#modal-default">
                  <?php
                 }
                ?></td> 
                     <td><?php 
                if ($row['overrided'] == 'ovd')
                 {
                  ?><input type="submit" value="<?php echo "Over_Rided";?>" class="btn-mini"data-toggle="modal" data-target="#modal-remark1"><?php
                 }
                 else {
                  echo "-";
                 }
                 
                ?></td>
                <?php
              }
            }
          ?>

      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </section>
  <div class="modal fade" id="modal-remark1">
          <div class="modal-dialog">
            <div class="modal-content" id="login">
              <div class="modal-header" style="background-color: #3c8dbc">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #fff">Overrided Detail Report</h4>
            </div>
            <div class="box box-primary"> 
           
                      
                <div class="modal-body">
                <form>
    <div class="box-body">
      <div>
          <h4>Request ID: <?php echo $_SESSION['rid'];?></h4><br />
          <h4>Request Type: <?php echo $_SESSION['rt'];?></h4><br />
          <h4>Sender Id: <?php echo $_SESSION['sid'];?></h4><br />
          <h4>Request Subject: <?php echo $_SESSION['rs'];?></h4><br />
          <h4>Service Request Denial Overrided By: <?php echo $_SESSION['mgr'];?></h4><br />
      </div>
   </div>
   </form>
</div> 

</div>
                              

  <!-- /.content-wrapper -->
</div>
 </div>
<!-- /.content-wrapper -->
  <?php
 //include('include/footer.php');
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
