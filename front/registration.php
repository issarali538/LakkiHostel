<?php
include "./header.php";
include "../db-operations/others.php";
?>
<section id="reg-form">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <form action="" enctype="multipart/form-data" method="POST">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                        <h2>Student Registration Form</h2>
                        <span>All Feild are required</span>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <input type="text" name="roll_no" id="roll_no" placeholder="Roll No" class="form-control">
                           <small class="form-text text-danger" id="roll_noMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <input type="text" name="std_name" id="name" placeholder="Name" class="form-control">
                           <small class="form-text text-danger" id="std_nameMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <input type="text" name="fname" id="fname" placeholder="Father Name" class="form-control">
                           <small class="form-text text-danger" id="fnameMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                           <small class="form-text text-danger" id="emailMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control">
                           <small class="form-text text-danger" id="phoneMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <input type="text" class="form-control" name="fsc_marks" id="fsc_marks" placeholder="Fsc Mark(out of 1100)">
                           <small class="form-text text-danger" id="fsc_marksMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="subject" id="subject" class="form-control">
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
                           <small class="form-text text-danger" id="subjectMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="deptt" id="deptt" class="form-control">
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
                           <small class="form-text text-danger" id="depttMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="seme" id="seme" class="form-control">
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
                           <small class="form-text text-danger" id="depttMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="address" id="address" class="form-control">
                              <option selected>Address</option>
                              <?php
                              $address = new database();
                              $address->only_slct("address");
                              foreach ($address->results() as $key => $value) {
                                 foreach ($value as $key1 => $value1) {
                                    echo "<option value = " . $value1['add_id'] . ">" . $value1['location'] . "</option>";
                                 }
                              }
                              ?>
                           </select>
                           <small class="form-text text-danger" id="addressMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6 mb-3">
                        <div class="form-group form-group-sm">

                           <select name="reason" id="reason" class="form-control">
                              <option value="Reason" selected>Reason</option>
                              <option value="Distance" selected>Distance</option>
                              <option value="Traffic" selected>Traffic</option>
                              <option value="Birbery" selected>Birbery</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12 border" id="additional-part">
                        <label for="diable">Are you Disable Student? </label>
                        <input type="radio" value="5" class="form-check-input" name="disable" id="disable">Yes
                        <input type="radio" value="0" class="form-check-input" name="disable" id="disable">No
                        <small class="form-text text-danger" id="disableMsg"></small>
                        <hr>
                        <label for="diable">Are you Old Student in Kabir Hostel? </label>
                        <input type="radio" value="5" class="form-check-input" name="old_std" id="old_std">Yes
                        <input type="radio" value="0" class="form-check-input" name="old_std" id="old_std">No
                        <small class="form-text text-danger" id="old_stdMsg"></small>
                        <hr>
                        <div class="form-control">
                           <input type="file" name="pic" class="form-control" id="pic">
                           <small class="form-text text-danger" id="picMsg">The pic must not greater then one Mbs</small>
                        </div>
                     </div>
                     <input type="submit" name="submit" class="btn btn-sm btn-success mt-3">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<?php
if (isset($_POST["submit"])) {
   $roll_no = $_POST["roll_no"];
   $name = $_POST["std_name"];
   $fname = $_POST["fname"];
   $email = $_POST["email"];
   $phone = $_POST["phone"];
   $fsc_marks = $_POST["fsc_marks"];
   $subject = $_POST["subject"];
   $deptt = $_POST["deptt"];
   $address = $_POST["address"];
   $reason = $_POST["reason"];
   $seme = $_POST["seme"];
   $other = $_POST["disable"] + $_POST["old_std"];
   $pic_name = $_FILES["pic"]["name"];
   $pic_ext = $_FILES["pic"]["type"];
   $pic_size = $_FILES["pic"]["size"];
   $pic_tmp_name = $_FILES["pic"]["tmp_name"];
   $img = time() . $pic_name;
   // form validation 
   $s = "<script>";
   $e = "</script>";
   if ($roll_no == "") {
      echo $s;
      echo "document.getElementById('roll_noMsg').innerHTML = 'Enter Your roll no'";
      echo $e;
      die();
   }
   if (!is_numeric($roll_no)) {
      echo $s;
      echo "document.getElementById('roll_noMsg').innerHTML = 'Enter A valid roll No'";
      echo $e;
      die();
   }
   if ($name == "") {
      echo $s;
      echo "document.getElementById('std_nameMsg').innerHTML = 'Enter Your Name'";
      echo $e;
      die();
   }
   if ($fname == "") {
      echo $s;
      echo "document.getElementById('fnameMsg').innerHTML = 'Enter your father name'";
      echo $e;
      die();
   }
   if ($email == "") {
      echo $s;
      echo "document.getElementById('emailMsg').innerHTML = 'Enter your email'";
      echo $e;
      die();
   }
   if ($phone == "") {
      echo $s;
      echo "document.getElementById('phoneMsg').innerHTML = 'Enter phone#'";
      echo $e;
      die();
   }
   if ($fsc_marks == "") {
      echo $s;
      echo "document.getElementById('fsc_marksMsg').innerHTML = 'Enter marks'";
      echo $e;
      die();
   }
   if ($pic_name == "") {
      echo $s;
      echo "document.getElementById('picMsg').innerHTML = 'Choose your pic'";
      echo $e;
      die();
   }
   $others = new others();
   if ($others->file_size($pic_size && $others->file_ext($pic_ext))) {
      $insert_form_date = new database();
      $sql = $insert_form_date->insert("std", "roll_no, name, fname, cnic, phone, subject, deptt, seme, fsc_marks, other, reason, img, address", "$roll_no, '$name', '$fname','0', '$phone', '$subject', '$deptt', '$seme', $fsc_marks, $other, '$reason', '$img', 2");
      if ($sql) {
         move_uploaded_file($pic_tmp_name, "../images/" . $img);
      }
   }
}
