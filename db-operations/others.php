<?php 
class others{
   public function file_ext($file_ext){
      $implode = explode(".", $file_ext);
      $ext = end($implode);
      $extentions = ["jpeg", "jpg", "png"];
      if(in_array(strtolower($ext), $extentions)){
         return true;
      }else{
         return false;
      }
   }
   public function file_size($file_size){
      if($file_size > 2097152){
         return false;
      }else{
         return true;
      }
   }
}
?>