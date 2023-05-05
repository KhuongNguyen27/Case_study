<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $category = $_GET['category'];
    $sql = "INSERT INTO categories (category_book) VALUES ('$category')";
    try {
        $conn->query($sql);
        $sql = "INSERT INTO categories (category_book) VALUES ($category)";
        $Time = date('Y-m-d H:i:s');
        $home = "INSERT INTO home(TableChange,Record,Time) VALUES('categories','$sql','$Time')";
        $mysql = $conn->query($home);
        header("Location: category_book.php");
    }catch(Exception $e){
        echo "Error: <br>" . $sql . "<br>Please contact admin to fix problem";
}
}
?>
<div id="wrapper">
        <?php include_once '../include_part/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once '../include_part/nav.php';?>
                <form style = 'margin-left:15px;' action='' method = 'GET'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name='category' placeholder="Char">
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