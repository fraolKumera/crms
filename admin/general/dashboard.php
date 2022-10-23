<style type="text/css">
    ol{
        padding: 0;
        list-style: none;
        background: #ffffff;
    }
    ol li{
        display: inline-block;
        position: relative;
        line-height: 21px;
        text-align: left;
    }
    ol li a{
        display: block;
        padding: 8px 25px;
        color: #4d88;
        text-decoration: none;
    }
    ol li a:hover{
        color: #ffffff;
        background: #999;
    }
    ol li ol.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ol li:hover ol.dropdown{
        display: block; /* Display the dropdown */
    }
    ol li ol.dropdown li{
        display: block;
    }
  h4
  {
    color:black; 
    font-family: Times New Roman;
  }
</style>
<?php
include('include/dbcon.php'); 
$user=$_SESSION['username'];
$sql1 = "SELECT * FROM user WHERE first_name='$user'" ;
$res = mysqli_query($conn,$sql1);
while($ro = mysqli_fetch_array($res)){
 
$acc_type=$ro['account_type'];
}
if($acc_type=="admin") { ?>

<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      
           <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php
			include('include/dbcon.php'); 
			$sql ="SELECT * FROM `account`";
			$query=mysqli_query($con,$sql);
			$totalData=mysqli_num_rows($query);
			?>
              <h3><?php echo $totalData; ?></h3>
              <p>Customer Registrations</p>
            </div>
            <div class="icon">
              <a href="register.php"><i class="ion ion-person-add"></i></a>
            </div>
            <a href="register.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<?php
			
			$sql1 ="SELECT * FROM `requests`";
			$query1=mysqli_query($con,$sql1);
			$totalData1=mysqli_num_rows($query1);
			?>
              <h3><?php echo $totalData1; ?></h3>

              <p>Request Service For A customer</p>
            </div>
            <div class="icon">
              <a href="request_ser.php"><i class="fa fa-question-circle"></i></a>
            </div>
            <a href="request_ser.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col --> 
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
             	<?php
			
			$sql2 ="SELECT * FROM `requests` WHERE support_desk_status=0";
			$query2=mysqli_query($con,$sql2);
			$totalData2=mysqli_num_rows($query2);
			?>
              <h3><?php echo $totalData2; ?></h3>

              <p>Service Request List</p>
            </div>
            <div class="icon">
             <a href="request_list.php"> <i class="fa fa-file-o"></i></a>
            </div>
            <a href="request_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
                 	<?php
			
			$sql3 ="SELECT * FROM `assigned_requests`";
			$query3=mysqli_query($con,$sql3);
			$totalData3=mysqli_num_rows($query3);
			?>
              <h3><?php echo $totalData3; ?></h3>

              <p>First Line officer's Aproved Service Request</p>
            </div>
            <div class="icon">
             <a href="first_line.php"> <i class="fa fa-file-o"></i></a>
            </div>
            <a href="first_line.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
			
			$sql4 ="SELECT * FROM `assigned_requests`  WHERE `executive_officer_status`=0";
			$query4=mysqli_query($con,$sql4);
			$totalData4=mysqli_num_rows($query4);
			?>
        <h3><?php echo $totalData4; ?></h3>

              <p>Assigned Service Requests</p>
            </div>
            <div class="icon">
              <a href="assined_requests.php"><i class="fa fa-folder-open"></i></a>
            </div>
            <a href="assined_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
			
			$sql5 ="SELECT * FROM `assigned_requests`";
			$query5=mysqli_query($con,$sql5);
			$totalData5=mysqli_num_rows($query5);
			?>
              <h3><?php echo $totalData5; ?></h3>

              <p>Second Line Officer's Service Request Status</p>
            </div>
            <div class="icon">
             <a href="first_line.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="first_line.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
 
        <!-- ./col --> 
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
            <?php
			  include('conn.php');
        $username=$_SESSION['username'];
        $user_query="SELECT * FROM user WHERE `first_name`='$username'";
        $user_result=$conn->query($user_query);
        while($userrow = $user_result->fetch_assoc()) {
          $user_department = $userrow['department'];
        }
        if($user_department=='Admin')
        {
          $sql6 = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`=''  ORDER BY Id  DESC";
        }
        else{
          $sql6 = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`='' and `department_name`='$user_department' ORDER BY Id  DESC ";
          }
			// $sql6 ="SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`='' ORDER BY Id  DESC";
			$query6=mysqli_query($con,$sql6);
			$totalData6=mysqli_num_rows($query6);
			?>
              <h3><?php echo $totalData6; ?></h3>

              <p>Executive Officer Approved Service Requests</p>
            </div>
            <div class="icon">
             <a href="executive_approved_requests.php"> <i class="fa fa-check-square"></i></a>
            </div>
            <a href="executive_approved_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col --> 
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
			
			$sql7 ="SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND `request_condition`= 'DONE' ";
			$query7=mysqli_query($con,$sql7);
			$totalData7=mysqli_num_rows($query7);
			?>
              <h3><?php echo $totalData7; ?></h3>

            <p>List of Completed Service Requests</p>
            </div>
            <div class="icon">
             <a href="completed.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="completed.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
			
			$sql8 ="SELECT * FROM `requests` WHERE support_desk_status=2";
			$query8=mysqli_query($con,$sql8);
			$totalData8=mysqli_num_rows($query8);
			?>
              <h3><?php echo $totalData8; ?></h3>

              <p>First Line Officer Denied Request List</p>
            </div>
            <div class="icon">
             <a href="denied_requests.php"> <i class="fa fa-minus-square"></i></a>
            </div>
            <a href="denied_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
			
			$sql9 ="SELECT * FROM `assigned_requests` WHERE executive_officer_status=2";
			$query9=mysqli_query($con,$sql9);
			$totalData9=mysqli_num_rows($query9);
			?>
              <h3><?php echo $totalData9; ?></h3>

            
              <p>Second Line Officer Denied Service Requests</p>
            </div>
            <div class="icon">
              <a href="alldenied_requests.php"><i class="fa fa-minus-square"></i></a>
            </div>
            <a href="alldenied_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
			
			$sql10 ="SELECT * FROM `departments`";
			$query10=mysqli_query($con,$sql10);
			$totalData10=mysqli_num_rows($query10);
			?>
              <h3><?php echo $totalData10; ?></h3>

              <p>Add Department</p>
            </div>
            <div class="icon">
              <a href="add_department.php"><i class="fa fa-plus-square-o"></i></a>
            </div>
            <a href="add_department.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
			
			$sql11 ="SELECT * FROM `service`";
			$query11=mysqli_query($con,$sql11);
			$totalData11=mysqli_num_rows($query11);
			?>
              <h3><?php echo $totalData11; ?></h3>

              <p>Add Service</p>
            </div>
            <div class="icon">
              <a href="add_service.php"><i class="fa fa-plus-square-o"></i></a>
            </div>
            <a href="add_service.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php
			include('include/dbcon.php'); 
			$sql ="SELECT * FROM `account`";
			$query=mysqli_query($con,$sql);
			$totalData=mysqli_num_rows($query);
			
			?>
             <?php
			
			$sql12 ="SELECT * FROM `user`";
			$query12=mysqli_query($con,$sql12);
			$totalData12=mysqli_num_rows($query12);
			?>
              <h3><?php echo $totalData12; ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <a href="user_register.php"><i class="ion ion-person-add"></i></a>
            </div>
            <a href="user_register.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      <!-- /.row -->
      <!-- Main row -->

          <!-- /.box -->

        </section>
        <?php
}
elseif($acc_type=="support_desk")
{
?>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<h3><?php echo "Support Desk" ?></h3>
     <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
<?php
include('include/dbcon.php'); 
$sql ="SELECT * FROM `account`";
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);
?>
        <h3><?php echo $totalData; ?></h3>
        <p>Customer Registrations</p>
      </div>
      <div class="icon">
        <a href="register.php"><i class="ion ion-person-add"></i></a>
      </div>
      <a href="register.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<?php
			
			$sql1 ="SELECT * FROM `requests`";
			$query1=mysqli_query($con,$sql1);
			$totalData1=mysqli_num_rows($query1);
			?>
              <h3><?php echo $totalData1; ?></h3>

              <p>Request Service For A customer</p>
            </div>
            <div class="icon">
              <a href="request_ser.php"><i class="fa fa-question-circle"></i></a>
            </div>
            <a href="request_ser.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
             	<?php
			
			$sql2 ="SELECT * FROM `requests` WHERE support_desk_status=0";
			$query2=mysqli_query($con,$sql2);
			$totalData2=mysqli_num_rows($query2);
			?>
              <h3><?php echo $totalData2; ?></h3>

              <p>Service Request List</p>
            </div>
            <div class="icon">
             <a href="request_list.php"> <i class="fa fa-file-o"></i></a>
            </div>
            <a href="request_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
                 	<?php
			
			$sql3 ="SELECT * FROM `assigned_requests`";
			$query3=mysqli_query($con,$sql3);
			$totalData3=mysqli_num_rows($query3);
			?>
              <h3><?php echo $totalData3; ?></h3>

              <p>First Line officer's Aproved Service Request</p>
            </div>
            <div class="icon">
             <a href="first_line.php"> <i class="fa fa-file-o"></i></a>
            </div>
            <a href="first_line.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
			
			$sql8 ="SELECT * FROM `requests` WHERE support_desk_status=2";
			$query8=mysqli_query($con,$sql8);
			$totalData8=mysqli_num_rows($query8);
			?>
              <h3><?php echo $totalData8; ?></h3>

              <p>First Line Officer Denied Request List</p>
            </div>
            <div class="icon">
             <a href="denied_requests.php"> <i class="fa fa-minus-square"></i></a>
            </div>
            <a href="denied_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
			$user=$_SESSION['username'];
      $sql1 = "SELECT * FROM user WHERE first_name='$user'" ;
      $res = mysqli_query($conn,$sql1);
      while($ro = mysqli_fetch_array($res)){
       
        $department=$ro['department'];
      }
			$sql7 ="SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND `request_condition`= 'DONE' AND `department_name`='$department'";
			$query7=mysqli_query($con,$sql7);
			$totalData7=mysqli_num_rows($query7);
			?>
              <h3><?php echo $totalData7; ?></h3>

            <p>List of Completed Service Requests</p>
            </div>
            <div class="icon">
             <a href="completed.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="completed.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>
