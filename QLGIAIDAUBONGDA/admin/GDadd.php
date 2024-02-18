<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Giải Đấu</title>
    <!-- Thêm CSS cho trang addGiaiDau.php nếu cần -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;

            margin: 0 0 20px;
            /* Thêm margin ở dưới */


        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <?php
    // Kiểm tra nếu biểu mẫu đã được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kết nối đến cơ sở dữ liệu
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Lấy dữ liệu từ biểu mẫu
        $tenGiaiDau = $_POST["tenGiaiDau"];
        $moTa = $_POST["moTa"];
        $soDoi = $_POST["soDoi"];
        $diaDiem = $_POST["diaDiem"];
        $hinhAnh = $_POST["hinhAnh"];

        // Thêm dữ liệu vào cơ sở dữ liệu
        $query = "INSERT INTO GiaiDau (TenGiaiDau, MoTa, SoDoi, DiaDiem, HinhAnh) VALUES ('$tenGiaiDau', '$moTa', $soDoi, '$diaDiem', '$hinhAnh')";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Thêm dữ liệu thành công!'); window.location.href = 'GiaiDau.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <h1>Thêm Giải Đấu</h1>
    <form method="post" action="">
        <label for="tenGiaiDau">Tên Giải Đấu:</label>
        <input type="text" name="tenGiaiDau" required><br>

        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa" required></textarea><br>

        <label for="soDoi">Số Đội:</label>
        <input type="number" name="soDoi" required><br>

        <label for="diaDiem">Địa Điểm:</label>
        <input type="text" name="diaDiem"><br>

        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="file" name="hinhAnh" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>

        <input type="submit" value="Thêm">
    </form>
</body>

</html>