<?php
// include_once '../db.php';
// try {
//     $id = isset($_GET['Id']) ? $_GET['Id'] : 0;
//     $file = isset($_GET['file']) ? $_GET['file'] : 0;
//     if (is_numeric($id) && $id > 0) {
//         $stmt = $conn->prepare("DELETE FROM $file WHERE Id = $id");
//         $stmt->execute(array($id));
//         header('Location: http://localhost/Case_study/include/index.php');
//         exit();
//     }
// } catch (Exception $e) {
//     echo "DELETE FROM $file WHERE id = $id";
// }
include_once '../db.php';
try {
    $id = isset($_GET['Id']) ? $_GET['Id'] : 0;
    $file = isset($_GET['file']) ? $_GET['file'] : 0;
    if (is_numeric($id) && $id > 0 && in_array($file, ['books', 'call_card', 'categories', 'staff', 'user', 'home'])) {
        $stmt = $conn->prepare("DELETE FROM $file WHERE Id = ?");
        $stmt->execute([$id]);
        $Record = "DELETED FROM $file WHERE Id = $id" ;
        $Time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO home(TableChange,Record,Time) VALUES('$file','$Record','$Time')";
        $mysql = $conn->query($sql);
        switch ($file) {
            case 'books':
                header("Location: http://localhost/Case_study/index.php");  
                break;
            case 'call_card':
                header("Location: http://localhost/Case_study/call_card/call_card.php");  
                break;
            case 'categories':
                header("Location: http://localhost/Case_study/category_book/category_book.php");  
                break;
            case 'staff':
                header("Location: http://localhost/Case_study/staff/staff.php");  
                break;
            case 'user':
                header("Location: http://localhost/Case_study/user/user.php");  
                break;
        }
        exit();
    } else {
        echo "Invalid file or ID";
    }
} catch (Exception $e) {
    echo "Error deleting record: " . $e->getMessage();
}
?>
