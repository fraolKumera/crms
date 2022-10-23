<!DOCTYPE html>
<html>
<?php
session_start();
include('include/head.php');
?>


<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

 <?php include('include/header.php'); ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Service Request List
          <div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
              <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
            </button>
            <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>
        </div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Service Request List</li>
        </ol>
      </section>
      <section class="content-header pull-right">
      <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Submit New Request</a>
      </section><br><br>
      <!-- Main content -->
      <section class="content" >
          <div class="row" >
            <div class="">
             <!-- general form elements -->
                <div class="box box-primary">
                 
                       <table id="cart_table" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                         <th>Request ID</th>
                         <th>Service Type</th>
                         <th>Subject</th>
                         <th>Request Status</th>       
                         <th>Service Execution Takes</th>
                        </tr>
                      </thead>
                   </table>
              </div>
           </div>
        </div>
       <!-- /.box-footer -->
        <!-- /Form -->
              <section class="content" >
                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog" >
                    <div class="modal-content" style="width:700px;">
                        <div class="modal-header" style="background-color: #3c8dbc">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" style="color: #fff">Submit Service Request</h4>
                      </div><!-- /modal-header -->
                      <div class="box box-primary"> 
                        <div class="modal-body" style="background-color:#ecf0f5;">
                          <form method="POST" action="" id="form" style="display: block">
                           <div class="row">
                            <div class="col-md-12" >
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
                                <form method="POST" action="" id="form" style="display: block">
                                 <div class="row">
                                    <div class="col-xs-6">
                                     Your ID <input type="text" class="form-control" name="client_id" value="<?php echo $_SESSION['id'] ?>" readonly>
                                    </div>
                                  <div class="col-xs-6">
                                    <label>Select Service</label>
                                    <div class="form-group">
                                      <select  id="service" class="form-control" name="request_service" required>
                                        <option>Select Service</option>
                                            <?php
                                            include 'conn.php';
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
                                        <i class="fa fa-paperclip"></i> Attachment
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
                             <!-- /.col -->
                              <!-- /.col -->
                            </div>
                         </form>
                        </div>
                      </div>
                    </div>   
                  </div>
                </div>  
          </section>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include('include/footer.php') ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery/dist/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



 <script src="bower_components/jquery/dist/jquery.dataTables.min.js"></script>
             <!-- Datatable bootstrap -->
<script src="bower_components/jquery/dist/dataTables.bootstrap.min.js"></script>

  
<script type="text/javascript">

        
         

    $(document).ready(function(){

              fetch_data();

  function fetch_data()
  {
   var dataTable=$('#cart_table').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"fetch_request.php",
                    type:"post"
    }
   });
  }


         });</script>
    
    <!--script js for get edit data-->
    

  </body>
</html>
 <?php
 include('conn.php');
 $name=$_SESSION['username'];
 $sql3="SELECT * FROM `user` WHERE first_name='$name'";
 $result3 = mysqli_query($conn,$sql3);
 $row3 = mysqli_fetch_array($result3);
 echo $_SESSION['id']=$row3['ID'];

 if(isset($_POST['request']))
 {
  include('conn.php');


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
    $client_id=$_SESSION['id'];
    $request_service=$_POST['request_service'];
    $Subject=$_POST['Subject'];
    $attach=$_POST['attachment'];
    $process_time=$row["process_time"];
    $denial_res=0;
    $executive_officer=0;
    $request_detail=$_POST['request_detail'];
    $first_officer=$row['first_line_officer_execution_time'];
    //$second_officer=$row['second_line_officer_execution_time'];
    $exe_ofiicer=$row['executive_officer_process_time'];
   $date=date('Y-m-d h:m:s');
   $default=0;

$sql="INSERT INTO `requests` (request_id , sender_id , request_type  , subject , request_detail , support_desk_status , process_time , aattachement , denial_reason , executive_officer , first_line_officer_execution_time , executive_officer_process_time , executive_officer_status , overrided , ovd_manager , request_date) VALUES ('".$request_id."' , '".$client_id."' , '".$request_service."' , '".$Subject."' , '".$request_detail."' , '".$default."' , '".$process_time."' , '".$attach."' , '".$denial_res."' , '".$executive_officer."' , '".$first_officer."' , '".$exe_ofiicer."', '".$executive_officer."' , '".$executive_officer."' , '".$executive_officer."' , '".$date."')";
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
 }
}
   
}
?>


