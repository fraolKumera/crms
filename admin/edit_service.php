<?php 
session_start();
include('include/dbcon.php');
    // Create connection

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    
    $sql="SELECT * FROM service WHERE ID=$id";

    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $id=$row['ID'];
        $Service_id=$row['Service_id'];
        $Service_name=$row['Service_name'];
        $process_time=$row['process_time'];
        $first_line_officer_execution_time=$row['first_line_officer_execution_time'];
        $executive_officer_process_time=$row['executive_officer_process_time'];
       
    }         
    //end while
    //var_dump($run_sql);
    ?>
   
         <div  class="modal-content" style="width:700px;">
              <div class="modal-header" style="background-color: #3c8dbc">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #fff"> Information</h4>
            </div>
             <div class="box box-primary"> 
                 <div class="modal-body" >
                    <form  class="form-horizontal" enctype="multipart/form-data" id="register_form" method="POST">
                        <div class="row">
                            <div class="col-xs-4">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                               Service ID:<input type="text" class="form-control" name="Service_id" id="Service_id" value="<?php echo $Service_id;?>" readonly> 
                            </div>
                            <div class="col-xs-4">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                                Service Name :<input type="text" class="form-control" name="Service_name" id="Service_name" value="<?php echo $Service_name;?>"> 
                            </div> 
                      
                               <div class="col-xs-4">
                                Total Process Time:<input type="text" class="form-control" name="process_time" id="process_time" value="<?php echo $process_time;?>" >
                            </div>                                 
                          </div>  
                          <div class="row"> 
                            <div class="col-xs-4">
                               First Line Officer's Execution <br>Time<input type="text" class="form-control" name="first_line_officer_execution_time" id="first_line_officer_execution_time" value="<?php echo $first_line_officer_execution_time;?>" >
                            </div>
                               <div class="col-xs-4">
                                Executive Officer's Process <br>Time<input type="number" class="form-control" name="executive_officer_process_time" id="executive_officer_process_time" value="<?php echo $executive_officer_process_time;?>" >
                            </div>                                 
                              </div>  
                          <div class="modal-footer" style="margin-top: 0px">
                            <button type="submit" class="btn btn-success" name="Edit">Save</button>                           
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                          </div>                          
                       </form>
                   </div>
                </div>
              </div>
            
  
<?php
}//end if ?>

