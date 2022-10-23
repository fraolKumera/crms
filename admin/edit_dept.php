<?php 
session_start();
include('include/dbcon.php');
    // Create connection

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    
    $sql="SELECT * FROM departments WHERE id=$id";

    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $id=$row['id'];
        $d_id=$row['d_id'];
        $d_name=$row['d_name'];
       
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
                            <div class="col-xs-6">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                               Department ID:<input type="text" class="form-control" name="d_id" id="d_id" value="<?php echo $d_id;?>" readonly> 
                            </div>
                            <div class="col-xs-6">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                                Department Name :<input type="text" class="form-control" name="d_name" id="d_name" value="<?php echo $d_name;?>"> 
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

