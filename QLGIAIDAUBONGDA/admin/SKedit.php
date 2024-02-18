<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sự Kiện</title>
    <!-- Thêm CSS cho trang editSuKien.php nếu cần -->
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
        $maSuKien = $_POST["maSuKien"];
        $tenSuKien = $_POST["tenSuKien"];
        $moTa = $_POST["moTa"];
        $hinhAnh = $_POST["hinhAnh"];
        $maGiaiDau = $_POST["maGiaiDau"];

        // Cập nhật dữ liệu trong cơ sở dữ liệu
        $query = "UPDATE SuKien SET TenSuKien='$tenSuKien', MoTa='$moTa', HinhAnh='$hinhAnh', MaGiaiDau=$maGiaiDau WHERE MaSuKien=$maSuKien";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật sự kiện thành công!'); window.location.href = 'SuKien.php';</script>";
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
        $result = $conn->query("SELECT * FROM SuKien WHERE MaSuKien=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tenSuKien = $row["TenSuKien"];
            $moTa = $row["MoTa"];
            $hinhAnh = $row["HinhAnh"];
            $maGiaiDau = $row["MaGiaiDau"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <h1>Sửa Sự Kiện</h1>
    <form method="post" action="">
        <input type="hidden" name="maSuKien" value="<?php echo $id; ?>">
        <label for="tenSuKien">Tên Sự Kiện:</label>
        <input type="text" name="tenSuKien" value="<?php echo $tenSuKien; ?>" required><br>

        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa"><?php echo $moTa; ?></textarea><br>

        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="text" name="hinhAnh" value="<?php echo $hinhAnh; ?>"><br>

        <label for="maGiaiDau">Mã Giải Đấu:</label>
        <input type="number" name="maGiaiDau" value="<?php echo $maGiaiDau; ?>" required><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>