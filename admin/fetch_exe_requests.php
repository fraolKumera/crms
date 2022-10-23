
<?php
session_start();
include('include/dbcon.php'); 
$name=$_SESSION['username'];
 $sql3="SELECT * FROM `user` WHERE first_name='$name'";
 $result3 = mysqli_query($con,$sql3);
 $row3 = mysqli_fetch_array($result3);
 $sender_id=$row3['ID'];
$request=$_REQUEST;
$col =array(  

    0  =>  'ID',   
    1  =>  'request_type',   
    3  =>  'department_name',
    4  =>  'request_id', 
    5  =>  'request_subject', 
    6  =>  'request_detail', 
    7  =>  'sender_id', 
    8  =>  'process_time', 
    9  =>  'support_desk_name', 
    10 =>  'executive_officer_name', 
    11 =>  'first_line_officer_execution_time', 
    12 =>  'executive_officer_process_time', 
    13 =>  'attachement', 
    14 =>  'date', 
    15 =>  'denial_reason', 
    16 =>  'executive_officer_status', 
    17 =>  'process_time_left', 
    18 =>  'overrided', 
    19 =>  'ovd_mgr', 
    20 =>  'request_condition', 
  
    
);  //create column like table in database

$sql ="SELECT * FROM `assigned_requests` WHERE `sender_id` ='$sender_id'";
 
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
// $sql ="SELECT * FROM `requests` WHERE `sender_id`='$sender_id' AND 1=1";
// if(!empty($request['search']['value']))
// {
//     $sql.=" AND (ID Like '".$request['search']['value']."%' "; 
//     $sql.=" OR request_type Like '".$request['search']['value']."%' ";    
//     $sql.=" OR sender_id Like '".$request['search']['value']."%' ";    
//     $sql.=" OR request_id Like '".$request['search']['value']."%' ";   

//     $sql.=" OR process_time Like '".$request['search']['value']."%' )";
    
// }
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query))
{
   

    $subdata=array();
    $subdata[]=$row[3]; //supplier_id
    $subdata[]=$row[1]; //supplier_id
    $subdata[]=$row[4]; //supplier_name
    $subdata[]=$row[8]; //supplier_name
    $subdata[]=$row[2]; //supplier_name
   if ($row['executive_officer_status'] == 0)
           {
            $subdata[]= 'Pending';
           }
           else if ($row['executive_officer_status'] == 1 AND $row['request_condition']=='') 
           {
            $subdata[]= 'InProgress';
           }
           else if ($row['executive_officer_status'] == 1 AND $row['request_condition']=='DONE') 
           {
            $subdata[]= 'Completed';
           }
            else if ($row[17] == 2) 
            {
             $subdata[]= 'Denied';
           }
           //supplier-type

  



 
 //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    

    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>

