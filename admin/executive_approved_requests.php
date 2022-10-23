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
                    
                        <?php
          
                ?> 
   

   <section class="content">
      <div class="row" >
            <div class="">
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Approved Service Request</b></h3></center> 
                      </div><br>
                       <table id="cart_table" class="table table-bordered table-striped">
                <thead>
                <tr>
         <th>ID</th>
          <th>Request Id</th>
          <th>Sender Id</th>
          <th>Subject</th>
          <th>Request Detail</th>
          <th>Status</th>
         
          <th>Service Execution Time</th>
		      <th>Status</th>
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
                  $query = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`=''  ORDER BY Id  DESC";
                }
                else{
                $query = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`='' and `department_name`='$user_department' ORDER BY Id  DESC ";
                }
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $time=date('Y-m-d');
      $exe_off=$row['executive_officer_process_time'];
      $selectedTime = $time;
      $endTime = strtotime("+".$exe_off." day", strtotime($selectedTime));
       $endtime=date('m-d-Y', $endTime)
             ?> <tbody>
                <tr>
           <td><?php echo $row['ID'];?></td>
            <?php $_SESSION['ID']=$row['ID'];?>
          <td><?php echo $row['request_id'];?></td>
		 <?php $_SESSION['req_id']=$row['request_id'];?>
          <td><?php echo $row['sender_id'];?></td>
          <td><?php echo $row['request_subject'];?></td>
          <td><?php echo $row['request_detail'];?></td>
          <td><?php 
          if ($row['executive_officer_status'] == 1 AND $row['request_condition'] == '')
           {
            ?><input type="submit" value="<?php echo "Pending";?>" class="btn btn-primary btn-mini pull-right" data-toggle="modal" data-target="#modal-default"<?php
           }
          if ($endtime>$time AND $row['request_condition'] == 'DONE') {
            ?><input type="submit" value="<?php echo "Completed";?>" class="btn btn-success btn-mini pull-right" data-toggle="modal" data-target="#modal-default">
            <?php
           }
          ?></td>
          
             <?php
                 $time=date('Y-m-d h:i:s');
                 $second_line=$row['executive_officer_process_time'];
                 $selectedTime = $row['date'];
                 $endTime = strtotime("+".$second_line." day", strtotime($selectedTime));
                 $endtime=date('Y-m-d h:i:s', $endTime)
                ?> 
                <td>

                  <?php

                 // echo 'request date '.$row['request_date'].'</br>';
                 // echo 'end time     '.$endtime.'</br>';
                 // echo 'today '.$time.'</br>';
                  if($endtime>$time)
                  {

                    ?><h4 id="demo1"></h4>
<script type="text/javascript">
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $endtime; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo1").innerHTML = days + "days and " + hours + ":"
    + minutes + ":" + seconds;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo1").innerHTML = "Execution Time Passed";

    }
}, 1000);
</script><?php
                  }
                else
                {
                  echo "Time passed";
                }
                  ?> 
</td>
          <?php
          $dx=$row['date'];
            $_SESSION['date']=$dx;
          ?>
     
<td><form action="" method = "POST"> <input type="text" name = "uid" value=<?php echo $row['ID'];?> hidden >
<input type="text" name="req_id" value="<?php echo $row['request_id'];?>" hidden>
                  <input class='btn btn-success' type="submit" name="done" Value="Completed">
                  </form>
                </td><?php

              }
              }
                    ?>           
              
                </tr>
              </tbody>
        </table> 
			<?php
		if(isset($_POST['done']))
		{
      $uid=$_POST['uid'];
			$req_id=$_POST['req_id'];
      $sql1= "UPDATE `assigned_requests` SET `request_condition` = 'Completed' WHERE `request_id` = '".$req_id."'";
			//$sql= "UPDATE `requests` SET `support_desk_status` = '0' WHERE `request_id` = '".$id."'";
      if(mysqli_query($conn,$sql1))
      {
         ?><script>alert('Service Complited');</script><?php
        }
else
{
      echo 'not updated';
}	
      }
        
		?>
         <section class="content">
        <!--  <?php
/*$query="SELECT * FROM `assigned_requests` WHERE `request_condition`=''";
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($rowcount == 0) {     
        }
        $request_type=$row['request_type'];
      }
    }
    $id=$_SESSION['ID'];
$query="SELECT * FROM `assigned_requests` WHERE `ID`='$id'";
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($rowcount == 0) {     
        }
        $process_time=$row['process_time'];
    
    $time=date('Y-m-d');
       $selectedTime = $time;
       $endTime = strtotime("+".$process_time." day", strtotime($selectedTime));
       echo "id ".$_SESSION['ID']. "is requesting";?><br><?php
       echo $_SESSION['date']. " is requeste date.";?><br><?php
       echo $process_time." is process time.";?><br><?php
       echo $endtime=date('Y-m-d', $endTime)." is end time.";?><br><?php
       echo date('Y-m-d'). " is start time.";?><br><?php

          if($time>=$endtime)
          {
                  echo "ID:".$_SESSION['ID']. "s request is not done.";
          }
         }
         }      */
                ?>-->
            </div>
            <!-- /.modal-content --> 
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