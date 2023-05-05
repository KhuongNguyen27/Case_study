<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
                $records_per_page = 5;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $records_per_page;
                $sql = "SELECT * FROM home LIMIT $records_per_page OFFSET $offset";
                $mysql = $conn->query($sql);
                $mysql->setFetchMode( PDO :: FETCH_ASSOC);
                $rows = $mysql->fetchAll();
                ?>
                
                <table  class ='table table-striped table-hover'>
                    <tr>
                        <th>ID</th>
                        <th>TableChange</th>
                        <th>Record</th>
                        <th>Time</th>
                        <th></th>
                    <tr>
                    <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td><?php echo $r['ID']; ?></td>
                        <td><?php echo $r['TableChange']; ?></td>
                        <td><?php echo $r['Record']; ?></td>
                        <td><?php echo $r['Time']; ?></td>
                        <td>
                            <a onclick = "return confirm('Are you sure?')"; href="process/delete.php?Id=<?php echo $r['ID'];?>&file=books">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php
                    $sql_count = "SELECT COUNT(*) as total FROM home";
                    $stmt_count = $conn->query($sql_count);
                    $stmt_count->setFetchMode(PDO::FETCH_ASSOC);
                    $row_count = $stmt_count->fetch();
                    $total_records = $row_count['total'];
                    $total_pages = ceil($total_records / $records_per_page);
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i=1; $i<=$total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i==$current_page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav> 
            </div>
        
</body>
</html>