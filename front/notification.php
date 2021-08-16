<?php
include "../db-operations/operations.php";
include "./header.php";
?>
<section id="notification">
   <div class="container">
      <div class="row p-4 text-center">
         <h1 class="text-success d-inline">Notifications</h1>
         <?php
         $note = new database();
         $note->only_slct("note");
         foreach ($note->results() as $key => $value) {
            foreach ($value as $key1 => $value1) {

         ?>
               <div class="col-md-8 mx-auto">
                  <div class="border p-2 my-1 notification-block">
                     <div class="lead bg-dark text-white"><?php echo $value1["heading"]; ?></div>
                     echo <?php echo $value1["detail"]; ?>
                     <a href="#">Merit List</a>
                     <span class="form-text d-block text-right"><?php echo $value1["date"]; ?></span>
                  </div>
               </div>
         <?php
            }
         }
         ?>
      </div>
   </div>
   </div>
</section>
<?php include "./footer.php" ?>