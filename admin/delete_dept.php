<?php
include('include/dbcon.php');

if(isset($_POST["id"]))
{
 $query = "DELETE FROM `departments` WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($con, $query))
 {
  ?><script>alert('department Deleted.');</script>script><?php
 }
}

?>