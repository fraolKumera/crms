<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM clients WHERE ID like '" . $_POST["keyword"] . "%' ORDER BY ID LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $cid) {
?>
<li onClick="selectCountry('<?php echo $cid["ID"]; ?>');"><?php echo $cid["ID"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>