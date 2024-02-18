<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu lạc bộ</title>
    <link rel="stylesheet" href="css/styleclb.css">
</head>

<body>
    <?php
    include 'components/user_header.php';
    include('admincp/config/config.php');

    // Kiểm tra nếu có tham số MaCLB được truyền từ URL
    if (isset($_GET['MaCLB'])) {
        $maCLB = $_GET['MaCLB'];

        // Truy vấn thông tin của câu lạc bộ dựa trên MaCLB
        $queryCLB = "SELECT * FROM CauLacBo WHERE MaCLB = $maCLB";
        $resultCLB = $conn->query($queryCLB);

        // Hiển thị thông tin chi tiết của câu lạc bộ
        if ($resultCLB->num_rows > 0) {
            $rowCLB = $resultCLB->fetch_assoc();
            echo "<div class='container'>";
            echo "<img src='images/" . $rowCLB['HinhAnh'] . "' alt='Logo CLB'>";
            echo "<h2>Thông tin chi tiết của câu lạc bộ</h2>";
            echo "<div>";
            echo "<h3>" . $rowCLB['TenCLB'] . "</h3>";
            echo "<p>Mô tả: " . $rowCLB['MoTa'] . "</p>";
            echo "<p>Sân nhà: " . $rowCLB['SanNha'] . "</p>";
            // Hiển thị các thông tin khác của câu lạc bộ từ bảng CauLacBo
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Không tìm thấy thông tin cho câu lạc bộ này.</p>";
        }
    } else {
        echo "<p>Không có mã câu lạc bộ được chọn.</p>";
    }
    ?>
</body>

</html>