</section
<?php
}
elseif($acc_type=="executive_officer")
{
?>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<h3><?php echo "Excutive Officer/Manager" ?></h3>
     <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
<?php
include('include/dbcon.php'); 
$sql ="SELECT * FROM `account`";
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);
?>
        <h3><?php echo $totalData; ?></h3>
        <p>Customer Registrations</p>
      </div>
      <div class="icon">
        <a href="register.php"><i class="ion ion-person-add"></i></a>
      </div>
      <a href="register.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<?php
			
			$sql1 ="SELECT * FROM `requests`";
			$query1=mysqli_query($con,$sql1);
			$totalData1=mysqli_num_rows($query1);
			?>
              <h3><?php echo $totalData1; ?></h3>

              <p>Request Service For A customer</p>
            </div>
            <div class="icon">
              <a href="request_ser.php"><i class="fa fa-question-circle"></i></a>
            </div>
            <a href="request_ser.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
			$user=$_SESSION['username'];
      $sql1 = "SELECT * FROM user WHERE first_name='$user'" ;
      $res = mysqli_query($conn,$sql1);
      while($ro = mysqli_fetch_array($res)){
       
        $department=$ro['department'];
      }
			$sql7 ="SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND `request_condition`= 'DONE' AND `department_name`='$department'";
			$query7=mysqli_query($con,$sql7);
			$totalData7=mysqli_num_rows($query7);
			?>
              <h3><?php echo $totalData7; ?></h3>

            <p>List of Completed Service Requests</p>
            </div>
            <div class="icon">
             <a href="completed.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="completed.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
            <?php
			
      include('conn.php');
      $username=$_SESSION['username'];
      $user_query="SELECT * FROM user WHERE `first_name`='$username'";
      $user_result=$conn->query($user_query);
      while($userrow = $user_result->fetch_assoc()) {
        $user_department = $userrow['department'];
      }
      if($user_department=='Admin')
      {
        $sql6 = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`=''  ORDER BY Id  DESC";
      }
      else{
        $sql6 = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`='' and `department_name`='$user_department' ORDER BY Id  DESC ";
        }
    // $sql6 ="SELECT * FROM `assigned_requests` WHERE `executive_officer_status`='1' and `request_condition`='' ORDER BY Id  DESC";
    $query6=mysqli_query($con,$sql6);
    $totalData6=mysqli_num_rows($query6);
			?>
              <h3><?php echo $totalData6; ?></h3>

              <p>Executive Officer Approved Service Requests</p>
            </div>
            <div class="icon">
             <a href="executive_approved_requests.php"> <i class="fa fa-check-square"></i></a>
            </div>
            <a href="executive_approved_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> 

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
			      include('conn.php');
            $username=$_SESSION['username'];
            $user_query="SELECT * FROM user WHERE `first_name`='$username'";
            $user_result=$conn->query($user_query);
            while($userrow = $user_result->fetch_assoc()) {
              $user_department = $userrow['department'];
            }
         
            $sql4 = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=0 && `department_name`='$user_department'";
            
			// $sql4 ="SELECT * FROM `assigned_requests`  WHERE `executive_officer_status`=0";
			$query4=mysqli_query($con,$sql4);
			$totalData4=mysqli_num_rows($query4);
			?>
        <h3><?php echo $totalData4; ?></h3>

              <p>Assigned Service Requests</p>
            </div>
            <div class="icon">
              <a href="assined_requests.php"><i class="fa fa-folder-open"></i></a>
            </div>
            <a href="assined_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
			include('conn.php');
      $username=$_SESSION['username'];
      $user_query="SELECT * FROM user WHERE `first_name`='$username'";
      $user_result=$conn->query($user_query);
      while($userrow = $user_result->fetch_assoc()) {
        $user_department = $userrow['department'];
      }
			$sql5 ="SELECT * FROM `assigned_requests` where `department_name`='$user_department'";
			$query5=mysqli_query($con,$sql5);
			$totalData5=mysqli_num_rows($query5);
			?>
              <h3><?php echo $totalData5; ?></h3>

              <p>Second Line Officer's Service Request Status</p>
            </div>
            <div class="icon">
             <a href="first_line.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="first_line.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
						include('conn.php');
            $username=$_SESSION['username'];
            $user_query="SELECT * FROM user WHERE `first_name`='$username'";
            $user_result=$conn->query($user_query);
            while($userrow = $user_result->fetch_assoc()) {
              $user_department = $userrow['department'];
            }
			$sql9 ="SELECT * FROM `assigned_requests` WHERE executive_officer_status=2 && `department_name`='$user_department'";
			$query9=mysqli_query($con,$sql9);
			$totalData9=mysqli_num_rows($query9);
			?>
              <h3><?php echo $totalData9; ?></h3>

            
              <p>Second Line Officer Denied Service Requests</p>
            </div>
            <div class="icon">
              <a href="alldenied_requests.php"><i class="fa fa-minus-square"></i></a>
            </div>
            <a href="alldenied_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>
