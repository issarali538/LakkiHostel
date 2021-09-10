<?php 
include "../db-operations/operations.php";
$id = $_GET["id"];
$delete = new database();
$result = $delete->delete("note", [""], "id = $id");
if($result){
   header("location: http://localhost/lakkiHostel/back/notification.php");
}
?>
