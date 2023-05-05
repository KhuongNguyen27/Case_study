<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    $id = $_GET['Id'];
    $file = $_GET['file'];
    // Câu truy vấn lấy dữ liệu
    $sql = "SELECT * FROM user WHERE ID = '$id'";
    // $mysql là đối tượng PDO chứa kết quả truy vấn trả về sau khi thực hiện (query) cây truy vấn
    $mysql = $conn->query($sql);
    // thiết lập trả về bằng mảng liên kết
    $mysql->setFetchMode(PDO :: FETCH_ASSOC);
    // trả về toàng bộ mảng liên kết vào biến rows
    $rows = $mysql->fetchAll();
    // chuyển mảng liên kết 2 chiều thành mảng liên kết 1 chiều 
    $rows = $rows[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $date_of_birth = $_POST['date_of_birth'];
        $address = $_POST['address'];
        $CCCD = $_POST['CCCD'];
        $sql = "UPDATE user SET user = '$user', date_of_birth = '$date_of_birth', address = '$address', CCCD = '$CCCD' WHERE ID = $id ";
        
        
        try {
            $conn->query($sql);
            $sql = "UPDATE user SET user = $user, date_of_birth = $date_of_birth, address = $address, CCCD = $CCCD WHERE ID = $id ";
            $Time = date('Y-m-d H:i:s');
            $home = "INSERT INTO home(TableChange,Record,Time) VALUES('$file','$sql','$Time')";
            $mysql = $conn->query($home);
            header("Location: user.php");
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
                        <label for="formGroupExampleInput" class="form-label">User</label>
                        <input type="text" class="form-control" name='user' value="<?php echo $rows['user'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date_of_birth</label>
                        <input type="text" class="form-control" name='date_of_birth' value="<?php echo $rows['date_of_birth']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Address</label>
                        <input type="text" class="form-control" name='address' value="<?php echo $rows['address']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">CCCD</label>
                        <input type="text" class="form-control" name='CCCD' value="<?php echo $rows['CCCD']?>">
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