<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRST</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link href="logo1.jpg" rel="shortcut icon">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background: url(login.jpg);">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color: Black; opacity: 0.7;">
    <p align= "center"><img src="logo1.jpg" width="100px" height="100px"></p>
    <h4 class="login-box-msg" style="color: #fff; text-align: center;">Sign in</h4>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User Name" name="username">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div  align="center">
         <p align="center"> <button type="submit" class="btn btn-primary" name="signin" >Sign In</button></p>
        </div>
        <!-- /.col -->
      </div>
    </form>
  <?php
session_start(); //Start the session

// Connect To The database
include('conn.php');
if (isset($_POST["signin"])) {
  // Fetch User details sent
  $user=$_POST["username"];
  $password=$_POST["password"];
  $pass=md5($password);
  // Check if user input is blank
  if ($user=="" || $password=="") {
    ?><script>
    alert("Empty username and password");
    </script>
    <?php
    exit();
  } else {
     $sql = "SELECT * FROM user WHERE first_name = '$user' and password = '$pass'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
        // session_register("myusername");
         $_SESSION['username'] = $user;
         header("location: index.php");
    } else {
      ?>
      <script>
      alert("incorrerct username or password");
      </script>
      <?php
      exit();
    } 
  } 
} 
?>
    <!-- /.social-auth-links -->
    <a href="forgetpwd.php" style="color: #fff">Forget Password</a>
   <a href="forgetpwd.php" style="color: #fff" class="pull-right"><input type="checkbox" style="color: #fff">Remember Me</a><br /><br />
    <a href="forgetpwd.php" style="text-align: center;">&copy; Copy Right 2021 Zelalem Temesgen</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
