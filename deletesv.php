<!DOCTYPE html>
<html>
<head>
    <title>Xóa Sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c82333;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Xóa Sinh viên</h1>
    <?php
        // Include file connectdb.php
        include 'connectdb.php';

        // Xử lý dữ liệu khi người dùng gửi biểu mẫu
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ten_to_delete = $_POST["ten_to_delete"];

            // Thực hiện truy vấn DELETE để xóa sinh viên dựa trên tên
            $sql = "DELETE FROM b1909899_qlsv WHERE ho_ten='$ten_to_delete'";

            if ($conn->query($sql) === TRUE) {
                echo "Xóa thành công! <a href='index.php'>Trở về trang chính</a>";
            } else {
                echo "Lỗi khi xóa: " . $conn->error;
            }
        }
    ?>

    <form method="post" action="">
        <label for="ten_to_delete">Nhập tên của Sinh viên cần xóa:</label>
        <input type="text" id="ten_to_delete" name="ten_to_delete" required><br>

        <input type="submit" value="Xóa">
    </form>
    <a href="index.php">Trở về trang chính</a>
</body>
</html>

