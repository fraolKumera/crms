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
        User Information
          <div id="hidden" style="visibility: hidden; display: none;" class="alert alert-info fade in">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
              <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' aria-hidden="true">&times;</span>
            </button>
            <h4><i class="fa fa-info"></i>  <strong id="notify" style="font-size: 22px"></strong> </h4>
        </div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">User Information</li>
        </ol>
      </section>
      <section class="content-header pull-right">
      <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Add System User</a>
      </section><br><br>
      <!-- Main content -->
      <section class="content" >
          <div class="row" >
            <div class="">
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <div class="icon" style="color:#23527c; font-size: 100px">
                       <a href="#"> <i class="ion ion-person-add"></i></a>
                      </div>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Register a User for a system<br>
                       Edit and View User Information<br>
                       <a data-toggle="modal" data-target="#modal-default"> Let's Get Started..</a>
                        </b><br></h3></center> 
                      </div>
					  
                       <table id="cart_table" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                         <th>User ID</th>
                         <th>First Name</th>
                         <th>Last Name</th>       
                         <th>Email</th>
                         <!-- <th>Active</th> -->
                         <th>Reg. Date</th>
                         <th>User Level</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                   </table>
                   <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                          <div id="content-data"></div>
                      </div>
                  </div>
                   <div id="post_modal" class="modal fade">
                     <div class="modal-dialog">
                      <div class="modal-content"> 
                       <div class="modal-header" style="background-color: #3c8dbc">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" style="color: #fff"><i>User Information</i></h4>
                        </div>
                        <div class="box box-primary"> 
                         <div class="modal-body" id="post_detail">
                         </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                       </div>
                      </div>
                   </div>
                </div>
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
                          <h4 class="modal-title" style="color: #fff">Rgister User</h4>
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
                                    <span class="username"><a href="#">Fill User Information</a></span>
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
                                   First Name<input type="text" class="form-control" name="First_Name" id="first_Name" placeholder="First Name" required>
                                   </div> 
                                  <div class="col-xs-6">
                                     Last Name<input type="text" class="form-control" name="Last_Name" id="last_Name" placeholder="Last Name" required>
                                  </div>
                                  </div><br>  
                                  <div class="row">    
                                    <div class="col-xs-6">
                                       Email<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div> 
                                    <div class="col-xs-6">
                                       Password<input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                                    </div>
                                  </div><br>
                                  <div class="row"> 
                                   <div class="col-xs-6">
                                   Active/Inactive
                                      <select class="form-control" name="active">
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                      </select>
                                       <!-- User Level<input type="text" class="form-control" name="userLevel" id="userLevel" placeholder="User Level" required> -->
                                    </div>
                                    <div class="col-xs-6">
                                  Department<select class="form-control" name="department">
                                            <?php
                                            include('include/dbcon.php'); 
                                            $sql ="SELECT * FROM `departments`";
                                            $query=mysqli_query($con,$sql);
                                            while ($row = mysqli_fetch_assoc($query))  
                                            {
                                            ?>
                                        <option value="<?php echo $row['d_name'];?>"><?php echo $row['d_name'];?><option>
                                            <?php
                                            }
                                            ?>
                                      </select>
                                  </div><br>
                                  <div class="col-xs-12">
                                  Account Type<select class="form-control" name="account_type">
                                            
                                        <option value="support_desk">Support Desk<option>
                                        <option value="second_line_officer">Second line officer<option>
                                        <option value="executive_officer">Manager/Excutive officer<option>
                                        <option value="admin">Admin<option>
                                        <option value="customer">customer<option>
                                      </select>
                                  </div><br/>

                            
                               <br/><br/><br/>
                                  <div class="modal-footer">
                                    <button id="add"  name="user_Register" class="btn btn-primary" type="submit">Register</button>
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
                    url:"fetch_system_user.php",
                    type:"post"
    }
   });
  }

        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'edit_user.php',
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

              $(document).ready(function(){
             
             function fetch_post_data(post_id)
             {
              $.ajax({
               url:"view_user.php",
               method:"POST",
               data:{post_id:post_id},
               success:function(data)
               {
                $('#post_modal').modal('show');
                $('#post_detail').html(data);
               }
              });
             }

             $(document).on('click', '.view', function(){
              var post_id = $(this).attr("id");
              fetch_post_data(post_id);
             });

             $(document).on('click', '.previous', function(){
              var post_id = $(this).attr("id");
              fetch_post_data(post_id);
             });

             $(document).on('click', '.next', function(){
              var post_id = $(this).attr("id");
              fetch_post_data(post_id);
             });
             
            });

          $(document).on('click', '#getDelete', function(){
           var id=$(this).data('id');
           if(confirm("Are you sure you want to remove this Account?"))
           {
            $.ajax({
             url:'delete_user.php',
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
         });</script>
    
    <!--script js for get edit data-->
    

  </body>
</html>
<?php
         include('include/dbcon.php');
          if(isset($_POST['user_Register']))
          {
            $First_Name=$_POST['First_Name'];
            $Last_Name=$_POST['Last_Name'];
            $Email=$_POST['email'];
            $password=$_POST['password'];
            $photo='Avatar.jpg';
            // $userLevel=$_POST['userLevel'];
            $active=$_POST['active'];
            // $registration_Date=$_POST['registration_Date'];
            $account_type=$_POST['account_type'];
            $department=$_POST['department'];
            $pass=md5($password);
            $query="INSERT INTO `user` (`first_name`, `last_name`, `email`, `password` , `photo`, `user_level` , `Active` , `account_type` , `department`) VALUES ('".$First_Name."' , '".$Last_Name."' , '".$Email."' , '".$pass."' , 'avatar2.png' , '0' , '".$active."' , '".$account_type."' , '".$department."')";
           if ($con->query($query)===TRUE)
                 {
                   
                            
                         ?><script>alert('User Registered Successfully');</script><?php
                        
                }
                else
                {
                  echo mysqli_error($con);
                }
          
        } 
  
          



          if(isset($_POST['Edit']))
       {
       $date=date('Y-m-d h:i:s');

            $sqlupdate=sprintf("UPDATE `account` SET `first_name`='".$_POST['first_name']."', `middle_name`='".$_POST['middle_name']."', `last_name`='".$_POST['last_name']."', `DOB`='".$_POST['DOB']."', `email`='".$_POST['email']."', `H_no`='".$_POST['H_No']."', `current_city_region`='".$_POST['current_city_region']."', `p_o_box`='".$_POST['p_o_box']."', `emergency_contact_tel`='".$_POST['emergency_contact_tel']."', `updated_date`='$date' WHERE `ID`='".$_POST['id']."' ");
          
                         
          if(mysqli_query($con,$sqlupdate))
          {
             echo '<script>var div=document.getElementById("hidden");
                            div.style.visibility="visible";
                            div.style.display="block";
                            document.getElementById("notify").innerHTML="User Information Successfully Updated !";</script>';
             echo '<script> setInterval(function(){ document.getElementById("hidden").style.display="none"; }, 4000);</script>';

          }
          else
          {
              echo mysqli_error($con);
          }
       }

?>



