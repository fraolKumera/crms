  <header class="main-header">
    <!-- Logo -->
<?php
include('session.php');
$user=$_SESSION['username'];
?>
     
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="container">
        <div class="navbar-header" style="height:10px; ">
          <a href="index.php" class="navbar-brand"><img src="logo1.jpg" width="35px" Height="35px" style="border-radius: 50%"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
              <?php
                include('conn.php');
      $sql1 = "SELECT * FROM user WHERE first_name='$user'" ;
      $res = mysqli_query($conn,$sql1);
      while($ro = mysqli_fetch_array($res)){
       
      $acc_type=$ro['account_type'];
    }?>
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
        
      
    <?php
      if($acc_type=="admin") { ?>
                <li><a href="add_department.php">Add Department</a></li>
                <li><a href="add_service.php">Add Service</a></li>
                <li><a href="register.php">User Registration</a></li>
                <li><a href="request_ser.php">Reqest Service for a Customer</a></li>
                <li><a href="request_list.php">Request Lists</a></li>
                <li><a href="first_line.php">Assigned Request Lists</a></li>
                <li><a href="denied_requests.php">Denied Request List</a></li>
                <li><a href="assined_requests.php">New Service Request</a></li>
                <li><a href="first_line.php">All Service Request</a></li>
                <li><a href="overrided_requests.php">Overrided Service Request</a></li>
                <li><a href="executive_approved_requests.php">Approved For Execution</a></li>
                <li><a href="deniedrequests.php">Denied Request List</a></li>
                <li><a href="first_line.php">Executive Officer's Request Lists</a></li>
                <li><a href="executive_approved_requests.php">Service Approved For Execution</a></li>
                <li><a href="denied_requests.php">Denied Request List</a></li>
                <li><a href="alldenied_requests.php">Service Denied For Execution</a></li>
                <li><a href="completed.php">Completed Request List</a></li>
            <?php }  

      else if($acc_type=="support_desk") { ?>
                <li><a href="register.php">User Registration</a></li>
                <li><a href="request_ser.php">Reqest Service for a Customer</a></li>
                <li><a href="request_list.php">Request Lists</a></li>
                <li><a href="first_line.php">Assigned Request Lists</a></li>
                <li><a href="denied_requests.php">Denied Request List</a></li>
                
               <?php }  
               else if($acc_type=="executive_officer") { ?> 
                <li><a href="assined_requests.php">New Service Request</a></li>
                <li><a href="first_line.php">All Service Request</a></li>
                <li><a href="overrided_requests.php">Overrided Service Request</a></li>
                <li><a href="executive_approved_requests.php">Approved For Execution</a></li>
                <li><a href="deniedrequests.php">Denied Request List</a></li>
                <li><a href="r_services.php">Reqest Service</a></li>
              <li><a href="assigned_user_request_list.php">View Approved Requests</a></li>
                
              <?php } 
              else if($acc_type=="second_line_officer") { ?>
                <li><a href="first_line.php">Executive Officer's Request Lists</a></li>
                <li><a href="executive_approved_requests.php">Service Approved For Execution</a></li>
                <li><a href="denied_requests.php">Denied Request List</a></li>
                <li><a href="alldenied_requests.php">Service Denied For Execution</a></li>
                <li><a href="completed.php">Completed Request List</a></li>
             <?php }
             else if($acc_type=="customer") { ?>
              <li><a href="r_services.php">Reqest Service</a></li>
              <li><a href="assigned_user_request_list.php">View Approved Requests</a></li>
            <?php } ?>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input"    placeholder="Search">
            </div>
          </form>
        </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
			  <?php
			  include('conn.php');
        
			  if ($result = mysqli_query($conn, "SELECT * FROM `requests` WHERE `support_desk_status`=3 ORDER BY ID ")) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);
    /* close result set */
    mysqli_free_result($result);
}
      if ($res = mysqli_query($conn, "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND`request_condition`!='DONE' ORDER BY ID ")) {

    /* determine number of rows result set */
    $row_ct = mysqli_num_rows($res);
    /* close result set */
    mysqli_free_result($res);
}
 if ($rlt = mysqli_query($conn, "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=2 ORDER BY ID ")) {

    /* determine number of rows result set */
    $rw_ct = mysqli_num_rows($rlt);
    /* close result set */
    mysqli_free_result($rlt);
}
if ($rslt = mysqli_query($conn, "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND`request_condition`='DONE' ORDER BY ID ")) {

    /* determine number of rows result set */
    $row_count = mysqli_num_rows($rslt);
    /* close result set */
    mysqli_free_result($rslt);
}

/*close connection */
mysqli_close($conn);
$total= $row_cnt + $row_ct + $rw_ct + $row_count
?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"> <?php echo $total;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $total;?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="request_list.php">
                        <?php
                      if($row_cnt==0)
                      {

                      }
                      else
                      {
                      ?>
                      <i class="fa fa-university text-aqua"></i>You have <?php echo $row_cnt;?> Services Requests
                    <?php
                    }
                    ?>
                    </a>
                  </li>
                </ul>
                <ul class="menu">
                  <li>
                    <a href="executive_approved_requests.php">
                        <?php
                      if($row_count==0)
                      {
                      ?>
                      <i class="fa fa-university text-aqua"></i><?php echo $row_ct;?> Services Requests Accepted
                           <?php
                      }
                      else
                      {
                      ?>
                      <i class="fa fa-university text-aqua"></i><?php echo $row_ct;?> Services Requests Accepted
                           <?php
                    }
                    ?>
                    </a>
                  </li>
                </ul>
                <ul class="menu">
                  <li>
                    <a href="deniedrequests.php">
                      <i class="fa fa-university text-aqua"></i><?php echo $rw_ct;?> Services Requests Denied 
                    </a>
                  </li>
                </ul>
                <ul class="menu">
                  <li>
                    <a href="completed.php">
                      <?php
                      if($row_count==0)
                      {

                      }
                      else
                      {
                      ?>
                      <i class="fa fa-university text-aqua"></i><?php echo $row_count;?> Services Requests Completed 
                      <?php
                    }
                    ?>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
         
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php
			include('conn.php');
			  $login_session=$_SESSION['username'];
			  $query = "SELECT * FROM `user` WHERE first_name='$login_session'";
							$result = $conn->query($query);
							$rowcount = 0;
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									if ($rowcount == 0) {
									}
									?>
              <img src="uploads/<?php echo $row['photo']?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  
						<img src="uploads/<?php echo $row['photo']?>"  class="img-circle" alt="User Image">
						<?php
							}
							}
							?>
                <p>
				<?php
				
                 echo $_SESSION['username'];
				 	
			  $login_session=$_SESSION['username'];
			  $query = "SELECT * FROM `user` WHERE first_name='$login_session'";
							$result = $conn->query($query);
							$rowcount = 0;
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
                  $_SESSION["atype"]=$row["account_type"];
									if ($rowcount == 0) {
									}
									?>
				
				  
                  <small><?php echo $row['email']?></small><br/>
                  <small><a href="change_password.php">Change Password</small>
				  <?php
								}
							}
							?>
                </p>
              </li>
              
             
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-center">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
     </div>
    </nav>
  </header>