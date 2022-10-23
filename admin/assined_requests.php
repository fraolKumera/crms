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
      <a href="index.php"><h1>
        Assigned Service Requests
      </h1></a>

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>

    </section>
        <div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
                                  <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
                                
                            </button>
                                  <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>

   </div>
  <div id="Add">
                      
                              <section class="content">
     <div class="row" >
            <div class="">
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Assigned Service Requests</b></h3></center> 
                      </div><br>
                       <table id="cart_table" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th>ID</th>
          <th>Request Id</th>
          <th>Sender Id</th>
          <th>Subject</th>
          <th>Request Detail</th>
          <th>Assigned By Officer</th>
          <th>Attachment</th>
          <th>Process Execution Time Left</th>
          <th>Action<th>
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
  $query = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=0";
}
else{
$query = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=0 && `department_name`='$user_department'";
}
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if 
          ($rowcount == 0) {     
        }
         $ovd_mgr=$_SESSION['username'];
             ?> <tbody>
                <tr>
                <?php $aattachement=$row['attachement'];?>
          <td><?php echo $row['ID'];?></td>
		  <?php $_SESSION['ID']=$row['ID'];?>
          <td><?php echo $row['request_id'];?></td>
          <td><?php echo $row['sender_id'];?></td>
          <td><?php echo $row['request_subject'];?></td>
          <td><?php echo $row['request_detail'];?></td>
          <td><?php echo $row['support_desk_name'];?></td>
                <td> <?php $file = "./../uploads/.$aattachement";?> 
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
                    $time=date('Y-m-d h:i:s');
                    //  $row['executive_officer_process_time'].'<br>';
                    // echo $NewDate1=date('Y:m:d', strtotime('+3 days')).'<br>';
                     $NewDate=Date('Y-m-d h:i:s', strtotime('+'.$row['executive_officer_process_time'].' days'));
                     $executive_officer_process_time='0-0-'.$row['executive_officer_process_time'].' 0:0:0<br>';
                    $start_date = new DateTime($time);
                    $since_start = $start_date->diff(new DateTime($NewDate));
                    //echo $since_start->days.' days total<br>';
                   
                    echo $since_start->d.' days and ';
                    echo $since_start->h.':';
                    echo $since_start->i.':';
                    echo $since_start->s.' hours';
                    ?>
                    <!-- <h4 id="demo1"></h4> -->
<script type="text/javascript">
// Set the date we're counting down to
// var countDownDate = new Date("<?php echo $endtime; ?>").getTime();

// // Update the count down every 1 second
// var x = setInterval(function() {

//     // Get todays date and time
//     var now = new Date().getTime();
    
//     // Find the distance between now and the count down date
//     var distance = countDownDate - now;
    
//     // Time calculations for days, hours, minutes and seconds
//     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
//     // Output the result in an element with id="demo"
//     document.getElementById("demo1").innerHTML = days + "days and " + hours + ":"
//     + minutes + ":" + seconds;
    
//     // If the count down is over, write some text 
//     if (distance < 0) {
//         clearInterval(x);
//         document.getElementById("demo1").innerHTML = "Execution Time Passed";

//     }
// }, 1000);
</script><?php
                  }
                else
                {
                  echo "Time passed";
                }
                  ?> 
</td> 
                
                <td><form action="" method = "POST"> <input type="hidden" name = "id" value=<?php echo $row['ID']; ?>>
                  <input class='btn btn-success' type="submit" name="accept" Value="Accept">
                  <button type="button" class="btn btn-info btn-flat pull-right" data-toggle="modal" data-target="#modal-default<?php echo $row['ID'];?>">Deny
                  </form>
                </td>   
                <div class="modal fade" id="modal-default<?php echo $row['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Denial Reason for id <?php echo $row['ID'];?></h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="general/send_reason2.php">
      <input type="text" name="u_id" value="<?php echo $row['ID'];?>" hidden>
        <input type=text name="off_name" value="<?php echo $_SESSION['username'];?>" hidden>
<div class="modal-body">
<textarea name="reason" id="compose-textarea" class="common-input mb-20 form-control" style="height: 300px"></textarea>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="send">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>          
                <?php
                
                }
              }

              if(isset($_POST['accept']))
                {
                  $id=$_POST['id'];
                $sql = "UPDATE `assigned_requests` SET `executive_officer_status` = 1 WHERE `ID` = '".$id."'";
            if(mysqli_query($conn,$sql))
            {
               ?><script>alert('Accepted');</script><?php
              }
else
{
	          echo 'not updated';
}	
            }
       
                    ?>           
              
                    </td>
                </tr>
              </tbody>
        </table> 
        
          <?php
  
?>
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