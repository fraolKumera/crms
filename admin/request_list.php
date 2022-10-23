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
  <section class="content-header">
        <h1>
        Service Request List
          <div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
              <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
            </button>
            <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>
        </div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Service Request List</li>
        </ol>
      </section>
      <!--<div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
                                  <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
                                
                            </button>
                                  <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>

   </div>-->
	             <div id="Add">
                     
                           
    <section class="content">
      <div class="row" >
            <div class="">
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Request Service</b></h3></center> 
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
          <th>Attachement</th>
          <th>Service Execution Time</th>
          <th>Action<th>
                </tr>
                </thead>
                <?php
              //  echo $user=$_SESSION['username'];

                $query = "SELECT * FROM `requests` WHERE support_desk_status=0";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
//       $service_name=$row['request_type'];
//       $service_name_quary = "SELECT * FROM `service` WHERE `Service_name`='$service_name'";
// $service_name_quary_result = mysqli_query($conn,$service_name_quary);
//     while($row_1 = mysqli_fetch_assoc($service_name_quary_result)) {
//      $user_department_name=$row_1['department_name'];

//      $user_department = "SELECT * FROM `user` WHERE `department`='$user_department_name' and ";
//      $user_department_result = mysqli_query($conn,$user_department);
//          while($row_1 = mysqli_fetch_assoc($user_department_result)) {
//     }
             ?> <tbody>
                <tr>
                  <?php 
                  $aattachement=$row['aattachement'];?>
          <td><?php echo $row['ID'];?></td>
          <td><?php echo $row['request_id'];?></td>
          <td><?php echo $row['sender_id'];?></td>
          <td><?php echo $row['request_type'];?></td>
          <td><?php echo $row['subject'];?></td>
          <td><?php echo $row['request_detail'];?></td>
            <td><?php $file = "./../uploads/.$aattachement";?> 
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
                 $first_line=$row['first_line_officer_execution_time'];
                 $selectedTime = $row['request_date'];
                 $endTime = strtotime("+".$first_line." day", strtotime($selectedTime));
                 $endtime=date('Y-m-d h:i:s', $endTime)
                ?> 
                <td>
                  <?php

                //  echo 'request date '.$row['request_date'].'</br>';
                //  echo 'end time     '.$endtime.'</br>';
                 // echo 'today '.$time.'</br>';
                  if($endtime>$time)
                  {
                   //echo 'Request date '.$request_date=$row['request_date'].'<br>';
                     $Date = $row['request_date'];
                    
                    echo $future = date('Y-m-d h:i:s', strtotime($Date. ' + 1 days'));

                      // $rem = strtotime($Date) - time();
                      // $day = floor($rem / 86400);
                      // $hr  = floor(($rem % 86400) / 3600);
                      // $min = floor(($rem % 3600) / 60);
                      // $sec = ($rem % 60);
                      // if($day) echo "$day Days ";
                      // if($hr) echo "$hr Hours ";
                      // if($min) echo "$min Minutes ";
                      // if($sec) echo "$sec Seconds ";
                      // echo "Remaining...";
                //   echo  $time=date('Y-m-d h:i:s');
                //     $start_date = new DateTime($time);

                //     $since_start = $start_date->diff(new DateTime($row['request_date']));
                //     //echo $since_start->days.' days total<br>';
                //  echo '<br>request:'.$row['request_date'];
                //     echo '<br>'.$since_start->d.' days and ';
                //     echo $since_start->h.':';
                //     echo $since_start->i.':';
                //     echo $since_start->s.' hours';
                
                    
                  

//  echo $endtime;
                    ?>
                    <!-- <h4 id="demo1">a</h4> -->
<script type="text/javascript">

</script><?php
                  }
                else
                {
                  echo "Time passed";
                }
                  ?> 
</td> 

                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $row['ID'];?>">
                                    Deny
</button>
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
      <form method="post" action="y.php" enctype="multipart/form-data">
                <div class="modal-body">
                <h1 style="color: #999">Enter a Reason</h1>
                <input type="text" name="request_id" value="<?php echo $row['ID']?>" hidden> 
                <textarea name="reason" id="compose-textarea" class="common-input mb-20 form-control" style="height: 300px"></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="send" value="SEND">Send</button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>  
              

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1<?php echo $row['ID'];?>">
                                    Assign
</button>
<div class="modal fade" id="exampleModal1<?php echo $row['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task assigned for id <?php echo $row['ID'];?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="p.php" enctype="multipart/form-data">
        <input type="text" name="request_id1" value="<?php echo $row['ID'];?>" hidden>
                              <select class="form-control" name="request_service">
                                <?php 
                                $sql12="SELECT * FROM `departments`";
                                $result12 = mysqli_query($conn,$sql12);
                                while ($row=mysqli_fetch_array($result12)) {
                                ?>
                                <option value="<?php echo $row['d_name'];?>"> 
                                <?php echo $row['d_name'];?></option>
                                <?php
                                }
                                ?>
                             </select>
                          <br>
                        <div class="modal-footer">
                         
                          <button type="submit" class="btn btn-success btn-flat pull-right" name="send1"> Send </button>
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        </div>
                      </form>
      </div>
    </div>
  </div>
</div>  
                </td>  
                <?php
                }
              }
            if(isset($_POST['Deny']))
              {
                ?><script>alert('not accepted');</script><?php
                $sql = "UPDATE `requests` SET `support_desk_status` = 0 WHERE `ID` = '".$id."'";
                      if(!mysqli_query($conn,$sql))
            {
              echo 'not updated';
                 
              }
            }
                    //}
              
              //$sql = "UPDATE `new_registration` SET `status` = 0 ";
             // if($conn->query($sql)===TRUE)
              //{
                ?><!--<script>alert('walla status is 0!');</script>--><?php
              //}
         
                    ?>           
            
                
                </tr>
              </tbody>
        </table> 
                <?php
 // include('general/send_reason.php');
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
                              

  <!-- /.content-wrapper -->
</div>
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
