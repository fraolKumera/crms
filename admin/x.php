<?php
session_start();
if(isset($_POST['send1']))
{
include('conn.php');
$ID_NUM=$_SESSION['id'];
$query = "SELECT * FROM `requests` WHERE ID='$ID_NUM'";
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($rowcount == 0) {     
        }

              $executive_officer=$row['executive_officer'];
              $request_type=$row['request_type'];
              $request_id=$row['request_id'];
              $sender_id=$row['sender_id'];
              $subject=$row['subject'];
              $request_detail=$row['request_detail'];
              $request_service=$_POST['request_service'];
              $date=date('Y-m-d h:m:s');
              $support_desk_name=$_SESSION['username'];
              $first_officer=$row['first_line_officer_execution_time']; 
              $second_officer=$row['second_line_officer_execution_time'];
              $exe_off=$row['executive_officer_process_time'];

                      }
      }
      $query = "SELECT * FROM `assigned_requests` WHERE `support_desk_name`='$executive_officer'";
$result = $conn->query($query);
$rowcount = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($rowcount == 0) {     
        }
         $row['department_id'];
         $row['department_name'];
         $row['process_time'];

            $sql1="INSERT INTO `assigned_requests` (`request_type` , `department_id` , `department_name` , `request_id` , `request_subject` , `request_detail` , `sender_id` , `process_time` , `support_desk_name` , `first_line_officer_execution_time` , `second_line_officer_execution_time` , `executive_officer_process_time` , `date`)VALUES('".$request_type."' , '".$row['department_id']."' , '".$row['department_name']."' , '".$request_id."' , '".$subject."' , '".$request_detail."' , '".$sender_id."' , '".$row['process_time']."' , '".$support_desk_name."' , '".$first_officer."' , '".$second_officer."' , '".$exe_off."' , '".$date."')";
            $sql = "UPDATE `requests` SET `support_desk_status` = 1 WHERE `ID` = '".$ID_NUM."'";
           if(mysqli_query($conn,$sql1)) and  if(mysqli_query($conn,$sql)))
            {
                ?>
             <!-- //select start time
              //Select process time
              //add both
              //compare to current time
              //-->
              <script>alert('Request Accepted.');</script>
              <?php
              echo "<script>window.location.assign('request_list.php');</script>";
         
          }
              else
              {
              	?><script>alert('Request Not Accepted.');</script><?php
              	
              }
     }
}
}
?>