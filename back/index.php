<?php
include "../db-operations/operations.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>
   <!-- bootstrap css  -->
   <link rel="stylesheet" href="../css/bootstrap.css">
   <!-- custom css   -->
   <link rel="stylesheet" href="../css/admin.css">
   <!-- fontawesome -->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
   <section id="login">
      <div class="container">
         <div class="row">
            <div class="col-md-5 mx-auto">
               <form action="" method="POST">
                  <h2 class="text-white text-center">Admin Login</h2>
                  <div class="form-group mt-4">
                     <input type="text" autocomplete="off" placeholder="username" name="surename" id="password" class="form-control">
                  </div>
                  <div class="form-group my-3">
                     <input type="password" autocomplete="off" placeholder="password" name="password" id="password" class="form-control">
                     <small class="form-text text-danger" id="loginMsg"></small>
                  </div>
                  <input type="submit" name="login" value="Login" class="btn btn-success btn-block">
               </form>
            </div>
         </div>
      </div>
   </section>
</body>

</html>
<!-- php for login  -->
<?php
if (isset($_POST["login"])) {
   $s = "<script>";
   $e = "</script>";
   $surename = $_POST["surename"];
   $password = $_POST["password"];
   // sessions for security 
   $login = new database();
   $success_login = $login->special_slct("h_admin", ["surename", "password"], null, "surename = '$surename' AND password = '$password'", null, null);
   if (!empty($login->results())) {
      foreach ($login->results() as $key => $value) {
         if ((sizeof($value)) == 1) {
            foreach ($value as $key1 => $value1) {
               $_SESSION["surename"] = $value1["surename"];
               $_SESSION["password"] = $value1["password"];
            }
            header("location: http://localhost/lakkiHostel/back/header.php");
         } else {
            echo $s;
            echo "document.getElementById('loginMsg').innerHTML = 'Something Went wrong!'";
            echo $e;
         }
      }
   }
}
?>