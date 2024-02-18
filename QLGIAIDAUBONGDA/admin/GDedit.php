<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Giải Đấu</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    h1 {
        color: #333;
    }

    form {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin: 10px 0;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
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
        $maGiaiDau = $_POST["maGiaiDau"];
        $tenGiaiDau = $_POST["tenGiaiDau"];
        $moTa = $_POST["moTa"];
        $soDoi = $_POST["soDoi"];
        $diaDiem = $_POST["diaDiem"];
        $hinhAnh = $_POST["hinhAnh"];

        // Cập nhật dữ liệu trong cơ sở dữ liệu
        $query = "UPDATE GiaiDau SET TenGiaiDau='$tenGiaiDau', MoTa='$moTa', SoDoi=$soDoi, DiaDiem='$diaDiem', HinhAnh='$hinhAnh' WHERE MaGiaiDau=$maGiaiDau";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật dữ liệu thành công!'); window.location.href = 'GiaiDau.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    }

    // Kiểm tra nếu có tham số id được truyền
    if (isset($_GET['id'])) {
        // Kết nối đến cơ sở dữ liệu
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Lấy dữ liệu từ cơ sở dữ liệu dựa trên ID
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM GiaiDau WHERE MaGiaiDau=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tenGiaiDau = $row["TenGiaiDau"];
            $moTa = $row["MoTa"];
            $soDoi = $row["SoDoi"];
            $diaDiem = $row["DiaDiem"];
            $hinhAnh = $row["HinhAnh"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <h1>Sửa Giải Đấu</h1>
    <form method="post" action="">
        <input type="hidden" name="maGiaiDau" value="<?php echo $id; ?>">
        <label for="tenGiaiDau">Tên Giải Đấu:</label>
        <input type="text" name="tenGiaiDau" value="<?php echo $tenGiaiDau; ?>" required><br>

        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa" required><?php echo $moTa; ?></textarea><br>

        <label for="soDoi">Số Đội:</label>
        <input type="number" name="soDoi" value="<?php echo $soDoi; ?>" required><br>

        <label for="diaDiem">Địa Điểm:</label>
        <input type="text" name="diaDiem" value="<?php echo $diaDiem; ?>"><br>

        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="file" name="hinhAnh" class="box" accept="image/jpg, image/jpeg, image/png, image/webp"
            required><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>