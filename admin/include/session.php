<?php
//session_start();
// If Session not set send user to login page
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
} 

