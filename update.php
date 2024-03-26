<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật thông tin Sinh viên</title>
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
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <h1>Cập nhật thông tin Sinh viên</h1>
    <?php
    // Include file connectdb.php
    include 'connectdb.php';

    // Xử lý dữ liệu khi người dùng gửi biểu mẫu
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_to_update = $_POST["id_to_update"];
        $new_ho_ten = $_POST["new_ho_ten"];
        $new_nam_sinh = $_POST["new_nam_sinh"];
        $new_email = $_POST["new_email"];

        // Kiểm tra xem tất cả các trường đều rỗng không
        if(empty($new_ho_ten) && empty($new_nam_sinh) && empty($new_email)) {
            echo "Vui lòng điền ít nhất một trường mới để cập nhật.";
        } else {
            // Thực hiện truy vấn UPDATE để cập nhật thông tin sinh viên
            $sql = "UPDATE b1909899_qlsv SET ";
            $set_values = array();

            if(!empty($new_ho_ten)) {
                $set_values[] = "ho_ten='$new_ho_ten'";
            }

            if(!empty($new_nam_sinh)) {
                $set_values[] = "nam_sinh=$new_nam_sinh";
            }

            if(!empty($new_email)) {
                $set_values[] = "email='$new_email'";
            }

            $sql .= implode(", ", $set_values);
            $sql .= " WHERE id=$id_to_update";

            if ($conn->query($sql) === TRUE) {
                echo "Cập nhật thành công! <a href='index.php'>Trở về trang chính</a>";
            } else {
                echo "Lỗi khi cập nhật: " . $conn->error;
            }
        }
    }
?>


    <form method="post" action="">
        <label for="id_to_update">Nhập ID của Sinh viên cần cập nhật:</label>
        <input type="number" id="id_to_update" name="id_to_update" required><br>

        <label for="new_ho_ten">Họ tên mới:</label>
        <input type="text" id="new_ho_ten" name="new_ho_ten" ><br>

        <label for="new_nam_sinh">Năm sinh mới:</label>
        <input type="number" id="new_nam_sinh" name="new_nam_sinh" ><br>

        <label for="new_email">Email mới:</label>
        <input type="email" id="new_email" name="new_email" ><br>

        <input type="submit" value="Cập nhật">
    </form>
    <a href="index.php">Trở về trang chính</a>
</body>
</html>
