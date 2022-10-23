<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['user'])){ //if login in session is not set
  header("Location: login.php");
}
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>DSRS<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="track.php">Track request</a></li>
          <li> <a href="change_password.php"> Change Password </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->
      <a class="btn-getstarted scrollto" href="logout.php">Logout</a>
    </div>
  </header><!-- End Header -->

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
      <h2>Welcome <?php //echo $user=$_SESSION['username'];?></h2>
      <!-- <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p> -->
      <div class="d-flex">
        <a href="#services" class="btn-get-started scrollto">Get Started</a>
        <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
      </div>
    </div>
  </section>

  <main id="main">



    <section id="services" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">
          <div class="box box-primary"> 
            <div class="modal-body" style="background-color:#ecf0f5;">
              <form method="POST" action="" id="form" style="display: block" enctype="multipart/form-data">
               <div class="row">
                <div class="col-md-8" >
                  <!-- Box Comment -->
                  <div class="box box-widget">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <span class="username"><a href="#">Fill Required Information</a></span>
                      </div>
                      <!-- /.user-block -->
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">

                    <form method="POST" action="" id="form" style="display: block" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-xs-6">
                        <input type="text" class="form-control" name="client_id" value="<?php echo $_SESSION['user'];?>" hidden>
                         Customer ID <input type="text" class="form-control" name="client_id" value="<?php echo $_SESSION['user'];?>" disabled>
                        </div>
                      <div class="col-xs-6">
                        <label>Select Service</label>
                        <div class="form-group">
                          <select  id="service" class="form-control" name="request_service" required>
                            <option>Select Service</option>
                                <?php
                                include('admin/conn.php');
                                $sql="SELECT `Service_name` FROM `service`"; 
                                $result = mysqli_query($conn,$sql);

                                while ($row=mysqli_fetch_array($result)) {
                                 echo '<option>'.$row["Service_name"].'</option>';
                                }
                                ?>
                         </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6">
                       subject<input type="text" class="form-control" name="Subject" placeholder="Subject" required>
                       </div> 
                      <div class="col-xs-6">
                         Request Detail<textarea name="request_detail" id="compose-textarea" class="form-control" required></textarea>
                      </div>
                      </div><br>  
                      <div class="row">    
                                    <div class="col-xs-6">
                                       Attach Document<div class="btn btn-default btn-file">
                                       
                                        <input type="file" name="attachment">
                                      </div>
                                      <p class="help-block">Max. 32MB</p>
                                    </div>
                                  </div><br>
                      <div class="row"> 
                        <div class="col-xs-12">
                           <input type="radio" name="agree" required><b> I Agreed all the information I provided are legal and up to date</b>
                        </div>
                      </div><br>
                      <div class="modal-footer">
                        <button id="add" name="request" class="btn btn-primary" type="submit">Request</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                      </div>
                    </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                  <div class="img">
                    <img src="assets/img/cta.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                </div>
             </form>
            </div>
          </div>
 

         

        </div>

      </div>
    </section><!-- End Call To Action Section -->


    <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
        </div>

      </div>

    

      <div class="container">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">
              <h3>Get in touch</h3>
              <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi minus.</p>

              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252230.01326774707!2d38.63805601187506!3d8.963489655146436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85cef5ab402d%3A0x8467b6b037a24d49!2sAddis%20Ababa!5e0!3m2!1sen!2set!4v1653574334342!5m2!1sen!2set" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div><!-- End Google Maps -->
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer"></footer>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
       
          <div class="credits">
            Designed by <a href="https://bitappstech.com/">Zelalem Temesgen</a>
          </div>
        </div>

        <!-- <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div> -->

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
 if(isset($_POST['request']))
 {
  include('admin/conn.php');


  $client_id=$_POST['client_id'];
  $sql="SELECT * FROM `account` WHERE ID='$client_id'";
  $result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);  
if($count == 1) {

$request_service=$_POST['request_service'];
$sql="SELECT * FROM `service` WHERE `Service_name` = '$request_service' "; 
$result = mysqli_query($conn,$sql);
$rowcount = 0;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$row["process_time"];


$id=(uniqid(rand()));
$request_id= substr($id, 0, -15);
$client_id=$client_id;
$request_service=$_POST['request_service'];
$Subject=$_POST['Subject'];
// $attach=$_POST['attachment'];
$process_time=$row["process_time"];
$denial_res=0;
$executive_officer=0;
$request_detail=$_POST['request_detail'];
$first_officer=$row['first_line_officer_execution_time'];
//$second_officer=$row['second_line_officer_execution_time'];
$exe_ofiicer=$row['executive_officer_process_time'];
$date=date('Y-m-d h:m:s');
$default=0;

$filename = $_FILES['attachment']['name'];

// destination of the file on the server
$destination = '../uploads/' . $filename;

// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['attachment']['tmp_name'];
$size = $_FILES['attachment']['size'];

// if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
//   ?><script>//alert('You file extension must be .zip, .pdf or .docx"')</script><?php
//     // echo "You file extension must be .zip, .pdf or .docx";
// } elseif ($_FILES['attachment']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
//   ?><script>//alert('File too large!')</script><?php
//     // echo "File too large!";
// } else {
// move the uploaded (temporary) file to the specified destination
$sql="INSERT INTO `requests` (request_id , sender_id , request_type  , subject , request_detail , support_desk_status , process_time , aattachement , denial_reason , executive_officer , first_line_officer_execution_time , executive_officer_process_time , executive_officer_status , overrided , ovd_manager , request_date) VALUES ('".$request_id."' , '".$client_id."' , '".$request_service."' , '".$Subject."' , '".$request_detail."' , '".$default."' , '".$process_time."' , '".$filename."' , '".$denial_res."' , '".$executive_officer."' , '".$first_officer."' , '".$exe_ofiicer."', '".$executive_officer."' , '".$executive_officer."' , '".$executive_officer."' , '".$date."')";
if(mysqli_query($conn,$sql)===TRUE)
{
  ?><script>alert('Service Request Successfully Sent');</script><?php
  /*echo '<script>var div=document.getElementById("hidden");
                                                    div.style.visibility="visible";
                                                    div.style.display="block";
                                                    div.className="alert alert-success fade in";
                                                    document.getElementById("notify").innerHTML="Successfully Inserted";</script>';
echo '<script> setInterval(function(){ document.getElementById("hidden").style.display="none"; }, 3000);</script>';*/
}
else
{
  echo mysqli_error($conn);
}
if (move_uploaded_file($file, $destination)) {
 ?><script>alert('You have uploded a file');</script><?php
} else {
  ?><script>alert("You haven't upload a file.")</script><?php
    // echo "Failed to upload file.";
}
// }



}
}

}
else
{
?><script>alert('Wrong Customer ID!')</script><?php
}
  
}
?>



