<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Trận Đấu</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
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
        $maTranDau = $_POST["maTranDau"];
        $maGiaiDau = $_POST["maGiaiDau"];
        $ngayDienRa = $_POST["ngayDienRa"];
        $maCLBChuNha = $_POST["maCLBChuNha"];
        $maCLBKhach = $_POST["maCLBKhach"];
        $banthangnha = $_POST["banthangnha"];
        $banthangkhach = $_POST["banthangkhach"];

        // Cập nhật dữ liệu trong cơ sở dữ liệu
        $query = "UPDATE TranDau SET MaGiaiDau=$maGiaiDau, NgayDienRa='$ngayDienRa', MaCLBChuNha=$maCLBChuNha, MaCLBKhach=$maCLBKhach, banthangnha=$banthangnha, banthangkhach=$banthangkhach WHERE MaTranDau=$maTranDau";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật dữ liệu thành công!'); window.location.href = 'TranDau.php';</script>";
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
        $result = $conn->query("SELECT * FROM TranDau WHERE MaTranDau=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $maGiaiDau = $row["MaGiaiDau"];
            $ngayDienRa = $row["NgayDienRa"];
            $maCLBChuNha = $row["MaCLBChuNha"];
            $maCLBKhach = $row["MaCLBKhach"];
            $banthangnha = $row["banthangnha"];
            $banthangkhach = $row["banthangkhach"];

            // Fetch team names
            $queryCLBChuNha = "SELECT TenCLB FROM CauLacBo1 WHERE MaCLB = $maCLBChuNha";
            $resultCLBChuNha = $conn->query($queryCLBChuNha);

            if ($resultCLBChuNha->num_rows > 0) {
                $rowCLBChuNha = $resultCLBChuNha->fetch_assoc();
                $tenCLBChuNha = $rowCLBChuNha['TenCLB'];
            }

            $queryCLBKhach = "SELECT TenCLB FROM CauLacBo1 WHERE MaCLB = $maCLBKhach";
            $resultCLBKhach = $conn->query($queryCLBKhach);

            if ($resultCLBKhach->num_rows > 0) {
                $rowCLBKhach = $resultCLBKhach->fetch_assoc();
                $tenCLBKhach = $rowCLBKhach['TenCLB'];
            }
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <h1>Sửa Trận Đấu</h1>
    <form method="post" action="">
        <input type="hidden" name="maTranDau" value="<?php echo $id; ?>">

        <label for="maGiaiDau">Mã Giải Đấu:</label>
        <input type="number" name="maGiaiDau" value="<?php echo $maGiaiDau; ?>" required><br>

        <label for="ngayDienRa">Ngày Diễn Ra:</label>
        <input type="date" name="ngayDienRa" value="<?php echo $ngayDienRa; ?>" required><br>

        <label for="maCLBChuNha">Mã CLB Chủ Nhà:</label>
        <input type="number" name="maCLBChuNha" value="<?php echo $maCLBChuNha; ?>" required><br>

        <label for="maCLBKhach">Mã CLB Khách:</label>
        <input type="number" name="maCLBKhach" value="<?php echo $maCLBKhach; ?>" required><br>

        <label for="banthangnha">Bàn Thắng Nhà:</label>
        <input type="number" name="banthangnha" value="<?php echo $banthangnha; ?>" required><br>

        <label for="banthangkhach">Bàn Thắng Khách:</label>
        <input type="number" name="banthangkhach" value="<?php echo $banthangkhach; ?>" required><br>

        <!-- Display team names -->
        <label for="tenCLBChuNha">Tên CLB Chủ Nhà:</label>
        <input type="text" name="tenCLBChuNha" value="<?php echo $tenCLBChuNha; ?>" readonly><br>

        <label for="tenCLBKhach">Tên CLB Khách:</label>
        <input type="text" name="tenCLBKhach" value="<?php echo $tenCLBKhach; ?>" readonly><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>