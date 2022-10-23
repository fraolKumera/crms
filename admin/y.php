<?php
session_start();
if(isset($_POST['send']))
{
include('conn.php');
// $id=$_SESSION['id'];
//$id=$row['ID'];
$request_id=$_POST['request_id'];
//  $executive_officer=$_SESSION['username'];
 $denial_reason=$_POST['reason'];
$sql="UPDATE `requests` SET `support_desk_status`=2 , `denial_reason`='$denial_reason' WHERE `ID`='$request_id'";
// $sqli="UPDATE `requests` SET `executive_officer`='".$executive_officer."' WHERE ID='$id'";
if(mysqli_query($conn,$sql)===TRUE)
{
	?><script>alert('Denial Reason Inserted');</script><?php
	echo "<script>window.location.assign('request_list.php');</script>";
            
}
else
{
	echo mysqli_error($conn);
}
}

  
?> 
 