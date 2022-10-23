<?php
//fetch.php
if(isset($_POST["ID"]))
{
 $connect = mysqli_connect("localhost", "root", "", "crs");
 $output = '';
 $query = "SELECT * FROM assigned_requests WHERE ID = '".$_POST["ID"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <p><label>Request Id :- '.$row["request_id"].'</label></p>
  <p><label>Request Id :- '.$row["request_type"].'</label></p>
  <p><label>Sender Id :- '.$row["sender_id"].'</label></p>
  <p><label> Request Type :- '.$row["request_subject"].'</label></p>
  <p><label> Request Type :- '.$row["request_detail"].'</label></p>
  <p><label> Request Type :- '.$row["department_name"].'</label></p>
  <p><label> Subject :- '.$row["process_time"].'</label></p>
  <p><label> Subject :- '.$row["date"].'</label></p>
  <p><label>Request Detail:- '.$row["request_condition"].'</label></p>
  ';
  $query_1 = "SELECT ID FROM requests WHERE ID < '".$_POST['ID']."' ORDER BY ID DESC LIMIT 1";
  $result_1 = mysqli_query($connect, $query_1);
  $data_1 = mysqli_fetch_assoc($result_1);
  $query_2 = "SELECT ID FROM requests WHERE ID > '".$_POST['ID']."' ORDER BY ID ASC LIMIT 1";
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
   <button type="button" name="previous" class="btn btn-warning btn-sm previous" ID="'.$data_1["ID"].'" '.$if_previous_disable.'>Previous</button>
   <button type="button" name="next" class="btn btn-warning btn-sm next" ID="'.$data_2["ID"].'" '.$if_next_disable.'>Next</button>
  </div>
  <br /><br />
  ';
 }
 echo $output;
}

?>