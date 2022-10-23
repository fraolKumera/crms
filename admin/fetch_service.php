
<?php
include('include/dbcon.php'); 
$request=$_REQUEST;
$col =array(  
    0  =>  'id',
    1  =>  'Service_id',   
    2  =>  'Service_name',   
    3  =>  'department_name',
    4  =>  'process_time', 
    5  =>  'first_line_officer_execution_time',  
    6  =>  'executive_officer_process_time', 

  
    
);  //create column like table in database

$sql ="SELECT * FROM `service`";
 
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM `service` WHERE 1=1";
if(!empty($request['search']['value']))
{
    $sql.=" AND (id Like '".$request['search']['value']."%' "; 
    $sql.=" OR Service_id Like '".$request['search']['value']."%' ";    
    $sql.=" OR Service_name Like '".$request['search']['value']."%' ";    
    $sql.=" OR department_name Like '".$request['search']['value']."%' ";     
    $sql.=" OR process_time Like '".$request['search']['value']."%' ";    
    $sql.=" OR first_line_officer_execution_time Like '".$request['search']['value']."%' ";
    $sql.=" OR executive_officer_process_time Like '".$request['search']['value']."%' )";
    
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
    $subdata[]=$row[1]; 
    $subdata[]=$row[2]; 
    $subdata[]=$row[3]; 
    $subdata[]=$row[4];    
    $subdata[]=$row[5];   
    $subdata[]=$row[6];   
  



 //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
      $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><span class="glyphicon glyphicon-edit"></span></button>
   
                <button type="button" id="getDelete" class="btn btn-danger btn-xs" data-id="'.$row[0].'"><span class="fa  fa-times-circle"></span></button>';

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

