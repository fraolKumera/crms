
<?php
include('include/dbcon.php'); 
$request=$_REQUEST;
$col =array(  

    0  =>  'ID',   
    1  =>  'first_name',   
    2  =>  'last_name',
    3  =>  'email',
    // 6  =>  'user_level', 
    // 7  =>  'Active', 
    4  =>  'registration_date', 
    5  =>  'account_type', 
  
    
);  //create column like table in database

$sql ="SELECT * FROM `user`";
 
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM `user` WHERE 1=1";
if(!empty($request['search']['value']))
{
    $sql.=" AND (ID Like '".$request['search']['value']."%' "; 
    $sql.=" OR first_name Like '".$request['search']['value']."%' ";   
    $sql.=" OR last_name Like '".$request['search']['value']."%' ";   
    $sql.=" OR email Like '".$request['search']['value']."%' ";   
    // $sql.=" OR user_level Like '".$request['search']['value']."%' ";    
    // $sql.=" OR Active Like '".$request['search']['value']."%' ";
    $sql.=" OR registration_date Like '".$request['search']['value']."%' ";
    $sql.=" OR account_type Like '".$request['search']['value']."%' ";

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
    // $subdata[]=$row[6]; //account_no
    // $subdata[]=$row[7]; //email   
    $subdata[]=$row[4]; //mailing address   
    $subdata[]=$row[5]; //mailing address  



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

