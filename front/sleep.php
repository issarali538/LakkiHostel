<?php
include "./header.php";
$roll_no = $_GET['roll_no'];
$subject = $_GET['subject'];
$deptt = $_GET['deptt'];
$seme = $_GET['seme'];
$std = new database();
$std->special_slct("std", ["name, fname, seme,subject"], null, "roll_no = $roll_no AND subject = '$subject' AND deptt = '$deptt' AND seme = '$seme'", null, null);
$result = $std->results();
foreach ($result as $key => $value) {
    foreach ($value as $key1 => $value1) {
        $name = $value1["name"];
        $fname = $value1['fname'];
        $subject = $value1['subject'];
        $seme = $value1['seme'];
    }
}
?>
<div class="container">
    <div class="row my-1" id="sleepDownload">
        <div class="col-12 text-right"><button class="btn btn-sm btn-success" id="printBtn">Print</button></div>
        <?php
        for ($i = 1; $i <= 3; $i++) {
        ?>
            <div class="col-4 mt-2 border">
                <div class="text-center">
                    <h4 class="text-primary">
                        GOVT. POST GRADUATE COLLEGE LAKKI MARWAT
                    </h4>
                    <h5>The Bank of khyber LAKKI MARWAT</h5>
                    <span>Branch Code: 0173</span><br>
                    <span>Acount No# 385009</span><br>
                    <span>DATED: <?php echo date("d / m / Y") ?></span><br>
                    <div>Name of Depositor : <b class="border-bottom border-dark"><?php echo $name ?></b></div>
                    <div>Father Nama : <b class="border-bottom border-dark"><?php echo $fname ?></b></div>
                    <div>Class : <b class="border-bottom border-dark">Bs <?php echo $subject ?></b></div>
                    <div>Seme : <b><?php echo $seme ?></b></div>
                </div>
                <div>
                    <!-- All  values of the fee table  -->
                    <?php
                    $fee_table_val = new database();
                    $fee_table_val->only_slct("fee");
                    $result1 = $fee_table_val->results();
                    foreach ($result1 as $key => $value) {
                        foreach ($value as $key1 => $value1) {
                            $h_admin_fee = $value1["h_admin_fee"];
                            $h_fee = $value1["h_fee"];
                            $h_security = $value1["h_security"];
                            $h_charges = $value1["h_charges"];
                            $h_electricity = $value1["h_electricity"];
                            $h_fine = $value1["h_fine"];
                            $h_other = $value1["h_other"];
                            $total = $h_admin_fee + $h_fee + $h_security + $h_charges + $h_electricity + $h_fine + $h_other;
                        }
                    }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">PARTICULAR</th>
                                <th scope="col">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Hostel Admin: Fee</td>
                                <td><?php echo $h_admin_fee; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Hostel Fee</td>
                                <td><?php echo $h_fee; ?></td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>Hostel Security</td>
                                <td><?php echo $h_security; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Hostel Charges</td>
                                <td><?php echo $h_charges; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Hostel Elect:</td>
                                <td><?php echo $h_electricity; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Fine</td>
                                <td><?php echo $h_fine; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Other</td>
                                <td><?php echo $h_other; ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $total; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.printarea.js"></script>
<script>
$(document).ready(()=>{
    $("#printBtn").on("click", ()=>{
        var mode = 'iframe';
        var close = mode == 'popup';
        var option = {mode : mode, popClose : close};
        $("#sleepDownload").printArea(option);
    });
});
</script>