<?php
// Include file connectdb.php
include 'connectdb.php';

// Kiểm tra nếu bảng chưa tồn tại
$table_name = "b1909899_qlsv"; // Đặt tên bảng của bạn ở đây
if ($conn->query("SHOW TABLES LIKE '$table_name'")->num_rows == 0) {
    // Tạo bảng masv_cua_ban_qlsv nếu chưa tồn tại
    $sql = "CREATE TABLE $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ho_ten VARCHAR(255) NOT NULL,
        nam_sinh INT NOT NULL,
        email VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tạo bảng thành công! <a href='index.php'>Trở về trang chính</a>";
    } else {
        echo "Lỗi khi tạo bảng: " . $conn->error;
    }
} else {
    // Bảng đã tồn tại, không cần tạo lại
    echo "Bảng đã tồn tại! <a href='index.php'>Trở về trang chính</a>";
}

$conn->close();
?>
