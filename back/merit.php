<?php
include "./header.php";
?>
<section id="merit-list-table" class="mt-3">
   <div class="container bg-white border p-3">
      <div class="row">
         <div class="col-md-12">
            <h5 class="d-inline text-success">Upload Merit List</h5>
            <!-- form for select merit list  -->
            <form action="" method="POST" class="pb-1 border-bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="exampleFormControlSelect1">Select Merit List</label>
                           <select class="form-control" name="marks_criteria" id="exampleFormControlSelect1">
                              <option selected>Select</option>
                              <option value="80">Marks >= 80</option>
                              <option value="70">Marks >= 70</option>
                              <option value="60">Marks >= 60</option>
                              <option value="50">Marks >= 50</option>
                              <option value="40">Marks >= 40</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <input type="submit" name="upload-merit-list" value="Upload and Show" class="btn btn-success mt-4">
                     </div>
                  </div>
            </form>
         </div>
         <div class="col-md-12">
            <h3 class="my-2 text-success border-bottom">Your Merit List</h3>
            <!-- table to show the selected merit list  -->
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">Roll No</th>
                     <th scope="col">Name</th>
                     <th scope="col">Father Name</th>
                     <th scope="col">Subject</th>
                     <th scope="col">Deptt</th>
                     <th scope="col">Semester</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  if (isset($_POST["upload-merit-list"])) {
                     $select_criteria = $_POST["marks_criteria"];
                     $merit = new database();
                     $merit->special_slct("merit", ["*"], "std ON std.roll_no = merit.roll_no AND std.deptt = merit.deptt AND std.subject = merit.subject AND std.seme = merit.seme", "merit_marks >= $select_criteria", null, null);
                     $result = $merit->results();
                     foreach ($result as $key => $value) {
                        foreach ($value as $key1 => $value1) {
                           // to show the merit list in the front 
                        $_SESSION["merit_marks"] = $select_criteria;
                  ?>
                           <tr>
                              <th scope="row"><?php echo $value1["roll_no"]; ?></th>
                              <td><?php echo $value1["name"]; ?></td>
                              <td><?php echo $value1["fname"]; ?></td>
                              <td><?php echo $value1["subject"]; ?></td>
                              <td><?php echo $value1["deptt"]; ?></td>
                              <td><?php echo $value1["seme"]; ?></td>
                           </tr>
                  <?php
                        }
                     }
                  }else{
                     echo "<h5 class='text-danger'>No Marks Criteria Selected</h5>";
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>