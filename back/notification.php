<?php
include "./header.php";
?>
<section id="notification" class="mt-3">
   <div class="container bg-white border p-3">
      <div class="row">
         <div class="col-10">
            <h1 class="text-success">Notifications</h1>
         </div>
         <div class="col-2"><a href="new.php" class="btn btn-success">New</a></div>
         <div class="col-12">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th scope="col">Serail No</th>
                     <th scope="col">Date</th>
                     <th scope="col">Title</th>
                     <th scope="col" col-span=2>Edit</th>
                     <th scope="col" col-span=2>Delete</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $application = new database();
                  $application->special_slct("note", ["*"], null, null, null, null);
                  echo "<tr>";
                  foreach ($application->results() as $key => $value) {
                     foreach ($value as $key1 => $value1) {
                        echo "<td>" . $value1["id"] . "</td>";
                        echo "<td>" . $value1["date"] . "</td>";
                        echo "<td>" . $value1["heading"] . "</td>";
                        echo "<td><a href='note-edit.php?id=".$value1["id"]."'>Edit</a></td>";
                        echo "<td><a href='note-delete.php?id=". $value1["id"]."'>Delete</a></td>";
                        echo "</tr>";
                     }
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>