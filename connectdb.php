<?php
// Thay đổi thông tin kết nối của bạn
$servername = "localhost";
$username = "dang";
$password = "123";
$dbname = "qlsv";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
