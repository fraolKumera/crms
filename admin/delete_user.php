<?php
include('include/dbcon.php');

if(isset($_POST["id"]))
{
 $query = "DELETE FROM `account` WHERE ID = '".$_POST["id"]."'";
 if(mysqli_query($con, $query))
 {
  echo 'Data Deleted';
 }
}

?>