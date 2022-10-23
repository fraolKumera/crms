
<?php
include('include/dbcon.php'); 
$request=$_REQUEST;
$col =array(  

    0  =>  'ID',   
    1  =>  'first_name',   
    2  =>  'middle_name',
    3  =>  'last_name',
    4  =>  'sex', 
    5  =>  'image', 
    6  =>  'DOB', 
    7  =>  'place_of_birth', 
    8  =>  'current_city_region', 
    9  =>  'k_ketema_woreda', 
    10 =>  'kebele', 
    11 =>  'H_No', 
    12 =>  'tel', 
    13 =>  'email', 
  
    
);  //create column like table in database

$sql ="SELECT * FROM `account`";
 
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM `account` WHERE 1=1";
if(!empty($request['search']['value']))
{
    $sql.=" AND (ID Like '".$request['search']['value']."%' "; 
    $sql.=" OR first_name Like '".$request['search']['value']."%' ";    
    $sql.=" OR middle_name Like '".$request['search']['value']."%' ";    
    $sql.=" OR last_name Like '".$request['search']['value']."%' ";   
    $sql.=" OR sex Like '".$request['search']['value']."%' ";   
    $sql.=" OR image Like '".$request['search']['value']."%' ";    
    $sql.=" OR DOB Like '".$request['search']['value']."%' ";
    $sql.=" OR place_of_birth Like '".$request['search']['value']."%' ";
    $sql.=" OR k_ketema_woreda Like '".$request['search']['value']."%' ";
    $sql.=" OR current_city_region Like '".$request['search']['value']."%' ";
    $sql.=" OR kebele Like '".$request['search']['value']."%' ";
    $sql.=" OR H_No Like '".$request['search']['value']."%' ";
    $sql.=" OR tel Like '".$request['search']['value']."%' ";
    $sql.=" OR email Like '".$request['search']['value']."%' )";
    
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
    $subdata[]=$row[0]; //supplier_id
    $subdata[]=$row[1]; //supplier_id
    $subdata[]=$row[2]; //supplier_name
    $subdata[]=$row[3]; //supplier-type
    $subdata[]=$row[6]; //account_no
    $subdata[]=$row[11]; //email   
    $subdata[]=$row[13]; //mailing address   




 //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
      $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><span class="glyphicon glyphicon-edit"></span></button>
          <button type="button" name="view" class="btn btn-warning btn-xs view" id="'.$row[0].'" ><span class="glyphicon glyphicon-eye-open"></span></button>
                
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

