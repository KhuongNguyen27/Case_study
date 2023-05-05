<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    $id = $_GET['Id'];
    $sql = "SELECT * FROM staff WHERE ID ='$id'";
    $mysql = $conn->query($sql);
    $mysql->setFetchMode(PDO :: FETCH_ASSOC);
    $rows = $mysql->fetchAll();
    $rows = $rows[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_staff = $_POST['name_staff'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_of_start = $_POST['date_of_start'];
        $slary = $_POST['slary'];
        $sql = "UPDATE staff SET name_staff = '$name_staff', date_of_birth = '$date_of_birth', date_of_start = '$date_of_start', slary = '$slary' WHERE ID = $id ";

        

        try {
            $conn->query($sql);
            $sql = "UPDATE staff SET name_staff = $name_staff, date_of_birth = $date_of_birth, date_of_start = $date_of_start, slary = $slary WHERE ID = $id ";
            $Time = date('Y-m-d H:i:s');
            $home = "INSERT INTO home(TableChange,Record,Time) VALUES('staff','$sql','$Time')";
            $mysql = $conn->query($home);
            header("Location: staff.php");
        }catch(Exception $e) {
            echo "Error: <br>" . $sql . "<br>Please contact admin to fix problem";
}
}
?>
<div id="wrapper">
        <?php include '../include_part/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once '../include_part/nav.php';?>
                <form style = 'margin-left:15px;' action='' method = 'POST'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name='name_staff' value="<?php echo $rows['name_staff']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date of birth</label>
                        <input type="text" class="form-control" name='date_of_birth' value="<?php echo $rows['date_of_birth']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date of start</label>
                        <input type="text" class="form-control" name='date_of_start' value="<?php echo $rows['date_of_start']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Slary</label>
                        <input type="text" class="form-control" name='slary' value="<?php echo $rows['slary']?>">
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