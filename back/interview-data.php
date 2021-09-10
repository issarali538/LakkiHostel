<?php
session_start();
// print_r($_SESSION);
include "../db-operations/student.php";
// print_r($_POST);
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
   $connection = mysqli_connect("localhost", "root", "", "final_project");
   $mysqli_fetch_query = "SELECT * from merit where roll_no = $roll_no and deptt = '$deptt' and seme = '$seme ' and subject = '$subject'";
   $res = mysqli_query($connection, $mysqli_fetch_query);
   $rows = mysqli_fetch_assoc($res);
   print_r($rows);
      if (!empty($rows)) {
         $sql1 = "UPDATE merit SET subject = '$subject', deptt = '$deptt', seme = '$seme' where roll_no = $roll_no AND subject = '$subject' AND deptt = '$deptt'";
         $res1 = mysqli_query($connection, $sql1);
         if ($res1) {
            header("location: http://localhost/lakkiHostel/back/inter.php");
         }
      } else {
         $sql3 = "INSERT INTO merit (roll_no, subject, seme,	deptt, merit_marks) VALUES ($roll_no, '$subject', '$seme', '$deptt', $total)";
         $res3 = mysqli_query($connection, $sql3);
         if ($res3) {
            header("location: http://localhost/lakkiHostel/back/inter.php");
         }
      }
   
}
