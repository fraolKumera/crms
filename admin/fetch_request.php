
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
    1  =>  'request_id',   
    2  =>  'sender_id',
    3  =>  'request_type',
    4  =>  'subject', 
    5  =>  'request_detail', 
    6  =>  'support_desk_status', 
    7  =>  'process_time', 
    8  =>  'aattachement', 
    9  =>  'denial_reason', 
    10 =>  'executive_officer', 
    11 =>  'first_line_officer_execution_time', 
    12 =>  'second_line_officer_execution_time', 
    13 =>  'executive_officer_process_time', 
    14 =>  'executive_officer_status', 
    15 =>  'overrided', 
    16 =>  'ovd_manager', 
    17 =>  'request_date', 
  
    
);  //create column like table in database

$sql ="SELECT * FROM `requests` WHERE `sender_id` ='$sender_id'";
 
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM `requests` WHERE `sender_id`='$sender_id' AND 1=1";
if(!empty($request['search']['value']))
{
    $sql.=" AND (ID Like '".$request['search']['value']."%' "; 
    $sql.=" OR request_id Like '".$request['search']['value']."%' ";    
    $sql.=" OR sender_id Like '".$request['search']['value']."%' ";    
    $sql.=" OR request_type Like '".$request['search']['value']."%' ";   
    $sql.=" OR subject Like '".$request['search']['value']."%' ";   
    $sql.=" OR request_detail Like '".$request['search']['value']."%' ";    
    $sql.=" OR support_desk_status Like '".$request['search']['value']."%' ";
    $sql.=" OR process_time Like '".$request['search']['value']."%' ";
    $sql.=" OR aattachement Like '".$request['search']['value']."%' ";
    $sql.=" OR denial_reason Like '".$request['search']['value']."%' ";
    $sql.=" OR executive_officer Like '".$request['search']['value']."%' ";
    $sql.=" OR first_line_officer_execution_time Like '".$request['search']['value']."%' ";
    $sql.=" OR executive_officer_status Like '".$request['search']['value']."%' ";
    $sql.=" OR overrided Like '".$request['search']['value']."%' ";
    $sql.=" OR ovd_manager Like '".$request['search']['value']."%' ";
    $sql.=" OR request_date Like '".$request['search']['value']."%' )";
    
}
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
    $subdata[]=$row[1]; //supplier_id
    $subdata[]=$row[3]; //supplier_id
    $subdata[]=$row[4]; //supplier_name
   if ($row[6] == 0)
           {
            $subdata[]= 'Pending';
           }
           else if ($row[6] == 1) 
           {
            $subdata[]= 'InProgress';
           }
            else if ($row[6] == 2) 
            {
             $subdata[]= 'Denied';
           }
           //supplier-type
    $subdata[]=$row[7] .' '.'Days';//account_no
  



 
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

