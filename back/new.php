<?php 
   include "../db-operations/operations.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>New Notification</title>
   <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h1 class="text-success text-center">Add New Notification</h1>
            </div>
            <div class="col-md-7 mx-auto">
               <form action="" method="POST">
                  <label for="heading">Heading</label>
                  <div class="form-group">
                     <input type="text" name="heading" id="heading" class="fw-bold form-control">
                  </div>
                  <div class="form-group my-3">
                     <label for="desc">Desription</label>
                     <textarea name="desc" id="desc" cols="30" rows="10" class="form-control mb-3"></textarea>
                  </div>
                  <input type="submit" value="Save" name="save" class="btn btn-success">
               </form>
            </div>
         </div>
      </div>
   </section>
</body>

</html>
<?php
if (isset($_POST["save"])) {
   print_r($_POST);
   $heading = $_POST["heading"];
   $desc  = $_POST["desc"];
   $date = date("D, j-F-Y");
   $new_notification = new database();
   $result = $new_notification->insert("note", "heading, detail, date", "'$heading', '$desc', '$date'");
   if($result){
      header("location: http://localhost/lakkiHostel/back/notification.php");
   }
   
}

?>