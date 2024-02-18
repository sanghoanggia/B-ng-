<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Trận Đấu</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        select,
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
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
        $ngayDienRa = $_POST["ngayDienRa"];
        $maCLBChuNha = $_POST["maCLBChuNha"];
        $maCLBKhach = $_POST["maCLBKhach"];

        $maCLBChuNha1 = $_POST["maCLBChuNha"];
        $maCLBKhach1 = $_POST["maCLBKhach"];

        $banthangnha = $_POST["banthangnha"];
        $banthangkhach = $_POST["banthangkhach"];

        // Thực hiện truy vấn SELECT để lấy các giá trị cần thiết
        $queryGiaiDau = "SELECT MaGiaiDau FROM GiaiDau WHERE TenGiaiDau = '$maGiaiDau'";
        $resultGiaiDau = $conn->query($queryGiaiDau);

        if ($resultGiaiDau->num_rows > 0) {
            $rowGiaiDau = $resultGiaiDau->fetch_assoc();
            $maGiaiDau = $rowGiaiDau['MaGiaiDau'];

            $queryCLBChuNha = "SELECT MaCLB FROM CauLacBo1 WHERE TenCLB = '$maCLBChuNha'";
            $resultCLBChuNha = $conn->query($queryCLBChuNha);

            if ($resultCLBChuNha->num_rows > 0) {
                $rowCLBChuNha = $resultCLBChuNha->fetch_assoc();
                $maCLBChuNha = $rowCLBChuNha['MaCLB'];

                $queryCLBKhach = "SELECT MaCLB FROM CauLacBo1 WHERE TenCLB = '$maCLBKhach'";
                $resultCLBKhach = $conn->query($queryCLBKhach);


                if ($resultCLBKhach->num_rows > 0) {
                    $rowCLBKhach = $resultCLBKhach->fetch_assoc();
                    $maCLBKhach = $rowCLBKhach['MaCLB'];

                    // Thực hiện truy vấn INSERT
                    $queryInsert = "INSERT INTO TranDau (MaGiaiDau, NgayDienRa, MaCLBChuNha, MaCLBKhach, banthangnha, banthangkhach) VALUES ($maGiaiDau, '$ngayDienRa', $maCLBChuNha, $maCLBKhach, $banthangnha, $banthangkhach)";
                    $conn->query($queryInsert);

                    // Update số trận
                    $soTranQueryChuNha = "UPDATE CauLacBo1 SET SoTran = SoTran + 1 WHERE CauLacBo1.TenCLB = '$maCLBChuNha1'";
                    $conn->query($soTranQueryChuNha);

                    $soTranQueryKhach = "UPDATE CauLacBo1 SET SoTran = SoTran + 1 WHERE CauLacBo1.TenCLB = '$maCLBKhach1'";
                    $conn->query($soTranQueryKhach);

                    // Update hiệu số
                    $hieuSoQueryChuNha = "UPDATE CauLacBo1 SET HieuSo = HieuSo + $banthangnha - $banthangkhach WHERE CauLacBo1.TenCLB = '$maCLBChuNha1'";
                    $conn->query($hieuSoQueryChuNha);

                    $hieuSoQueryKhach = "UPDATE CauLacBo1 SET HieuSo = HieuSo - $banthangnha + $banthangkhach WHERE CauLacBo1.TenCLB = '$maCLBKhach1'";
                    $conn->query($hieuSoQueryKhach);


                    // bàn thắng nhà
                    $hieuSoQuerybanthang = "UPDATE CauLacBo1 SET banthang = banthang + $banthangnha WHERE CauLacBo1.TenCLB = '$maCLBChuNha1'";
                    $conn->query($hieuSoQuerybanthang);

                    $hieuSoQuerybanthua = "UPDATE CauLacBo1 SET banthua = banthua + $banthangkhach WHERE CauLacBo1.TenCLB = '$maCLBChuNha1'";
                    $conn->query($hieuSoQuerybanthua);

                    // Update bàn thua nhà
                    $hieuSoQuerybanthangkhach = "UPDATE CauLacBo1 SET banthang = banthang + $banthangkhach WHERE CauLacBo1.TenCLB = '$maCLBKhach1'";
                    $conn->query($hieuSoQuerybanthangkhach);

                    $hieuSoQuerybanthuakhach = "UPDATE CauLacBo1 SET banthua = banthua + $banthangnha WHERE CauLacBo1.TenCLB = '$maCLBKhach1'";
                    $conn->query($hieuSoQuerybanthuakhach);

                    // Cập nhật điểm
                    if ($banthangnha > $banthangkhach) {
                        $diemQueryChuNha = "UPDATE CauLacBo1 SET SoDiem = SoDiem + 3 WHERE TenCLB = '$maCLBChuNha1'";
                        $conn->query($diemQueryChuNha);
                    } else if ($banthangnha == $banthangkhach) {
                        $diemQueryChuNha = "UPDATE CauLacBo1 SET SoDiem = SoDiem + 1 WHERE TenCLB = '$maCLBChuNha1'";
                        $conn->query($diemQueryChuNha);

                        $diemQueryKhach = "UPDATE CauLacBo1 SET SoDiem = SoDiem + 1 WHERE TenCLB = '$maCLBKhach1'";
                        $conn->query($diemQueryKhach);
                    } else {
                        $diemQueryKhach = "UPDATE CauLacBo1 SET SoDiem = SoDiem + 3 WHERE TenCLB = '$maCLBKhach1'";
                        $conn->query($diemQueryKhach);
                    }


                    // Kiểm tra và xử lý lỗi nếu cần
                    if ($conn->error) {
                        echo "Error: " . $queryInsert . "<br>" . $conn->error;
                    } else {
                        echo "<script>alert('Thêm dữ liệu thành công!'); window.location.href = 'TranDau.php';</script>";
                    }
                } else {
                    echo "Không tìm thấy CLB Khách có tên là '$maCLBKhach'";
                }
            } else {
                echo "Không tìm thấy CLB Nhà có tên là '$maCLBChuNha'";
            }
        } else {
            echo "Không tìm thấy Giải Đấu có tên là '$maGiaiDau'";
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <h1>Thêm Trận Đấu</h1>
    <form method="post" action="">
        <label for="maGiaiDau">Chọn Giải Đấu:</label>
        <select name="maGiaiDau" required>
            <?php
            // Kết nối với cơ sở dữ liệu và truy vấn danh sách tên giải đấu
            $host = 'localhost:4307';
            $dbname = 'football';
            $username = 'root';
            $password = '';

            $conn = new mysqli($host, $username, $password, $dbname);
            $query = "SELECT TenGiaiDau FROM GiaiDau";
            $result = $conn->query($query);

            // Kiểm tra và hiển thị danh sách tên giải đấu trong dropdown list
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['TenGiaiDau'] . "'>" . $row['TenGiaiDau'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br>

        <label for="ngayDienRa">Ngày Diễn Ra:</label>
        <input type="date" name="ngayDienRa" required><br>

        <label for="maCLBChuNha">Chọn CLB Nhà:</label>
        <select name="maCLBChuNha" required>
            <?php
            // Kết nối với cơ sở dữ liệu và truy vấn danh sách tên giải đấu
            $host = 'localhost:4307';
            $dbname = 'football';
            $username = 'root';
            $password = '';

            $conn = new mysqli($host, $username, $password, $dbname);
            $query = "SELECT TenCLB FROM CauLacBo1";
            $result = $conn->query($query);

            // Kiểm tra và hiển thị danh sách tên giải đấu trong dropdown list
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['TenCLB'] . "'>" . $row['TenCLB'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br>

        <label for="maCLBKhach">Chọn CLB Khách:</label>
        <select name="maCLBKhach" required>
            <?php
            // Kết nối với cơ sở dữ liệu và truy vấn danh sách tên giải đấu
            $host = 'localhost:4307';
            $dbname = 'football';
            $username = 'root';
            $password = '';

            $conn = new mysqli($host, $username, $password, $dbname);
            $query = "SELECT TenCLB FROM CauLacBo1";
            $result = $conn->query($query);

            // Kiểm tra và hiển thị danh sách tên giải đấu trong dropdown list
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['TenCLB'] . "'>" . $row['TenCLB'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br>

        <label for="banthangnha">
            Bàn Thắng Nhà:</label>
        <input type="number" name="banthangnha" required><br>

        <label for="banthangkhach">Bàn Thắng Khách:</label>
        <input type="number" name="banthangkhach" required><br>

        <input type="submit" value="Thêm">
    </form>
</body>

</html>