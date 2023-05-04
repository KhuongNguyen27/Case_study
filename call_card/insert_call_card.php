<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name_book_id = $_GET['name_book_id'];
    $user_id = $_GET['user_id'];
    $staff_id = $_GET['staff_id'];
    $date_borrow = $_GET['date_borrow'];
    $date_return = $_GET['date_return'];
    $sql = "INSERT INTO call_card (name_book_id,user_id,staff_id,date_borrow,date_return) VALUES ('$name_book_id','$user_id','$staff_id','$date_borrow','$date_return')";
    if ($conn->query($sql) !== FALSE) {
        header("Location: call_card.php");
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
                        <label for="formGroupExampleInput" class="form-label">Book Id</label>
                        <input type="text" class="form-control" name='name_book_id' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User id</label>
                        <input type="text" class="form-control" name='user_id' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Staff id</label>
                        <input type="text" class="form-control" name='staff_id' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date borrow</label>
                        <input type="text" class="form-control" name='date_borrow' placeholder="YY-MM-DD">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date return</label>
                        <input type="text" class="form-control" name='date_return' placeholder="YY-MM-DD">
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