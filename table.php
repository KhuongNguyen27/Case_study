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
                $sql = "SELECT * FROM home";
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
                <form style = 'margin-left:15px;' action='insert_home.php' method = 'POST'>
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
        
</body>
</html>