<?php
include "./header.php";
?>
<!-- modal  -->
<div id="modal" class="bg-white p-3">
   <div id="admin-marks" class="">
      <form action="interview-data.php" method="POST">
         <h4>Admin Marks</h4>
         <div class="form-group">
            <label for="diable">Select Marks for Recent Interview </label><br>
            <input type="radio" value="15" class="form-check-input" name="admin_marks">15 Marks
            <input type="radio" value="10" class="form-check-input" name="admin_marks">10 Marks
         </div>
         <input type="submit" value="OK" name="ok" class="btn btn-success mt-2">
      </form>
   </div>
</div>
<!-- modal  -->
<section id="interview">
   <div class="container bg-white p-3 text-center mt-3">
      <div class="row">
         <h3>Interviews</h3>
         <div class="col-md-5">
            <h4>Entry</h4>
            <form action="" method="GET">
               <div class="form-group">
                  <input type="text" name="roll_no" id="roll_no" class="form-control">
                  <small class="form-text text-danger"></small>
               </div>
               <div class="form-group">
                  <select name="subject" id="subject" class="form-control my-2">
                     <option selected>Select Subject</option>
                     <option value="Computer Science">Computer Science</option>
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
               <div class="form-group">
                  <select name="deptt" id="deptt" class="form-control">
                     <option selected>Select Department</option>
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
               <div class="form-group">
                  <select name="seme" id="seme" class="form-control my-2">
                     <option selected>Select Seme</option>
                     <option value="1">Semester-1</option>
                     <option value="2">Semester-2</option>
                     <option value="3">Semester-3</option>
                     <option value="4">Semester-4</option>
                     <option value="5">Semester-5</option>
                     <option value="6">Semester-6</option>
                     <option value="7">Semester-7</option>
                     <option value="8">Semester-8</option>
                  </select>
               </div>
               <input type="submit" value="Check" name="check" class="btn btn-block btn-success">
            </form>
         </div>
         <!-- student data from entry  -->
         <?php
         if (isset($_GET["roll_no"]) && isset($_GET["subject"]) && isset($_GET["deptt"]) && isset($_GET["seme"])) {
            $roll_no = $_GET["roll_no"];
            $subject = $_GET["subject"];
            $deptt = $_GET["deptt"];
            $seme = $_GET["seme"];
            $std_data = new database();
            echo $std_data->special_slct("std", ["std.roll_no", "std.name", "std.subject", "std.deptt", "std.seme", "std.address", "std.other", "address.location", "std.img", "std.fsc_marks"], "address ON address.add_id = std.address", "std.roll_no = $roll_no AND std.deptt = '$deptt' AND std.seme = '$seme'");
            $recieved_data = $std_data->results();
            foreach ($recieved_data as $key => $value) {
               foreach ($value as $key1 => $value1) {
                  if (!empty($value1)) {
                     $_SESSION["roll_no"]  = $value1["roll_no"];
                     $_SESSION["subject"]  = $value1["subject"];
                     $_SESSION["deptt"]    = $value1["deptt"];
                     $_SESSION["fsc_marks"]    = $value1["fsc_marks"];
                     $_SESSION["other"]    = $value1["other"];
                     $_SESSION["location"] = $value1["location"];
                     $_SESSION["seme"] = $value1["seme"];

         ?>
                     <div class="col-md-5 text-center">
                        <h3>Student Details</h3>
                        <div id="std-img" class="mx-auto">
                           <img src="<?php echo '../images/' . $value1['img']; ?>" alt="">
                        </div>
                        <div class="std-info">Name : <span id="name"><?php echo $value1["name"]; ?></span></div>
                        <div class="std-info">Roll No : <span><?php echo $value1["roll_no"]; ?></span></div>
                        <div class="std-info">Subject : <span><?php echo $value1["subject"]; ?></span></div>
                        <div class="std-info">Deptt : <span><?php echo $value1["deptt"]; ?></span></div>
                        <div class="std-info">Semester : <span><?php echo $value1["seme"]; ?></span> || Fsc Marks: <span><?php echo $value1["fsc_marks"]; ?></span></div>
                        <button id="attended" onclick="modal()" class="btn btn-success btn-sm mt-3">Attend Interview</button>
               <?php

                  } else {
                     echo "<h1>No record found</h1>";
                  }
               }
            }
               ?>
                     </div>
                  <?php
               }
                  ?>
      </div>
   </div>
</section>
<script>
   function modal() {
      document.getElementById("modal").setAttribute("style", "visibility: visible");
   }
</script>