<?php
//fetch.php
if(isset($_POST["post_id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "csr");
 $output = '';
 $query = "SELECT * FROM account WHERE ID = '".$_POST["post_id"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
        $id=$row['ID'];
        $first_name=$row['first_name'];
        $middle_name=$row['middle_name'];
        $last_name=$row['last_name'];
        $DOB=$row['DOB'];
        $current_city_region=$row['current_city_region'];
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
                                User ID.:<input type="text" class="form-control" name="s_id" id="s_id" value="'.$id.'" readonly> 
                            </div>
                            </div>
                            <div class="col-xs-4">
                                First Name.:<input type="text" class="form-control" name="s_id" id="s_id" value="'.$first_name.'" readonly> 
                            </div>
                            <div class="col-xs-4">
                                Middle Name 
                                <input type="text" class="form-control" name="s_name" id="s_name" value="'.$middle_name.'" readonly> 
                                 </div>   
                            <div class="col-xs-4">
                                Last Name<input type="text" class="form-control" name="s_type" id="s_type" value="'.$last_name.'" readonly>
                            </div> 
                          </div>
                          <div class="row"> 
                            <div class="col-xs-4">
                                DOB<input type="text" class="form-control" name="acc_no" id="acc_no" value="'.$DOB.'" readonly> 
                            </div>  
                            <div class="col-xs-4">
                               Current City<input type="text" class="form-control" name="mail" id="mail" value="'.$current_city_region.'" readonly> 
                            </div>                               
                            <div class="col-xs-4">
                               Email<input type="text" class="form-control" name="phno1" id="phno1" value="'.$email.'" readonly>
                            </div>
                            </div> 
                          <div class="row"> 
                            <div class="col-xs-4">
                              P.O.Box
                                 <input type="text" class="form-control" name="phn2" id="phn2" value="'.$p_o_box.'" readonly>
                            </div>
                            <div class="col-xs-4">
                               House No.<input type="text" class="form-control" name="fax" id="fax" value="'.$H_No.'" readonly>
                            </div>
                            <div class="col-xs-4">
                               Emergency Contact No.<input type="text" class="form-control" name="web" id="web" value="'.$emergency_contact_tel.'" readonly>
                            </div>
                          </div>
                                                 
    </form></i>
  ';
  $query_1 = "SELECT * FROM account WHERE ID < '".$_POST['post_id']."'";
  $result_1 = mysqli_query($connect, $query_1);
  $data_1 = mysqli_fetch_assoc($result_1);
  $query_2 = "SELECT * FROM account WHERE ID > '".$_POST['post_id']."'";
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

