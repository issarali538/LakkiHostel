<?php
include "./header.php";
?>
<section id="notification">
   <div class="container">
      <div class="row p-4 text-center">
         <h1 class="text-success d-inline">Notifications</h1>
         <?php
         $note = new database();
         $note->special_slct("note", ["*"], null, null, null, "id DESC");
         $fetch = $note->results();
         foreach ($fetch as $key => $value) {
            foreach ($value as $key1 => $value1) {

         ?>
               <div class="col-md-8 mx-auto">
                  <div class="border p-2 my-2 notification-block">
                     <div class="lead bg-dark text-white"><?php echo $value1["heading"]; ?></div>
                     <?php echo $value1["detail"]; ?>
                     <span class="fw-bold d-block text-right bg-warning">Issued On : <?php echo $value1["date"]; ?></span>
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