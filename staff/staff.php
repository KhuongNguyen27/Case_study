
<?php include_once '../db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title iconv = 'https://icons8.com/icon/99033/library'> Manager Library</title>
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php 
            include '../include_part/sidebar.php'
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php 
                    include_once '../include_part/nav.php';
                ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <?php
                $sql = "SELECT * FROM staff";
                $mysql = $conn->query($sql);
                $mysql->setFetchMode( PDO :: FETCH_ASSOC);
                $rows = $mysql->fetchAll();
                ?>	
                <table  class ='table table-striped table-hover'>
                    <tr>
                        <th>ID</th>
                        <th>name_staff</th>
                        <th>date_of_birth</th>
                        <th>date_of_start</th>
                        <th>slary</th>
                        <th></th>
                        <th></th>
                    <tr>
                    <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td><?php echo $r['ID']; ?></td>
                        <td><?php echo $r['name_staff']; ?></td>
                        <td><?php echo $r['date_of_birth']; ?></td>
                        <td><?php echo $r['date_of_start']; ?></td>
                        <td><?php echo $r['slary']; ?></td>
                        <td>
                            <a href = "update_staff.php?Id=<?php echo $r['ID'];?>&file=staff" >Edit</a>
                        </td>
                        <td>
                        <a onclick = "return confirm('Are you sure?')"; href="../process/delete.php?Id=<?php echo $r['ID'];?>&file=staff">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>      
                <form style = 'margin-left:15px;' action='insert_staff.php' method = 'POST'>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label  class="col-form-label">Insert new record</label>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                <div>
                </form>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
        </div>
        <?php include_once '../include_part/footer.php'?>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>