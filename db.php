<?php
$username = "root";
$password = "";
$dbname = "library";
global $conn;
try {
    $conn = new PDO('mysql:host=localhost;dbname='.$dbname, $username, $password);    
    // echo 'Ket noi thanh cong';
}catch (Exception $e){
    echo __FILE__.'<br>';
    echo 'Khong the ket noi';
}