<?php
include "./header.php";
?>
<section id="application">
   <div class="container">
      <div class="row">
         <div class="col-12 mx-auto mt-3 bg-white border">
            <h3>Recent Applications</h3>
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th scope="col">Roll No</th>
                     <th scope="col">Name</th>
                     <th scope="col">Father Name</th>
                     <th scope="col">Phone</th>
                     <th scope="col">Subject</th>
                     <th scope="col">Deptt</th>
                     <th scope="col">Seme</th>
                     <th scope="col">Address</th>
                     <th scope="col">Problem</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $application = new database();
                  $application->special_slct("std", ["std.roll_no", "std.name", "std.fname", "std.phone", "std.subject", "std.deptt", "std.seme", "address.location", "std.reason"], "address ON add_id = std.address", null, null, null);
                  echo "<tr>";
                  foreach ($application->results() as $key => $value) {
                     foreach ($value as $key1 => $value1) {
                        echo "<td>" . $value1["roll_no"] . "</td>";
                        echo "<td>" . $value1["name"] . "</td>";
                        echo "<td>" . $value1["fname"] . "</td>";
                        echo "<td>" . $value1["phone"] . "</td>";
                        echo "<td>" . $value1["subject"] . "</td>";
                        echo "<td>" . $value1["deptt"] . "</td>";
                        echo "<td>" . $value1["seme"] . "</td>";
                        echo "<td>" . $value1["location"] . "</td>";
                        echo "<td>" . $value1["reason"] . "</td>";
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