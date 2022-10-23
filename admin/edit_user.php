<?php 
session_start();
include('include/dbcon.php');
    // Create connection

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    
    $sql="SELECT * FROM account WHERE ID=$id";

    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $id=$row['ID'];
        $first_name=$row['first_name'];
        $middle_name=$row['middle_name'];
        $last_name=$row['last_name'];
        $DOB=$row['DOB'];
        $current_city_region=$row['current_city_region'];
        $email=$row['email'];
        $p_o_box=$row['p_o_box'];
        $H_no=$row['H_No'];
        $emergency_contact_tel=$row['emergency_contact_tel'];
        
    }         
    //end while
    //var_dump($run_sql);
    ?>
   
         <div  class="modal-content" style="width:700px;">
              <div class="modal-header" style="background-color: #3c8dbc">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #fff">User Information</h4>
            </div>
             <div class="box box-primary"> 
                 <div class="modal-body" >
                    <form  class="form-horizontal" enctype="multipart/form-data" id="register_form" method="POST">
                        <div class="row">
                            <div class="col-xs-6">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                                User ID:<input type="text" class="form-control" name="id" id="id" value="<?php echo $id;?>" readonly> 
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-4">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                                First Name :<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name;?>"> 
                            </div>
                            <div class="col-xs-4">
                                Middle Name<input type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo $middle_name;?>" >
                            </div> 
                            <div class="col-xs-4">
                                Last Name<input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name;?>" >
                            </div>
                          </div>  
                          <div class="row"> 
                            <div class="col-xs-4">
                                DOB<input type="text" class="form-control" name="DOB" id="DOB" value="<?php echo $DOB;?>" >
                            </div> 
                            <div class="col-xs-4">
                               Email<input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>" >
                            </div>
                            <div class="col-xs-4">
                               House No.<input type="text" class="form-control" name="H_no" id="H_no" value="<?php echo $H_no;?>" >
                            </div>
                          </div>
                          <div class="row"> 
                            <div class="col-xs-4">
                                Current City<input type="text" class="form-control" name="current_city_region" id="current_city_region" value="<?php echo $current_city_region;?>" >
                            </div> 
                            <div class="col-xs-4">
                               P.O.Box<input type="text" class="form-control" name="p_o_box" id="p_o_box" value="<?php echo $p_o_box;?>" >
                            </div>
                            <div class="col-xs-4">
                               Emergency Contact No.<input type="number" class="form-control" name="emergency_contact_tel" id="emergency_contact_tel" value="<?php echo $emergency_contact_tel;?>" >
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

