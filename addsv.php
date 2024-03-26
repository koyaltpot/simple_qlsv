<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sinh viên mới</title>
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
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
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
    <h1>Thêm Sinh viên mới</h1>
    <?php
        // Include file connectdb.php
        include 'connectdb.php';        

        // Xử lý dữ liệu khi người dùng gửi biểu mẫu
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $ho_ten = $_POST["ho_ten"];
            $nam_sinh = $_POST["nam_sinh"];
            $email = $_POST["email"];

            // Thực hiện truy vấn INSERT để thêm sinh viên vào bảng
            $sql = "INSERT INTO b1909899_qlsv (id, ho_ten, nam_sinh, email) VALUES ('$id', '$ho_ten', $nam_sinh, '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "Thêm thành công! <a href='index.php'>Trở về trang chính</a>";
            } else {
                echo "Lỗi khi thêm: " . $conn->error;
            }
        }
    ?>

    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="ho_ten">Họ tên:</label>
        <input type="text" id="ho_ten" name="ho_ten" required><br>

        <label for="nam_sinh">Năm sinh:</label>
        <input type="number" id="nam_sinh" name="nam_sinh" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Thêm">
    </form>
    <a href="index.php">Trở về trang chính</a>
</body>
</html>
