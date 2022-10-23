<!DOCTYPE html>
<html>
<?php
session_start();
include('include/head.php');
include('include/header.php');
?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container" style="width: 100%">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
       <br/>
        
          <div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
               <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
            </button>
     <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>
</div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Service</li>
        </ol>
      </section>

    <!-- Main content -->
    <section class="content" >
      <form class="form-horizontal"  role="form" enctype="multipart/form-data"  method="post">
        <div class="row" >
            <div class="col-md-4" style="" >
            <!-- general form elements -->
            <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            include('include/dbcon.php');
            $result=mysqli_query($con,"SELECT * FROM `service`");
            $count=mysqli_num_rows($result);
            $ser=$count+1;
            $ser_id="Ser00".$ser;
            ?>
            <fieldset>
              <Legend style="text-align: center;">Service Entry</Legend>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Service Id</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="service_id" value="<?php echo $ser_id;?>" readonly >
                  </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Service Name</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="service_name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Department Name</label>

                  <div class="col-sm-7">
                    <select  id="service" class="form-control" name="department_name">
                                            <option>Select Department</option>
                                            <?php 
                                          
                            $sql="SELECT `d_name` FROM `departments`"; 
                            $result = mysqli_query($conn,$sql);

                                            while ($row=mysqli_fetch_array($result)) {
                                             echo '<option>'.$row["d_name"].'</option>';
                                            }
                                            ?>
                                            
                                         </select>
                  </div>
                </div> 
                                          
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Service Execution Day</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="process_time" placeholder="process time">
                  </div>
                </div>
                 <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">First Line Day</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="first_line" placeholder="First Line Officer Execution Time">
                  </div>
                </div>
                 <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Executive Day</label>

                  <div class="col-sm-7">
                   <input type="text" class="form-control" name="executive_officer" placeholder="Executive Officer Execution ay">
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- /.box-body -->
            <div  style="text-align: center;">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-success"  name="insert">Add</button>
            </div>
          <!-- /.box-footer -->
         </div>
       </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title"></h3>
                        </div>
                      <table id="cart_table" class="table table-bordered table-hover">
                       <thead>
                        <tr>
                         <th>Service Id</th>
                         <th>Service Name</th>    
                         <th>Department</th>    
                         <th>Total Process Time</th>
                         <th>1st Line Officer execution Day(s)</th>
                         <th>Executive Officer execution Day(s)</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                   </table>
                 
              </div>
              <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                          <div id="content-data"></div>
                          
                      </div>
                  </div>
              </div>
                   <!-- / Modal strat-->

          
                   <!-- / Modal -->   

           </div>
        </div>
       <!-- /.box-footer -->
       </form>
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


    
    <!--script js for get edit data-->
    <script>
      

   $(document).ready(function(){
                  var dataTable=$('#cart_table').DataTable({
                      "processing": true,
                      "serverSide":true,
                      "ajax":{
                          url:"fetch_service.php",
                          type:"post"
                      }
                  });
              });

         $(document).on('click','#getEdit',function(e){
             e.preventDefault();
              var per_id=$(this).data('id');
           
           $('#content-data').html('');
            $.ajax({
                 url:'edit_service.php',
               type:'POST',
                 data:'id='+per_id,
                 dataType:'html'
             }).done(function(data){
                 $('#content-data').html('');
                $('#content-data').html(data);
            }).fial(function(){
                $('#content-data').html('<p>Error</p>');
            });
           
         });

           $(document).on('click', '#getDelete', function(){
            var id=$(this).data('id');
            if(confirm("Are you sure you want to remove this?"))
            {
             $.ajax({
              url:'delete_service.php',
              method:'POST',
              data:{id:id},
              success:function(data){
               $('#hidden').html('<div class="alert alert-success">'+data+'</div>');
               $('#cart_table').DataTable().destroy();
               fetch_data();
              }
             });
             setInterval(function(){
              $('#hidden').html('');
             }, 5000);
            }
           });
          /*});*/



    </script>
</body>
</html>


<?php


if(isset($_POST['insert']))
{
  
  //$id=$_SESSION['id'];
 $Service_id=$_POST['service_id'];
 $service_name=$_POST['service_name'];
 $department_name=$_POST['department_name'];
 $Process_time=$_POST['process_time'];
 $first_line_officer_time=$_POST['first_line'];
 $executive_officer=$_POST['executive_officer'];
  $total=$first_line_officer_time+$executive_officer;
 if($total == $Process_time)
 {
 $sql="INSERT INTO `service` (`Service_id` , `Service_name` , `department_name` , `process_time` , `first_line_officer_execution_time` , `executive_officer_process_time`)VALUES('".$Service_id."' , '".$service_name."','".$department_name."' , '".$Process_time."' , '".$first_line_officer_time."' , '".$executive_officer."')";
 
                  if(mysqli_query($con,$sql))
                  {
                    echo  '<script>var div=document.getElementById("hidden");
                            div.style.visibility="visible";
                            div.style.display="block";
                            document.getElementById("notify").innerHTML="Successfully Updated !";</script>';
             echo '<script> setInterval(function(){ document.getElementById("hidden").style.display="none"; }, 4000);</script>';
                  }
                  else
                  {
                      echo mysqli_error($con);
                  }
}
else 
{
 echo  '<script>var div=document.getElementById("hidden");
                            div.style.visibility="visible";
                            div.style.display="block";
                            document.getElementById("notify").innerHTML="Total Procces time is no equal to the total officers process time!";</script>';
             echo '<script> setInterval(function(){ document.getElementById("hidden").style.display="none"; }, 4000);</script>';
}
}

  
       if(isset($_POST['update']))
         {
           

              $query="UPDATE `service` SET `Service_name`='$Service_name', `process_time`='$process_time', `first_line_officer_execution_time`='$first_line_officer_execution_time', executive_officer_process_time`='$executive_officer_process_time' WHERE `Service_id`='$Service_id'";

                  if(mysqli_query($con,$query))
                  {
                    echo  '<script>var div=document.getElementById("hidden");
                            div.style.visibility="visible";
                            div.style.display="block";
                            document.getElementById("notify").innerHTML="Successfully Updated !";</script>';
             echo '<script> setInterval(function(){ document.getElementById("hidden").style.display="none"; }, 4000);</script>';
                  }
                  else
                  {
                      echo mysqli_error($con);
                  }
         }
?>