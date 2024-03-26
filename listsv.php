<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Sinh viên</title>
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

        .student-info {
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 600px;
            background-color: #fff;
        }

        .student-info p {
            margin: 5px 0;
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
    <h1>Danh sách Sinh viên</h1>
    <div class="student-info">
        <?php
            // Include file connectdb.php
            include 'connectdb.php';        

            // Truy vấn danh sách sinh viên
            $sql = "SELECT id, ho_ten, nam_sinh, email FROM b1909899_qlsv";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row["id"] . " - Họ tên: " . $row["ho_ten"] . " - Năm sinh: " . $row["nam_sinh"] . " - Email: " . $row["email"] . "</p>";
                }
            } else {
                echo "Không có sinh viên nào trong danh sách.";
            }

            $conn->close();
        ?>
    </div>
    <a href="index.php">Trở về trang chính</a>
</body>
</html>

