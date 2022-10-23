<?php
session_start();
if(isset($_POST['send1']))
{
include('conn.php');
$request_id1=$_POST['request_id1'];
$query = "SELECT * FROM `requests` WHERE `ID`='$request_id1'";
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // if ($rowcount == 0) {     
        // }
             $request_type=$row['request_type'];
            $request_id=$row['request_id'];
             $sender_id=$row['sender_id'];
             $subject=$row['subject'];
             $request_detail=$row['request_detail'];
             $attach=$row['aattachement'];
            $request_service=$_POST['request_service'];
            $date=date('Y-m-d h:m:s');
            $support_desk_name=$_SESSION['username'];
            $first_officer=$row['first_line_officer_execution_time']; 
            $exe_off=$row['executive_officer_process_time'];

                      }
      }
 $query = "SELECT * FROM `service` WHERE `Service_name`='$request_type'";
 $result = $conn->query($query);
 $rowcount = 0;
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
 
          $row['department_name'];
          $time=$row['process_time'];
          $exe=0;

            $sql1 = "INSERT INTO `assigned_requests` (`request_type` , `department_name` , `request_id` , `request_subject` , `request_detail` , `sender_id` , `process_time` , `support_desk_name` , `executive_officer_name` , `first_line_officer_execution_time` , `executive_officer_process_time` , `attachement` , `date` , `denial_reason` , `executive_officer_status`, `process_time_left` , `overrided` , `ovd_mgr` , `request_condition`) VALUES ('".$request_type."' , '".$row['department_name']."' , '".$request_id."' , '".$subject."' , '".$request_detail."' , '".$sender_id."' , '".$row['process_time']."' , '".$support_desk_name."' , '' , '".$first_officer."' , '".$exe_off."' , '".$attach."' , '".$date."' , '' , '".$exe."' , '".$time."', '' , '', '')";
            $sql = "UPDATE `requests` SET `support_desk_status` = 1 WHERE `ID` = '$request_id1'";
           if($conn->query($sql1)===TRUE && $conn->query($sql)===TRUE)
             {
              ?><script>alert('Accepted');</script><?php
              echo "<script>window.location.assign('request_list.php');</script>";
             } 
              else
              {
                ?><script>alert('Not Inserted');</script><?php
                echo "<script>window.location.assign('request_list.php');</script>";
                
              }
      }
 }
}
?>