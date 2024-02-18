<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Câu Lạc Bộ</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .table-detail {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .button-container {
        margin-top: 20px;
        text-align: center;
    }

    .button-container button {
        padding: 10px 20px;
        font-size: 16px;
        margin: 0 10px;
        cursor: pointer;
    }

    .button-container button.add {
        background-color: #4caf50;
        color: white;
        border: none;
    }

    .button-container button.edit {
        background-color: #2196f3;
        color: white;
        border: none;
    }

    .button-container button.delete {
        background-color: #f44336;
        color: white;
        border: none;
    }
    </style>
</head>

<body>
    <?php
    $host = 'localhost:4307';
    $dbname = 'football';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM CauLacBo";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Câu Lạc Bộ</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>Mã CLB</th><th>Tên CLB</th><th>Mã Giải Đấu</th><th>Mô Tả</th><th>Sân Nhà</th><th>Hình Ảnh</th><th>Số Trận</th><th>Hiệu Số</th><th>Số Điểm</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaCLB"] . "</td>";
            echo "<td>" . $row["TenCLB"] . "</td>";
            echo "<td>" . $row["MaGiaiDau"] . "</td>";
            echo "<td>" . $row["MoTa"] . "</td>";
            echo "<td>" . $row["SanNha"] . "</td>";
            echo "<td>" . $row["HinhAnh"] . "</td>";
            echo "<td>" . $row["SoTran"] . "</td>";
            echo "<td>" . $row["HieuSo"] . "</td>";
            echo "<td>" . $row["SoDiem"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editCLB(" . $row["MaCLB"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteCLB(" . $row["MaCLB"] . ")'>Xóa</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng CauLacBo</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addCLB()">Thêm CLB</button>
    </div>

    <script>
    function addCLB() {
        // Chuyển hướng đến trang thêm CLB
        window.location.href = 'addCLB.php';
    }

    function editCLB(id) {
        // Chuyển hướng đến trang sửa CLB với ID tương ứng
        window.location.href = 'editCLB.php?id=' + id;
    }

    function deleteCLB(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa CLB này không?')) {
            window.location.href = 'deleteCLB.php?id=' + id;
        }
    }
    </script>
</body>

</html>