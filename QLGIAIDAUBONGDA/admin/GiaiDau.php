<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Giải Đấu</title>
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

    $query = "SELECT * FROM GiaiDau";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Giải Đấu</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>Mã Giải Đấu</th><th>Tên Giải Đấu</th><th>Mô Tả</th><th>Số Đội</th><th>Địa Điểm</th><th>Hình Ảnh</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaGiaiDau"] . "</td>";
            echo "<td>" . $row["TenGiaiDau"] . "</td>";
            echo "<td>" . $row["MoTa"] . "</td>";
            echo "<td>" . $row["SoDoi"] . "</td>";
            echo "<td>" . $row["DiaDiem"] . "</td>";
            echo "<td>" . $row["HinhAnh"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editGiaiDau(" . $row["MaGiaiDau"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteGiaiDau(" . $row["MaGiaiDau"] . ")'>Xóa</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng GiaiDau</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addGiaiDau()">Thêm Giải Đấu</button>
    </div>

    <script>
    function addGiaiDau() {
        // Chuyển hướng đến trang thêm Giải Đấu
        window.location.href = 'GDadd.php';
    }

    function editGiaiDau(id) {
        // Chuyển hướng đến trang sửa Giải Đấu với ID tương ứng
        window.location.href = 'GDedit.php?id=' + id;
    }

    function deleteGiaiDau(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa Giải Đấu này không?')) {
            window.location.href = 'GDdelete.php?id=' + id;
        }
    }
    </script>
</body>

</html>