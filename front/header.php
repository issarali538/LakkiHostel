<!-- php code for menu hover  -->
<?php
$home = "";
$registration = "";
$notification = "";
$help = "";
$contact = "";
$about = "";
$title = "";
switch (basename($_SERVER['PHP_SELF'])) {
   case 'registration.php':
      $registration = "background-color:#535c68;";
      $title = "Registration";
      break;
   case 'notification.php':
      $notification = "background-color:#535c68;";
      $title = "Notification";
      break;
   case 'help.php':
      $help = "background-color:#535c68;";
      $title = "Help";
      break;
   case 'contact.php':
      $contact = "background-color:#535c68;";
      $title = "Contact";
      break;
   case 'about.php':
      $about = "background-color:#535c68;";
      $title = "About";
      break;
   default:
      $home =  "background-color:#535c68;";
      $title = "Home";
      break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $title ?></title>
   <!-- bootstrap  -->
   <link rel="stylesheet" href="../css/bootstrap.css">
   <!-- fontawesome -->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
   <!-- custom css  -->
   <link rel="stylesheet" href="../css/style.css">
</head>

<body>
   <header id="main-header">
      <div class="container">
         <div class="row">
            <!-- college logo   -->
            <div class="col-md-12">
               <h1>Welcome to Kabir Hostel</h1>
            </div>
            <div class="col-md-2" id="logo-hostel">
               <div><a href="./index.php"><img src="../images/hostel-logo.png" alt=""></a></div>
            </div>
            <!-- menue    -->
            <div class="col-md-8">
               <ul>
                  <li><a id="home" href="./index.php">Home</a></li>
                  <li style=<?php echo $registration; ?>><a href="./registration.php">Registratioin</a></li>
                  <li style=<?php echo $notification; ?>><a href="./notification.php">Notification</a></li>
                  <li style=<?php echo $help; ?>><a href="./help.php">Help?</a></li>
                  <li style=<?php echo $contact; ?>><a href="./contact.php">Contact</a></li>
                  <li style=<?php echo $about; ?>><a href="./about.php">About Us</a></li>
               </ul>
            </div>
            <!-- hostel logo   -->
            <div class="col-md-2" id="logo-college">
               <div><img src="../images/college-logo.jpg" alt=""></div>
            </div>
         </div>
      </div>
   </header>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>