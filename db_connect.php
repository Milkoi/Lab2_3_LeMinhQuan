<?php
$host = "localhost";
$dbname = "buoi2_php";
$username = "root";
$password = ""; 

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    //báo lỗi pdo
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo "Hệ thống đang bảo trì, vui lòng quay lại sau";
    exit;
}
