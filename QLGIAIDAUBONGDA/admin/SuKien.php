<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sự Kiện</title>
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

    $query = "SELECT * FROM SuKien";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Sự Kiện</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>Mã Sự Kiện</th><th>Tên Sự Kiện</th><th>Mô Tả</th><th>Hình Ảnh</th><th>Mã Giải Đấu</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaSuKien"] . "</td>";
            echo "<td>" . $row["TenSuKien"] . "</td>";
            echo "<td>" . $row["MoTa"] . "</td>";
            echo "<td>" . $row["HinhAnh"] . "</td>";
            echo "<td>" . $row["MaGiaiDau"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editSuKien(" . $row["MaSuKien"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteSuKien(" . $row["MaSuKien"] . ")'>Xóa</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng SuKien</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addSuKien()">Thêm Sự Kiện</button>
    </div>

    <script>
    function addSuKien() {
        // Chuyển hướng đến trang thêm Sự Kiện
        window.location.href = 'SKadd.php';
    }

    function editSuKien(id) {
        // Chuyển hướng đến trang sửa Sự Kiện với ID tương ứng
        window.location.href = 'SKedit.php?id=' + id;
    }

    function deleteSuKien(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa Sự Kiện này không?')) {
            window.location.href = 'SKdelete.php?id=' + id;
        }
    }
    </script>
</body>

</html>