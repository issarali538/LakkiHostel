<?php include "./header.php" ?>
<section id="reg-form">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <form action="save-reg-date.php" onsubmit="return formValidation(this);" method="POST">
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
                           <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                           <small class="form-text text-danger" id="nameMsg"></small>
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
                           <input type="email" name="email" id="Email" placeholder="Email" class="form-control">
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
                           <input type="text" class="form-control" name=" fsc_marks" id="fsc_marks" placeholder="Fsc Mark(out of 1100)">
                           <small class="form-text text-danger" id="fsc_marksMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="subject" id="subject" class="form-control">
                              <option selected>Subject</option>
                           </select>
                           <small class="form-text text-danger" id="subjectMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="deptt" id="deptt" class="form-control">
                              <option selected>Deptt</option>
                           </select>
                           <small class="form-text text-danger" id="depttMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="address" id="address" class="form-control">
                              <option selected>Address</option>
                           </select>
                           <small class="form-text text-danger" id="addressMsg"></small>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-sm">
                           <select name="reason" id="reason" class="form-control">
                              <option selected>Reason</option>
                              <option selected>Distance</option>
                              <option selected>Traffic</option>
                              <option selected>Birbery</option>
                           </select>
                           <small class="form-text text-danger" id="reasonMsg"></small>
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
                           <input type="file" name="btn btn-success" class="form-control" id="pic">
                           <small class="form-text text-danger" id="picMsg">The pic must not greater then one Mbs</small>
                        </div>
                     </div>
                     <input type="submit" value="Submit" class="btn btn-sm btn-success">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<script src="../js/form-validations.js"></script>