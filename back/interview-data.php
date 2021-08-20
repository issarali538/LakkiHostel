<?php
session_start();
print_r($_SESSION);
include "../db-operations/student.php";
print_r($_POST);
$obj = new student();
$roll_no = $_SESSION["roll_no"];
$subject = $_SESSION["subject"];
$seme = $_SESSION["seme"];
$deptt = $_SESSION["deptt"];
$admin_marks = $_POST["admin_marks"];
$condtion_marks = $obj->return_fsc_marks($_SESSION["fsc_marks"]);
$condition_kms = $obj->location($_SESSION["location"]);
$total = $admin_marks + $condition_kms + $condtion_marks + $_SESSION["other"];
if (isset($_POST["ok"])) {
   $merit_list = new database();
   if ($merit_list->insert("merit", "roll_no, subject, seme, deptt, merit_marks", "$roll_no, '$subject', '$seme', '$deptt',$total")) {
      header("location: http://localhost/lakkiHostel/back/inter.php");
   } else {
      echo "not";
   }
}
