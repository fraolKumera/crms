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
      <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Add Service User</a>
      </section><br><br>
      <!-- Main content -->
      <section class="content" >
          <div class="row" >
            <div class="" >
             <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <center>
                      <div class="icon" style="color:#23527c; font-size: 100px">
                       <a href="#"> <i class="ion ion-person-add"></i></a>
                      </div>
                      <h3 class="box-title" style="font-style: italic;font-family: 'centure'; color: #264d7e;">
                      <b>Register a User for a Service<br>
                       Edit and View User Information<br>
                       <a data-toggle="modal" data-target="#modal-default"> Let's Get Started..</a>
                        </b><br></h3></center> 
                      </div>
                       <table id="cart_table" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                         <th>User ID</th>
                         <th>First Name</th>
                         <th>Middle Name</th>       
                         <th>Last Name</th>
                         <th>DOB</th>
                         <th>Hou.No</th>
                         <th>Email</th>
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
                          <h4 class="modal-title" style="color: #fff">Rgister Customer</h4>
                      </div><!-- /modal-header -->
                      <div class="box box-primary"> 
                        <div class="modal-body" style="background-color:#ecf0f5;">
                          <form method="POST" action="" id="form" style="display: block">
                           <div class="row">
                            <div class="col-md-8" >
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
                                  <div class="col-xs-12">
                                    <label>Search Your ID</label>
                                    <div class="form-group">
                                      <input type="text" id="search-box" class="form-control" name="ID" placeholder="Customer ID" />
                                      <div id="suggesstion-box"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-xs-6">
                                   First Name<input type="text" class="form-control" name="First_Name" id="first_Name" placeholder="First Name" required>
                                   </div> 
                                  <div class="col-xs-6">
                                     Middel Name<input type="text" class="form-control" name="Middle_Name" id="Middle Name" placeholder="Middle Name" required>
                                  </div>
                                  </div><br>  
                                  <div class="row">    
                                    <div class="col-xs-6">
                                       Last Name<input type="text" class="form-control" name="Last_Name" id="Last Name" placeholder="Last Name" required>
                                    </div> 
                                    <div class="col-xs-6">
                                       Email<input type="email" class="form-control" name="Email" id="Email" placeholder="Email" required>
                                    </div>
                                  </div><br>
                                  <div class="row"> 
                                    <div class="col-xs-6">
                                       Contact No1.<input type="text" class="form-control" name="phone1" id="phone1" placeholder="phone" required>
                                    </div>
                                    <div class="col-xs-6">
                                       Contact No2.<input type="text" class="form-control" name="phone2" id="phone2" placeholder="phone" required>
                                    </div>
                                  </div><br>
                                  <div class="modal-footer">
                                    <button id="add"  name="Register" class="btn btn-primary" type="submit">Register</button>
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                  </div>
                                </form>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                             <!-- /.col -->
                              <div class="col-md-4">
                                <!-- Box Comment -->
                                <div class="box box-widget">
                                  <div class="box-header with-border">
                                    <div class="user-block">
                                      <span class="username"><a href="#">Service Registration Information</a></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="box-tools">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                      </button>
                                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <!-- /.box-tools -->
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body"> 
                                  <!-- post text -->
                                  <p>Customer must be registered to use the Service Request System and the Customer ID must be the Account Number or Customer Number of the customer given by the Bank.</b></p>

                                  <p>After registration the Customers password will be sent by SMS and the customer must change password Immediately for account security purpose.</p>
                                </div>
                                <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                              </div>
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
                    url:"fetch_user.php",
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
          if(isset($_POST['Register']))
          {
            
            $ID=$_POST['ID'];
            $First_Name=$_POST['First_Name'];
            $Middle_Name=$_POST['Middle_Name'];
            $Last_Name=$_POST['Last_Name'];
            $Email=$_POST['Email'];
            //$phone=$_POST['phone'];
           $sql = "SELECT * FROM clients WHERE first_name = '$First_Name' and ID = '$ID'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             
          $count = mysqli_num_rows($result);
          
          // If result matched $myusername and $mypassword, table row must be 1 row
          
          if($count == 1) {  
      
   $ID=$row['ID'];
   $f_name=$row['first_name'];
   $m_name=$row['middle_name'];
   $l_name=$row['last_name'];
   $gender=$row['sex'];
   $image=$row['image'];
   $dob=$row['DOB'];
   $place_o_b=$row['place_of_birth'];
   $current_city=$row['current_city_region'];
   $k_ketema_wereda=$row['k_ketema_woreda'];
   $kebele=$row['kebele'];
   $h_no=$row['H_No'];
   $tel=$row['tel'];
   $email=$row['email'];
   $p_o_box=$row['p_o_box'];
   $eme_con_name=$row['emergency_contact_name'];
   $eme_con_city=$row['emergency_contact_city'];
   $eme_con_k_ketema_wereda=$row['emergency_contact_k_ketema_woreda'];
   $eme_con_kebele=$row['emergency_contact_kebele'];
   $eme_con_h_no=$row['emergency_contact_h_no'];
   $eme_con_tel=$row['emergency_contact_tel'];
   $pass='202cb962ac59075b964b07152d234b70';
   $today=date('Y-m-d');
          $query1="INSERT INTO `account` (`ID`, `first_name`, `middle_name`, `last_name`, `sex`, `image`, `DOB`, `place_of_birth`, `current_city_region`, `k_ketema_woreda`, `kebele`, `H_No`, `tel`, `email`, `p_o_box`, `emergency_contact_name`, `emergency_contact_city`, `emergency_contact_k_ketema_woreda`, `emergency_contact_kebele`, `emergency_contact_h_no`, `emergency_contact_tel`, `date`) VALUES ('".$ID."' , '".$f_name."' , '".$m_name."' , '".$l_name."' , '".$gender."' , '".$image."' , '".$dob."' , '".$place_o_b."' , '".$current_city."' , '".$k_ketema_wereda."' , '".$kebele."' , '".$h_no."' , '".$tel."' , '".$email."' , '".$p_o_box."' , '".$eme_con_name."' , '".$eme_con_city."' , '".$eme_con_k_ketema_wereda."' , '".$eme_con_kebele."' , '".$eme_con_h_no."' , '".$eme_con_tel."' , '".$today."')";
          $query="INSERT INTO `user` (`ID`, `first_name`, `last_name`, `email`, `password` , `photo`, `user_level` , `Active` , `registration_date` , `account_type` ) VALUES ('".$ID."' , '".$f_name."' , '".$l_name."' , '".$email."' , '".$pass."' , 'avatar2.png' , '0' , '' ,'".$today."' , 'customer')";
           if ($con->query($query1)===TRUE and $con->query($query)===TRUE)
                 {
                   
                            
                         ?><script>alert('Registered Successfully');</script><?php
                        
                }
                else
                {
                  echo mysqli_error($con);
                }
          
        } 
        else 
        {
            {
                  echo '<script>var div=document.getElementById("hidden");
                            div.style.visibility="visible";
                            div.style.display="block";
                            div.className="alert alert-danger fade in";
                            document.getElementById("notify").innerHTML=" You Data is not Available in the Database !";</script>';
                    echo '<script> setInterval(function(){ document.getElementById("hidden").style.display="none"; }, 4000);</script>';
                }
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



