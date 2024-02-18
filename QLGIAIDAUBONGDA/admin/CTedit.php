<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Cầu Thủ</title>
    <!-- Thêm CSS cho trang editCauThu.php nếu cần -->
</head>

<body>
    <?php
    // Kiểm tra nếu biểu mẫu đã được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $maCauThu = $_POST["maCauThu"];
        $tenCauThu = $_POST["tenCauThu"];
        $maCLB = $_POST["maCLB"];
        $viTri = $_POST["viTri"];
        $ngaySinh = $_POST["ngaySinh"];
        $clbNow = $_POST["clbNow"];
        $clbOld = $_POST["clbOld"];
        $anh = $_POST["anh"];
        $queQuan = $_POST["queQuan"];
        $moTa = $_POST["moTa"];

        $query = "UPDATE CauThu SET TenCauThu='$tenCauThu', MaCLB=$maCLB, ViTri='$viTri', NgaySinh='$ngaySinh', CLB_now='$clbNow', CLB_old='$clbOld', anh='$anh', QueQuan='$queQuan', MoTa='$moTa' WHERE MaCauThu=$maCauThu";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật dữ liệu thành công!'); window.location.href = 'CauThu.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }

    // Kiểm tra nếu có tham số id được truyền
    if (isset($_GET['id'])) {
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM CauThu WHERE MaCauThu=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tenCauThu = $row["TenCauThu"];
            $maCLB = $row["MaCLB"];
            $viTri = $row["ViTri"];
            $ngaySinh = $row["NgaySinh"];
            $clbNow = $row["CLB_now"];
            $clbOld = $row["CLB_old"];
            $anh = $row["anh"];
            $queQuan = $row["QueQuan"];
            $moTa = $row["MoTa"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        $conn->close();
    }
    ?>

    <h1>Sửa Cầu Thủ</h1>
    <form method="post" action="">
        <input type="hidden" name="maCauThu" value="<?php echo $id; ?>">
        <label for="tenCauThu">Tên Cầu Thủ:</label>
        <input type="text" name="tenCauThu" value="<?php echo $tenCauThu; ?>" required><br>

        <label for="maCLB">Mã CLB:</label>
        <input type="number" name="maCLB" value="<?php echo $maCLB; ?>" required><br>

        <label for="viTri">Vị Trí:</label>
        <input type="text" name="viTri" value="<?php echo $viTri; ?>"><br>

        <label for="ngaySinh">Ngày Sinh:</label>
        <input type="date" name="ngaySinh" value="<?php echo $ngaySinh; ?>" required><br>

        <label for="clbNow">CLB Hiện Tại:</label>
        <input type="text" name="clbNow" value="<?php echo $clbNow; ?>"><br>

        <label for="clbOld">CLB Trước Đó:</label>
        <input type="text" name="clbOld" value="<?php echo $clbOld; ?>"><br>

        <label for="anh">Ảnh:</label>
        <input type="text" name="anh" value="<?php echo $anh; ?>"><br>

        <label for="queQuan">Quê Quán:</label>
        <input type="text" name="queQuan" value="<?php echo $queQuan; ?>"><br>

        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa"><?php echo $moTa; ?></textarea><br>

        <input type="submit" value="Cập Nhật">
    </form>