// document.querySelector("form").addEventListener("submit", () => {
//    alert(document.getElementById("pic").value);
//    return false;
// })
function formValidation(form) {
   let roll_no = document.getElementById("roll_no").value;
   let name = document.getElementById("name").value;
   let fname = document.getElementById("name").value;
   let email = document.getElementById('email').value;
   let phone = document.getElementById('phone').value;
   let fsc_marks = document.getElementById('fsc_marks').value;
   let subject = document.getElementById('subject').value;
   let deptt = document.getElementById('deptt').value;
   let address = document.getElementById('address').value;
   let reason = document.getElementById('reason').value;
   let disable = document.getElementById("disable");
   let old_std = document.getElementById("old_std");
   let pic = document.getElementById("pic").value;
   // for form field values 
   if (roll_no == "") {
      document.getElementById("roll_noMsg").innerHTML = "Roll No is missing";
      return false;
   }
   else if (name == ""){
      document.getElementById("nameMsg").innerHTML = "Name is missing";
      return false;
  }
   else if (fname == ""){
      document.getElementById("fnameMsg").innerHTML = "Father Name is missing";
      return false;
  }
   else if (email == ""){
      document.getElementById("emailMsg").innerHTML ="Email is missing";
      return false;
  }
   else if (fsc_marks == ""){
      document.getElementById("fsc_marksMsg").innerHTML ="Mark Field is missing";
      return false;
  }
   else if (subject == ""){
      document.getElementById("subjectMsg").innerHTML ="Select Your Subject";
      return false;
  }
   else if (deptt == ""){
      document.getElementById("depttMsg").innerHTML ="Select Department";
      return false;
  }
   else if (address == ""){
      document.getElementById("addressMsg").innerHTML ="Your Address is Missing";
      return false;
  }
   else if (reason == ""){
      document.getElementById("reasonMsg").innerHTML ="Your reason";
      return false;
  }
   else if (pic == ""){
      document.getElementById("picMsg").innerHTML ="Choose Your passport size pic";
      return false;
  }
   else if (!(disable.checked)){
      document.getElementById("picMsg").innerHTML ="Are you disable or not";
      return false;
  }
   else if (!(old_std.checked)){
      document.getElementById("old_stdMsg").innerHTML ="Are your old student or not";
      return false;
   } else {
      return true;
  }
}