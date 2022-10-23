
<?php
include('include/dbcon.php'); 
$request=$_REQUEST;
$col =array(  
    0  =>  'id',
    1  =>  'd_id',   
    2  =>  'd_name',   
  

  
    
);  //create column like table in database

$sql ="SELECT * FROM `departments`";
 
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM `departments` WHERE 1=1";
if(!empty($request['search']['value']))
{
    $sql.=" OR d_id Like '".$request['search']['value']."%' ";       
    $sql.=" OR d_name Like '".$request['search']['value']."%' )";
    
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

