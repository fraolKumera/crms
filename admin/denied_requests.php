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
     <a href="index.php"> <h1>
      Denied Request List
      </h1></a>
  </section>
  <div class="col-sm-12" id="Add">
                       
                              <section class="content">
      <div class="row">
         <div class="box box-primary">
                        <center><div class="box-header with-border">
                          <h3 style="font-style: italic;font-family: 'centure'; color: #264d7e;"> Denied Request List</h3>
                        </div></center>
                      <table id="cart_table" class="table table-bordered table-hover">
                <thead>
                <tr>
          <th>ID</th>
          <th>Request Id</th>
          <th>Sender Id</th>
          <th>Request Type</th>
          <th>Subject</th>
          <th>Attachment</th>
          <th>Reason<th>
                </tr>
                </thead>
                <?php
                include('conn.php');
                $query = "SELECT * FROM `requests` WHERE support_desk_status=2";
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($rowcount == 0) {     
        }
             ?> <tbody>
                <tr>
                <?php $aattachement=$row['aattachement'];?>
                
          <td><?php echo $row['ID'];?></td>
  
          <td><?php echo $row['request_id'];?></td>
          <td><?php echo $row['sender_id'];?></td>
          <td><?php echo $row['subject'];?></td>
          <td><?php echo $row['request_detail'];?></td>
           <td> <?php $file = "./../uploads/.$aattachement";?> 
         <?php if ($aattachement=="")
         {
          echo "No Attached file";
         }
         else
         {echo "<a href='download.php?nama=".$file."'>
                <i class='fa fa-download'></i> download file. $aattachement
              </a>";
         }?></td>
                  
                  <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row['ID'];?>">
                   Denial Reason
</button>
                <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Denial reason for id <?php echo $row['ID'];?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        
        // $request_id=$row['ID'];
      // $query = "SELECT * FROM `requests` WHERE `ID` ='$request_id'";
      // $result = $conn->query($query);
      // while($row = $result->fetch_assoc()) {
         echo $row['denial_reason'];
      // }
      ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
      </td>
        
              
                <?php
                }
              }
              

               
                    ?>         
                 
             
            
                
                </tr>
              </tbody>
        </table> 
       
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