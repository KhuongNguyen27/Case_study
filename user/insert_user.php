<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user = $_GET['user'];
    $date_of_birth = $_GET['date_of_birth'];
    $address = $_GET['address'];
    $CCCD = $_GET['CCCD'];
    $sql = "INSERT INTO user (user,date_of_birth,address,CCCD) VALUES ('$user','$date_of_birth','$address','$CCCD')";
    if ($conn->query($sql) !== FALSE) {
        header("Location: user.php");
    } else {
        echo "Error: <br>" . $sql . "<br>Please contact admin to fix problem";
}
}
?>
<div id="wrapper">
        <?php include '../include_part/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once '../include_part/nav.php';?>
                <form style = 'margin-left:15px;' action='' method = 'GET'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User</label>
                        <input type="text" class="form-control" name='user' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date_of_birth</label>
                        <input type="text" class="form-control" name='date_of_birth' placeholder="YY-MM-DD">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Address</label>
                        <input type="text" class="form-control" name='address' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">CCCD</label>
                        <input type="text" class="form-control" name='CCCD' placeholder="BigInt">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>