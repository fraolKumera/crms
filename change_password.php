<!DOCTYPE html>
<html lang="en">
<?php  session_start(); 
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Customer Service Request </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
  <div class="container">
  <div class="row">
    <div class="col">
    <img src="assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
      <h2>Welcome</h2>
    </div>
    <div class="col">
    <form action="" method="POST">
    <div class="container">
<div class="row">

</div>
<div class="row">
<div class="col-sm-12 col-sm-offset-12">
<p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
<form method="post" action="" id="passwordForm" enctype="multipart/form-data">
<input type="password" class="input-lg form-control" name="old_password" id="old_password" placeholder="Enter your old password" autocomplete="off">
<br/><br/><br/>
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
<br/><br/><br/>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<br/><br/><br/>
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" name="change_password" value="Change Password">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
    <!-- Main content -->
   </div>
    <!-- /.content -->
  </div>

</form>
    </div>
  </div>
</div>
  </section>

  <footer id="footer" class="footer"></footer>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
       
          <div class="credits">
            Designed by <a href="https://bitappstech.com/">Zelalem Temesgen</a>
          </div>
        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
// session_start(); //Start the session

// Connect To The database
include('admin/conn.php');
if (isset($_POST["change_password"])) {
 $old_password=$_POST['old_password'];
 $old=md5($old_password);
 $user_id=$_SESSION['user'];
$sql = "SELECT * FROM account WHERE ID = '$user_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
$old_pass=$row['password'];
if($old_pass==$old)
{

$password1=$_POST['password1'];
$password2=$_POST['password2'];
if($password1==$password2)
{
   
 $email;
     $pass=md5($password1);
    $sql = "UPDATE `account` SET `password`='$pass' WHERE `ID`='$user_id'";
    if(mysqli_query($conn,$sql))
    {
     
        echo "<script>alert('Password Changed Successfully')</script>";
        echo "<script>window.open('Login.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Password Not Changed')</script>";
    }
}
else{
    echo "<script>alert('Password Not Matched')</script>";
 }
}
else
{
    echo "<script>alert('Old password is not correct')</script>";
}
}
else
{
    echo "password do not match";
}

?>
