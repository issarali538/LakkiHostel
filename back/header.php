<?php
error_reporting(0);
include "../db-operations/operations.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Header</title>
   <!-- bootstrap -->
   <link rel="stylesheet" href="../css/bootstrap.css">
   <!-- custom css  -->
   <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
   <header id="main-header">
      <div class="container">
         <div class="row">
            <div class="col-md-1" id="hostel-logo">
               <a href="./applications.php"> <img src="../images/hostel-logo.png" alt=""></a>
            </div>
            <div class="col-10" id="menu">
               <ul>
                  <li><a href="./applications.php">Applications</a></li>
                  <li><a href="./inter.php">Interviews</a></li>
                  <li><a href="./merit.php">Merit List</a></li>
                  <li><a href="./notification.php">Notification</a></li>
                  <li><a href="./fee.php">Fee Changes</a></li>
               </ul>
            </div>
            <div class="col-md-1" id="logo">
               <!-- code for admin image admin name  -->
               <?php
               $surename = $_SESSION["surename"];
               $password = $_SESSION["password"];
               $admin_profile = new database();
               $admin_profile->special_slct("h_admin", ["img", "surename"], null, "surename = '$surename' AND password = '$password'", null, null);
               $fetched_result = $admin_profile->results();
               foreach ($fetched_result as $key => $value) {
                  if (!empty($value)) {
                     foreach ($value as $key1 => $value1) {
                        $_SESSION["admin_img"] = $value1["img"];
                     }
                  }
               }

               ?>
               <div>
                  <img src="../images/<?php echo $_SESSION["admin_img"] ?>" alt="">
               </div>
            </div>
            <!-- drop down -->
            <div id="drop-down">
               <div id="drop-down-img">
                  <img src="../images/<?php echo $_SESSION["admin_img"] ?>" alt="">;
               </div>
               <div id="admin-name">
                  <h6><?php echo $surename; ?></h6>
               </div>
               <form action="" method="POST">
                  <input type="submit" class="btn btn-success btn-sm" value="Logout"  name="logout">
               </form>
            </div>
            <!-- end drop down  -->
         </div>
      </div>
   </header>
</body>
</html>
<?php 
   if(isset($_POST["logout"])){
      header("location: http://localhost/lakkiHostel/back/");
   }
?>