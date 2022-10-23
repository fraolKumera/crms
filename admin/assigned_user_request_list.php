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
                         <th>Officer Accepted Request</th>
                         <th>Execution Department</th>
                         <th>Request Status</th>       
                        </tr>
                      </thead>
                   </table>
              </div>
           </div>
        </div>
       <!-- /.box-footer -->
        
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
                    url:"fetch_exe_requests.php",
                    type:"post"
    }
   });
  }

         });
       </script>
    
    <!--script js for get edit data-->
    

  </body>
</html>



