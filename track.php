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
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->
      <a class="btn-getstarted scrollto" href="logout.php">Logout</a>
    </div>
  </header><!-- End Header -->


  <main id="main">



    <section id="services" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">
          <div class="box box-primary"> 
            <div class="modal-body" style="background-color:#ecf0f5;">
              <form method="POST" action="" id="form" style="display: block">
               <div class="row">
                <div class="col-md-8" >
                  <!-- Box Comment -->
                  <div class="box box-widget">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <span class="username"><a href="#">Fill your account Information</a></span>
                      </div>
                      <!-- /.user-block -->
                   
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                    <form method="POST" action="" id="form" style="display: block">
                     <div class="row">
                        <div class="col-xs-6">
                        <input type="number" class="form-control" name="client_id" value="<?php echo $_SESSION['user'];?>" hidden>
                         Customer ID <input type="number" class="form-control" name="client_id" value="<?php echo $_SESSION['user'];?>" disabled>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button id="add" name="request" class="btn btn-primary" type="submit">Check</button>
                             </div>
                    </form>
                    </div>
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
   ?>
                  <div class="box-header with-border">
                    <center>
                      <h5 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Request Status</b></h5></center> 
                      </div>
                       <table id="cart_table" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th>Request Id</th>
          <th>Request Type</th>
          <th>Support Desk Status</th>
          <th>2nd line Officer denial Reason</th>
          
          <th>Denial Reason</th>
          <th>Status</th>
                </tr>
                </thead>
              <tbody>
                  <?php
              $query = "SELECT * FROM `requests` WHERE `sender_id`='$client_id'";
        $result = mysqli_query($conn,$query);
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
          <td><?php echo $row['request_id'];?></td>
          <td><?php echo $request_type=$row['request_type'];?></td>
          <td><?php if($row['support_desk_status']==0){echo "Pending";}
          elseif($row['support_desk_status']==1){
              echo "Assigned";}
              else{
                  echo "Denied";
              } ?></td>
          <td><?php $query1 = "SELECT * FROM `assigned_requests` WHERE `sender_id`='$client_id' AND `request_type`='$request_type'";
        $result1 = mysqli_query($conn,$query1);
            // output data of each row
            while($row1 = mysqli_fetch_assoc($result1)) {
echo $row1['denial_reason'];
            }?></td>
          <td><?php if($row['denial_reason']=='0'){
              echo "";
          }
          else
          {echo $row['denial_reason'];}?></td>
          <td><?php 
          $query2 = "SELECT * FROM `assigned_requests` WHERE `sender_id`='$client_id' AND `request_type`='$request_type'";
          $result2 = mysqli_query($conn,$query2);
              // output data of each row
              while($row2 = mysqli_fetch_assoc($result2)) {
          echo $row2['request_condition'];
              }?></td>
                </tr>
                <?php
            }
            ?>
              </tbody>
        </table> 
 
                <?php
                    
            
        }
        else
{
  echo "Request id not found";
}
}

 
?>
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
