<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    $id = $_GET['Id'];
    // khởi tạo câu truy vấn
    $sql = "SELECT * FROM categories WHERE ID = '$id'";
    // khởi tạo đối tượng chứa kết quả truy vấn trả về
    $mysql = $conn->query($sql);
    // thiết lập kiểu dữ liệu trả về
    $mysql->setFetchMode(PDO :: FETCH_ASSOC);
    // khởi tạo biến chứa giá trị trả về
    $rows = $mysql->fetchAll();
    // Lấy giá trị cần thiết
    $rows = $rows[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category= $_POST['category'];
    $sql = "UPDATE categories SET category_book = '$category' WHERE ID = $id ";
    try { 
        $conn->query($sql);
        $sql = "UPDATE categories SET category_book = $category WHERE ID = $id ";
        $Time = date('Y-m-d H:i:s');
        $home = "INSERT INTO home(TableChange,Record,Time) VALUES('categories','$sql','$Time')";
        $mysql = $conn->query($home);
        header("Location: category_book.php");
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
                        <label for="formGroupExampleInput" class="form-label">Category</label>
                        <input type="text" class="form-control" name='category' value = "<?php echo $rows['category_book']?>">
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