</section
<?php

}
elseif($acc_type=="second_line_officer")
{
  ?>
  <section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
  <h3><?php echo "Second Line Officer" ?></h3>
  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php
			include('include/dbcon.php'); 
			$sql ="SELECT * FROM `account`";
			$query=mysqli_query($con,$sql);
			$totalData=mysqli_num_rows($query);
			?>
              <h3><?php echo $totalData; ?></h3>
              <p>Customer Registrations</p>
            </div>
            <div class="icon">
              <a href="register.php"><i class="ion ion-person-add"></i></a>
            </div>
            <a href="register.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<?php
			
			$sql1 ="SELECT * FROM `requests`";
			$query1=mysqli_query($con,$sql1);
			$totalData1=mysqli_num_rows($query1);
			?>
              <h3><?php echo $totalData1; ?></h3>

              <p>Request Service For A customer</p>
            </div>
            <div class="icon">
              <a href="request_ser.php"><i class="fa fa-question-circle"></i></a>
            </div>
            <a href="request_ser.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
      include('conn.php');
      $username=$_SESSION['username'];
      $user_query="SELECT * FROM user WHERE `first_name`='$username'";
      $user_result=$conn->query($user_query);
      while($userrow = $user_result->fetch_assoc()) {
        $user_department = $userrow['department'];
  
    
      $sql4 = "SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=0 && `department_name`='$user_department'";
      }
			$query4=mysqli_query($con,$sql4);
			$totalData4=mysqli_num_rows($query4);
			?>
        <h3><?php echo $totalData4; ?></h3>

              <p>Assigned Service Requests</p>
            </div>
            <div class="icon">
              <a href="assined_requests.php"><i class="fa fa-folder-open"></i></a>
            </div>
            <a href="assined_requests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
						include('conn.php');
            $username=$_SESSION['username'];
            $user_query="SELECT * FROM user WHERE `first_name`='$username'";
            $user_result=$conn->query($user_query);
            while($userrow = $user_result->fetch_assoc()) {
              $user_department = $userrow['department'];
            }
			$sql5 ="SELECT * FROM `assigned_requests` WHERE `department_name`='$user_department'";
			$query5=mysqli_query($con,$sql5);
			$totalData5=mysqli_num_rows($query5);
			?>
              <h3><?php echo $totalData5; ?></h3>

              <p>Second Line Officer's Service Request Status</p>
            </div>
            <div class="icon">
             <a href="first_line.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="first_line.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> 
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
			$user=$_SESSION['username'];
      $sql1 = "SELECT * FROM user WHERE first_name='$user'" ;
      $res = mysqli_query($conn,$sql1);
      while($ro = mysqli_fetch_array($res)){
       
        $department=$ro['department'];
      }
			$sql7 ="SELECT * FROM `assigned_requests` WHERE `executive_officer_status`=1 AND `request_condition`= 'DONE'  AND `department_name`='$department'";
			$query7=mysqli_query($con,$sql7);
			$totalData7=mysqli_num_rows($query7);
			?>
              <h3><?php echo $totalData7; ?></h3>

            <p>List of Completed Service Requests</p>
            </div>
            <div class="icon">
             <a href="completed.php"> <i class="fa fa-bars"></i></a>
            </div>
            <a href="completed.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
</div>
</section>
<?php
}
elseif($acc_type=="customer")
{
echo "customer";

}
?>