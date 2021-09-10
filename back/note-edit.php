<?php
include "../db-operations/operations.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Notification</title>
   <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
   <section>
      <div class="container">
         <div class="row p-5">
            <div class="col-12">
               <h2 class="text-success text-center">Edit Notification</h2>
            </div>
            <div class="col-8 mx-auto">
               <?php
               $id = $_GET["id"];
               $edit = new database();
               $edit->special_slct("note", ["*"], null, "id = $id", null, null, null);
               $result = $edit->results();
               foreach ($result as $key => $value) {
                  foreach ($value as $key1 => $value1) {
               ?>
                     <form action="" method="POST">
                        <div class="form-group">
                           <input type="text" name="heading" value="<?php echo $value1["heading"]; ?>" class="fw-bold form-control">
                        </div>
                        <div class="form-group my-3">
                           <textarea name="detail" id="" cols="30" rows="10" class="form-control">
                        <?php
                        echo $value1["detail"];
                        ?>
                     </textarea>
                        </div>
                        <input type="submit" value="Save Changes" name="save-changes" class="btn btn-success">
                     </form>
               <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
   </section>
</body>

</html>
<?php
if (isset($_POST["save-changes"])) {
   // print_r($_POST);
   $heading = $_POST["heading"];
   $detail = $_POST["detail"];
   $changes = $edit;
   $result1 = $changes->udpate("note", ["heading"=>"$heading", "detail" =>"$detail"], "id = $id");
   if($result){
      header("location: http://localhost/lakkiHostel/back/notification.php");
   }
}
?>