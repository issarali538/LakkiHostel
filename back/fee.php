<?php  
include '../db-operations/operations.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee For <?php echo date("Y"); ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto p-5">
                <h2 class="text-success">Change Fee For <?php echo date("Y"); ?></h2>
                <hr>
                <form action="" method="POST">
                    <?php 
                        $fee_changes = new database();
                        $fee_changes->only_slct("fee");
                        $result = $fee_changes->results();
                        foreach ($result as $key => $value) {
                            foreach ($value as $key1 => $value1) {
                           
                    ?>
                    <div class="form-group">
                        <label for="h_admin_fee">Hostel Admin Fee</label>
                        <input type="number" value="<?php echo $value1['h_admin_fee']; ?>" name="h_admin_fee" id="h_admin_fee" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hostel_fee">Hostel Fee</label>
                        <input type="number" value="<?php echo $value1['h_fee']; ?>" name="hostel_fee" id="hostel_fee" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hostel_security">Hostel Security</label>
                        <input type="number" value="<?php echo $value1['h_security']; ?>" name="hostel_security" id="hostel_security" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="h_charges">Hostel Charges</label>
                        <input type="number" value="<?php echo $value1['h_charges']; ?>" name="h_charges" id="h_charges" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="h_electricity">Hostel Electricity</label>
                        <input type="number" value="<?php echo $value1['h_electricity']; ?>" name="h_electricity" id="h_electricity" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="h_fine">Hostel Fine</label>
                        <input type="number" value="<?php echo $value1['h_fine']; ?>" name="h_fine" id="h_fine" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="h_other_charges">Other Charges</label>
                        <input type="number" value="<?php echo $value1['h_other']; ?>" name="h_other_charges" id="h_other_charges" class="form-control">
                    </div>
                    <input type="submit" value="Save Changes" name="save_changes" class="mt-2 btn btn-success">
                    <?php 
                     }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST["save_changes"])){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
      $h_admin_fee = trim($_POST["h_admin_fee"]);
      $hostel_fee = trim($_POST["hostel_fee"]);
      $hostel_security = trim($_POST["hostel_security"]);
      $h_charges = trim($_POST["h_charges"]);
      $h_electricity = trim($_POST["h_electricity"]);
      $h_fine = trim($_POST["h_fine"]);
      $h_other_charges = trim($_POST["h_other_charges"]);

      $update_h_fee = new database();
      $updated = $update_h_fee->udpate("fee", ["h_admin_fee" => $h_admin_fee, "h_fee" => $hostel_fee, "h_security" => $hostel_security, "h_charges" => $h_charges, "h_electricity" => $h_electricity, "h_fine" => $h_fine, "h_other"=>$h_other_charges ], "id = 2");

        if($updated){
            header("location: http://localhost/lakkiHostel/back/applications.php");
        }
    }
?>