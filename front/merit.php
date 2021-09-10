<?php
include "./header.php";

?>
<section class="mt-2">
   <div class="container bg-white">
      <div class="row">
         <div class="col-md-4 mx-auto">
            <?php
            // the form is show if the page is loaded for first time 
            if (!isset($_POST["status"])) {
               echo ' <h5 class="my-2">Check your STATUS </h5>';
            ?>
               <form action="" method="POST">
                  <div class="form-group-sm my-1">
                     <input type="text" name="roll_no" placeholder="e.g 456" class="form-control">
                  </div>
                  <div class="form-group-sm">
                     <select class="form-control" name="subject">
                        <option selected>Subject</option>
                        <option value="Computer Science">Computer Science
                        </option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Biology">Biology</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Botony">Botony</option>
                        <option value="Zology">Zology</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Islamiyat">Islamiyat</option>
                        <option value="English">English</option>
                     </select>
                  </div>
                  <div class="form-group-sm my-1">
                     <select class="form-control" name="deptt">
                        <option selected>Deptt</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Zology">Zology</option>
                        <option value="Botony">Botony</option>
                        <option value="Islamiyat">Islamiyat</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Urdu">Urdu</option>
                        <option value="English">English</option>
                     </select>
                  </div>
                  <div class="form-group-sm">
                     <select class="form-control" name="seme">
                        <option selected>Semester</option>
                        <option value="1">Seme-1</option>
                        <option value="2">Seme-2</option>
                        <option value="3">Seme-3</option>
                        <option value="4">Seme-4</option>
                        <option value="5">Seme-5</option>
                        <option value="6">Seme-6</option>
                        <option value="7">Seme-7</option>
                        <option value="8">Seme-8</option>
                     </select>
                  </div>
                  <input type="submit" value="Check Status" name="status" class="btn btn-success btn-sm my-1">
               </form>
            <?php
            }
            ?>
         </div>
         <div class="col-md-10 mt-2 mx-auto">
            <!-- the table is not shown if the data is not yet submitted -->
            <?php
            if (isset($_POST["status"])) {
               echo '<h5 class="my-2 text-success">Your Information</h5>';
               $roll_no = trim($_POST["roll_no"]);
               $subject = trim($_POST["subject"]);
               $deptt = trim($_POST["deptt"]);
               $seme = trim($_POST["seme"]);
               $merit_marks =  $_SESSION["merit_marks"];
               $std_status = new database();
               $std_status->special_slct("std", ["std.roll_no", "std.name", "std.fname", "std.subject", "std.deptt", "std.seme"], "merit ON merit.roll_no = std.roll_no AND merit.subject = std.subject AND merit.seme = std.seme", "std.roll_no = $roll_no AND merit.merit_marks >= $merit_marks  AND std.subject = '$subject' AND std.deptt = '$deptt' AND merit.seme = '$seme'", null, null);
               $fetched_status = $std_status->results();
               foreach ($fetched_status as $key => $value) {
                  if (!empty($value)) {
                     foreach ($value as $key1 => $value1) {
            ?>
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Roll No</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Father Name</th>
                                 <th scope="col">Subject</th>
                                 <th scope="col">Deptt</th>
                                 <th scope="col">Semester</th>
                                 <th scope="col">Download</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th scope="row"><?php echo $value1["roll_no"]; ?></th>
                                 <td><?php echo $value1["name"]; ?></td>
                                 <td><?php echo $value1["fname"]; ?></td>
                                 <td><?php echo $value1["subject"]; ?></td>
                                 <td><?php echo $value1["deptt"]; ?></td>
                                 <td><?php echo $value1["seme"]; ?></td>
                                 <td><a href="./sleep.php?roll_no=<?php echo $value1['roll_no'];?>&subject=<?php echo $value1['subject']; ?>&deptt=<?php echo $value1['deptt']; ?>&seme=<?php echo $value1['seme']; ?>">Download</a></td>
                              </tr>
                           </tbody>
                        </table>
            <?php
                     }
                  } else {
                     echo "<h2 class='bg-warning'>Sorry! Your are not eligible for Hostel Resident</h2>";
                  }
               }
            }
            ?>
         </div>
      </div>
   </div>
</section>