<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    $id = $_GET['Id'];
    // khởi tạo câu truy vấn
    $sql = "SELECT * FROM call_card WHERE ID = '$id'";
    // khởi tạo đối tượng chứa kết quả trả về 
    $mysql = $conn->query($sql);
    // quy định kiểu trả về (mảng liên kết)
    $mysql->setFetchMode(PDO :: FETCH_ASSOC);
    // Khởi tạo mảng chứa mảng liên kết trả về 
    $rows = $mysql->fetchAll();
    // Lấy giá trị cần thiết
    $rows = $rows[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_book_id = $_POST['name_book_id'];
        $user_id = $_POST['user_id'];
        $staff_id = $_POST['staff_id'];
        $date_borrow = $_POST['date_borrow'];
        $date_return = $_POST['date_return'];
    $sql = "UPDATE call_card SET name_book_id = '$name_book_id', user_id = '$user_id', staff_id = '$staff_id', date_borrow = '$date_borrow' , date_return = '$date_return' WHERE ID = $id ";
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
                <form style = 'margin-left:15px;' action='' method = 'POST'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Book Id</label>
                        <input type="text" class="form-control" name='name_book_id' value="<?php echo $rows['name_book_id']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User id</label>
                        <input type="text" class="form-control" name='user_id' value="<?php echo $rows['user_id']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Staff id</label>
                        <input type="text" class="form-control" name='staff_id' value="<?php echo $rows['staff_id']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date borrow</label>
                        <input type="text" class="form-control" name='date_borrow' value="<?php echo $rows['date_borrow']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date return</label>
                        <input type="text" class="form-control" name='date_return' value="<?php echo $rows['date_return']?>">
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