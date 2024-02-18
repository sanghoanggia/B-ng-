<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Câu Lạc Bộ</title>
    <!-- Thêm CSS cho trang editCLB.php nếu cần -->
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
        $maCLB = $_POST["maCLB"];
        $tenCLB = $_POST["tenCLB"];
        $maGiaiDau = $_POST["maGiaiDau"];
        $moTa = $_POST["moTa"];
        $sanNha = $_POST["sanNha"];
        $hinhAnh = $_POST["hinhAnh"];
        $soTran = $_POST["soTran"];
        $hieuSo = $_POST["hieuSo"];
        $soDiem = $_POST["soDiem"];

        // Cập nhật dữ liệu trong cơ sở dữ liệu
        $query = "UPDATE CauLacBo SET TenCLB='$tenCLB', MaGiaiDau=$maGiaiDau, MoTa='$moTa', SanNha='$sanNha', HinhAnh='$hinhAnh', SoTran=$soTran, HieuSo=$hieuSo, SoDiem=$soDiem WHERE MaCLB=$maCLB";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật dữ liệu thành công!');</script>";
            echo "<script>window.location.href = 'CauLacBo.php';</script>";
        } else {
            echo "<script>alert('Cập nhật dữ liệu thất bại: " . $conn->error . "');</script>";
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
        $result = $conn->query("SELECT * FROM CauLacBo WHERE MaCLB=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tenCLB = $row["TenCLB"];
            $maGiaiDau = $row["MaGiaiDau"];
            $moTa = $row["MoTa"];
            $sanNha = $row["SanNha"];
            $hinhAnh = $row["HinhAnh"];
            $soTran = $row["SoTran"];
            $hieuSo = $row["HieuSo"];
            $soDiem = $row["SoDiem"];
        } else {
            echo "<script>alert('Không có dữ liệu');</script>";
            exit();
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <h1>Sửa Câu Lạc Bộ</h1>
    <form method="post" action="">
        <input type="hidden" name="maCLB" value="<?php echo $id; ?>">
        <!-- Thêm các trường nhập liệu cho việc sửa Câu Lạc Bộ -->
        <label for="tenCLB">Tên CLB:</label>
        <input type="text" name="tenCLB" value="<?php echo $tenCLB; ?>" required><br>

        <label for="maGiaiDau">Mã Giải Đấu:</label>
        <input type="number" name="maGiaiDau" value="<?php echo $maGiaiDau; ?>" required><br>

        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa" required><?php echo $moTa; ?></textarea><br>

        <label for="sanNha">Sân Nhà:</label>
        <input type="text" name="sanNha" value="<?php echo $sanNha; ?>" required><br>

        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="text" name="hinhAnh" value="<?php echo $hinhAnh; ?>"><br>

        <label for="soTran">Số Trận:</label>
        <input type="number" name="soTran" value="<?php echo $soTran; ?>"><br>

        <label for="hieuSo">Hiệu Số:</label>
        <input type="number" name="hieuSo" value="<?php echo $hieuSo; ?>"><br>

        <label for="soDiem">Số Điểm:</label>
        <input type="number" name="soDiem" value="<?php echo $soDiem; ?>"><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body