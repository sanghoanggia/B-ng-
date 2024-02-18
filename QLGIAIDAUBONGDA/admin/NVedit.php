<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
    <!-- Add your CSS styles here if needed -->
</head>

<body>
    <?php
    // Your PHP code for editing records goes here
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $maNhanVien = $_POST["maNhanVien"];
        $tenNhanVien = $_POST["tenNhanVien"];
        $tenViTri = $_POST["tenViTri"];
        $maViTri = $_POST["maViTri"];
        $maGiaiDau = $_POST["maGiaiDau"];

        // Update data in the database
        $query = "UPDATE NhanVienToChuc SET TenNhanVien='$tenNhanVien', TenViTri='$tenViTri', MaViTri=$maViTri, MaGiaiDau=$maGiaiDau WHERE MaNhanVien=$maNhanVien";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật Nhân Viên thành công!'); window.location.href = 'index.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }

    // Check if there's a parameter for the ID
    if (isset($_GET['id'])) {
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the database based on the ID
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM NhanVienToChuc WHERE MaNhanVien=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tenNhanVien = $row["TenNhanVien"];
            $tenViTri = $row["TenViTri"];
            $maViTri = $row["MaViTri"];
            $maGiaiDau = $row["MaGiaiDau"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        $conn->close();
    }
    ?>

    <h1>Sửa Nhân Viên</h1>
    <form method="post" action="">
        <input type="hidden" name="maNhanVien" value="<?php echo $id; ?>">
        <label for="tenNhanVien">Tên Nhân Viên:</label>
        <input type="text" name="tenNhanVien" value="<?php echo $tenNhanVien; ?>" required><br>

        <label for="tenViTri">Tên Vị Trí:</label>
        <input type="text" name="tenViTri" value="<?php echo $tenViTri; ?>" required><br>

        <label for="maViTri">Mã Vị Trí:</label>
        <input type="number" name="maViTri" value="<?php echo $maViTri; ?>" required><br>

        <label for="maGiaiDau">Mã Giải Đấu:</label>
        <input type="number" name="maGiaiDau" value="<?php echo $maGiaiDau; ?>" required><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>