<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cơ Sở Dữ Liệu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .table-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .table-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .table-card:hover {
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: #333;
        }

        h2 {
            color: #007bff;
        }

        p {
            color: #555;
        }
    </style>
</head>

<body>
    <h1>Thông Tin Cơ Sở Dữ Liệu</h1>

    <div class="table-container">

        <?php
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Tên các bảng bạn muốn hiển thị thông tin
        $tableNames = ['GiaiDau', 'CauLacBo',  'TranDau', 'SuKien',  'NhanVienToChuc', 'Admin', 'Message', 'CauThu']; // Thêm các bảng khác nếu cần

        foreach ($tableNames as $tableName) {
            // Truy vấn để lấy số lượng bản ghi trong bảng
            $query = "SELECT COUNT(*) AS count FROM $tableName";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $recordCount = $row["count"];
            } else {
                $recordCount = 0;
            }

            // Hiển thị thông tin trên trang HTML
            // Hiển thị thông tin trên trang HTML
            echo "<div class='table-card'>";
            echo "<a href='$tableName.php'>";
            echo "<h2>Bảng $tableName</h2>";
            echo "<p>Số lượng: <strong>$recordCount</strong></p>";
            echo "</a>";
            echo "</div>";
        }

        // Đóng kết nối cơ sở dữ liệu
        $conn->close();
        ?>

    </div>
</body>

</html>