<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhân Viên Tổ Chức</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 50px;
        height: auto;
        border-radius: 50%;
    }
    </style>
</head>


<body>
    <?php include 'components/user_header.php'; ?>
    <h2>Danh Sách Nhân Viên Tổ Chức</h2>

    <?php
    include('admincp/config/config.php');

    $queryTranDau = "
SELECT 
   TenNhanVien,TenViTri,NhanVienToChuc.HinhAnh,
    tenGiai.TenGiaiDau AS TenGiaiDau
FROM NhanVienToChuc
INNER JOIN GiaiDau AS tenGiai ON NhanVienToChuc.MaGiaiDau = tenGiai.MaGiaiDau";

    $resultTranDau = $conn->query($queryTranDau);

    if ($resultTranDau->num_rows > 0) {
        // Hiển thị dữ liệu trong bảng
        echo "<table>";
        echo "<tr><th>Tên Nhân Viên</th><th>Tên Vị Trí</th><th>Tên Giải Đấu</th><th>Hình Ảnh</th></tr>";
        while ($row = $resultTranDau->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["TenNhanVien"] . "</td>";
            echo "<td>" . $row["TenViTri"] . "</td>";
            echo "<td>" . $row["TenGiaiDau"] . "</td>";
            echo "<td><img src='images/" . $row["HinhAnh"] . "' alt='Hình ảnh' width='50'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu nhân viên tổ chức.";
    }

    // Đóng kết nối
    $conn->close();
    ?>
</body>

</html>