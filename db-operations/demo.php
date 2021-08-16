<?php 
include "./operations.php";
$obj = new database();
$obj->special_slct("std", ["std.name", "std.fname", "address.location"], "address ON address.add_id = std.address","address.location REGEXP '^t'", null, null);
foreach ($obj->results() as $key => $value) {
   echo "<pre>";
   print_r($value);
   echo "</pre>";
}


