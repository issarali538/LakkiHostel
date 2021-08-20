<?php 
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
               <img src="../images/hostel-logo.png" alt="">
            </div>
            <div class="col-10" id="menu">
               <ul>
                  <li><a href="./applications.php">Applications</a></li>
                  <li><a href="./inter.php">Interviews</a></li>
                  <li><a href="./merit.php">Merit List</a></li>
                  <li><a href="#">Notification</a></li>
                  <li><a href="#">Fee Changes</a></li>
               </ul>
            </div>
            <div class="col-md-1" id="logo">
               <div>
                  <img src="../images/1629053950images(33).jpg" alt="">
               </div>
            </div>
            <!-- drop down -->
            <div id="drop-down">
               <div id="drop-down-img">
                  <img src="../images/1629053950images(33).jpg" alt="">
               </div>
               <div id="admin-name">
                  <h6>Sahibzada Issar Ali</h6>
               </div>
               <button class="btn btn-success btn-sm">LogOut</button>
            </div>
            <!-- end drop down  -->
         </div>
      </div>
   </header>
</body>

</html>