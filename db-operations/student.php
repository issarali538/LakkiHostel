<?php
include "../db-operations/operations.php";
class student
{
   public function return_fsc_marks($fsc_marks)
   {
      if ($fsc_marks >= 900) {
         $fsc_marks_range = 30;
      }
      if ($fsc_marks > 800 && $fsc_marks < 900) {
         $fsc_marks_range = 25;
      }
      if ($fsc_marks > 700 && $fsc_marks < 800) {
         $fsc_marks_range = 20;
      }
      if ($fsc_marks < 600) {
         $fsc_marks_range = 15;
      }
      return $fsc_marks_range;
   }
   public function location($location){
      // echo $location;
      $obj_for_loc = new database();
      $obj_for_loc->special_slct("address", ["kms"], null, "location = '$location'", null, null);
      $result = $obj_for_loc->results();
      foreach ($result as $key => $value) {
         foreach ($value as $key1 => $value1) {
            $kms =  $value1["kms"];
         }
      }
      if($kms >= 60){
         $return_kms = 40;
      }
      if($kms > 40 && $kms <= 50){
         $return_kms = 35;
      }
      if($kms > 30 && $kms <= 50){
         $return_kms = 30;
      }
      if($kms > 20 && $kms <= 30){
         $return_kms = 15;
      }
      return $return_kms;
   }
}
