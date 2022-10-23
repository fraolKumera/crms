<?php
//fetch.php
if(isset($_POST["post_id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "csr");
 $output = '';
 $query = "SELECT * FROM requests WHERE ID = '".$_POST["post_id"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
        $id=$row['ID'];
        $rid=$row['request_id'];
        $sid=$row['sender_id'];
        $rt=$row['request_type'];
        $ss=$row['support_desk_status'];
        $pt=$row['process_time'];
        $email=$row['email'];
        $p_o_box=$row['p_o_box'];
        $H_No=$row['H_No'];
        $emergency_contact_tel=$row['emergency_contact_tel'];
       

  $output .= '
 <i><form  class="form-horizontal" enctype="multipart/form-data" id="register_form" method="POST">
     <div class="row">
                            <div class="row">
                            <div class="col-xs-6">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">  
                                Request ID.:<input type="text" class="form-control" name="s_id" id="s_id" value="'.$rid.'" readonly> 
                            </div>
                            </div>
                            <div class="col-xs-4">
                                Setvice Type.:<input type="text" class="form-control" name="s_id" id="s_id" value="'.$rt.'" readonly> 
                            </div>
                            <div class="col-xs-4">
                                Request Status 
                                <input type="text" class="form-control" name="s_name" id="s_name" value="'.$ss.'" readonly> 
                                 </div>   
                            <div class="col-xs-4">
                                Service Execution Takes<input type="text" class="form-control" name="s_type" id="s_type" value="'.$pr.'" readonly>
                            </div> 
                          </div>
                          
                          </div>
                                                 
    </form></i>
  ';
  $query_1 = "SELECT * FROM requests WHERE ID < '".$_POST['post_id']."'";
  $result_1 = mysqli_query($connect, $query_1);
  $data_1 = mysqli_fetch_assoc($result_1);
  $query_2 = "SELECT * FROM requests WHERE ID > '".$_POST['post_id']."'";
  $result_2 = mysqli_query($connect, $query_2);
  $data_2 = mysqli_fetch_assoc($result_2);
  $if_previous_disable = '';
  $if_next_disable = '';
  if($data_1["ID"] == "")
  {
   $if_previous_disable = 'disabled';
  }
  if($data_2["ID"] == "")
  {
   $if_next_disable = 'disabled';
  }
  $output .= '
  <br /><br />
  <div align="center">
   <button type="button" name="previous1" class="btn btn-primary btn-sm previous" ID="'.$data_1["ID"].'" '.$if_previous_disable.'><i>Previous</i></button>
   <button type="button" name="next1" class="btn btn-primary btn-sm next" ID="'.$data_2["ID"].'" '.$if_next_disable.'><i>Next</i></button>
  </div>
  <br /><br />
  ';
 }
 echo $output;
}

?>

