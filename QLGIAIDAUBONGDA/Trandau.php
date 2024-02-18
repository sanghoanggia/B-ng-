<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin trận đấu</title>
    <link rel="stylesheet" href="css/styletrandau.css">
</head>

<body>
    <?php
    include 'components/user_header.php';
    include('admincp/config/config.php');

    // Kiểm tra nếu có tham số MaTranDau được truyền từ URL
    if (isset($_GET['MaTranDau'])) {
        $maTranDau = $_GET['MaTranDau'];

        // Truy vấn thông tin của trận đấu từ bảng TranDau
        $queryTranDau = "SELECT NgayDienRa,banthangnha,banthangkhach,TranDau.*, CLBChuNha.TenCLB AS TenCLBChuNha, CLBKhach.TenCLB AS TenCLBKhach
        FROM TranDau
        INNER JOIN CauLacBo AS CLBChuNha ON TranDau.MaCLBChuNha = CLBChuNha.MaCLB
        INNER JOIN CauLacBo AS CLBKhach ON TranDau.MaCLBKhach = CLBKhach.MaCLB
        WHERE TranDau.MaTranDau = $maTranDau";
        $resultTranDau = $conn->query($queryTranDau);

        if ($resultTranDau->num_rows > 0) {
            // Lấy thông tin của trận đấu
            $rowTranDau = $resultTranDau->fetch_assoc();

            // Hiển thị thông tin cơ bản về trận đấu
            echo "<div class='container'>";
            echo "<h2>Thông tin trận đấu</h2>";
            echo "<p>Ngày diễn ra: " . $rowTranDau['NgayDienRa'] . "</p>";
            echo "<p>Đội chủ nhà: " . $rowTranDau['TenCLBChuNha'] . "</p>";
            echo "<p>Đội khách: " . $rowTranDau['TenCLBKhach'] . "</p>";
            echo "<p>Kết quả: " . $rowTranDau['banthangnha'] . " - " . $rowTranDau['banthangkhach'] . "</p>";

            // Tiếp theo, bạn có thể thực hiện truy vấn để lấy thông tin chi tiết từ bảng ChiTietTranDau1
            $queryChiTietTranDau = "SELECT * FROM ChiTietTranDau1 WHERE MaTranDau = $maTranDau";
            $resultChiTietTranDau = $conn->query($queryChiTietTranDau);

            if ($resultChiTietTranDau->num_rows > 0) {
                // Lặp qua các thông tin chi tiết và hiển thị
                echo "<h2>Thông tin chi tiết trận đấu</h2>";
                while ($rowChiTietTranDau = $resultChiTietTranDau->fetch_assoc()) {
                    // Hiển thị thông tin từ bảng ChiTietTranDau1
                    echo "<div>";
                    echo "<p>Mã Trận Đấu: " . $rowChiTietTranDau['MaTranDau'] . "</p>";
                    echo "<p>Mô tả: " . $rowChiTietTranDau['Mota'] . "</p>";
                    echo "<img src='images/" . $rowChiTietTranDau['HinhAnh'] . "' alt='Hình Ảnh'>";
                    // Hiển thị các thông tin khác
                    echo "</div>";
                }
            } else {
                echo "<p>Không có thông tin chi tiết cho trận đấu này.</p>";
            }
            echo "</div>";
        } else {
            echo "<p>Không tìm thấy trận đấu.</p>";
        }
    } else {
        echo "<p>Không có mã trận đấu được chọn.</p>";
    }
    ?>
</body>

</html>