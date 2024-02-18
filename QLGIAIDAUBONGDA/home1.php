<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Giải đấu</title>
    <link rel="stylesheet" href="css/stylehome.css">
</head>

<body>
    <!-- Header -->
    <?php include 'components/user_header.php';

    ?>


    <div class="container">
        <h1>Danh sách Giải đấu</h1>

        <?php
        include('admincp/config/config.php');

        // Truy vấn dữ liệu từ bảng GiaiDau
        $sql = "SELECT * FROM GiaiDau";
        $result = $conn->query($sql);
        // Hiển thị dữ liệu
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='giai-dau'>";
                echo "<img src='images/" . $row['HinhAnh'] . "' alt='Hình ảnh'>";
                echo "<a href='GiaiDau.php?MaGiaiDau=" . $row['MaGiaiDau'] . "'><h2>" . $row['TenGiaiDau'] . '</h2></a>';
                echo "<p><strong>Mô tả:</strong> " . $row['MoTa'] . "</p>";
                echo "<p><strong>Số đội:</strong> " . $row['SoDoi'] . "</p>";
                echo "<p><strong>Địa điểm:</strong> " . $row['DiaDiem'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "Không có dữ liệu";
        }

        // Đóng kết nối
        $conn->close();
        ?>
    </div>


</body>

</html>