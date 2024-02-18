<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Cầu Thủ</title>
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

    $query = "SELECT * FROM CauThu";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Cầu Thủ</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>Mã Cầu Thủ</th><th>Tên Cầu Thủ</th><th>Mã CLB</th><th>Vị Trí</th><th>Ngày Sinh</th><th>CLB Hiện Tại</th><th>CLB Trước Đó</th><th>Ảnh</th><th>Quê Quán</th><th>Mô Tả</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaCauThu"] . "</td>";
            echo "<td>" . $row["TenCauThu"] . "</td>";
            echo "<td>" . $row["MaCLB"] . "</td>";
            echo "<td>" . $row["ViTri"] . "</td>";
            echo "<td>" . $row["NgaySinh"] . "</td>";
            echo "<td>" . $row["CLB_now"] . "</td>";
            echo "<td>" . $row["CLB_old"] . "</td>";
            echo "<td>" . $row["anh"] . "</td>";
            echo "<td>" . $row["QueQuan"] . "</td>";
            echo "<td>" . $row["MoTa"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editCauThu(" . $row["MaCauThu"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteCauThu(" . $row["MaCauThu"] . ")'>Xóa</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng CauThu</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addCauThu()">Thêm Cầu Thủ</button>
    </div>

    <script>
    function addCauThu() {
        window.location.href = 'CTadd.php';
    }

    function editCauThu(id) {
        window.location.href = 'CTedit.php?id=' + id;
    }

    function deleteCauThu(id) {
        if (confirm('Bạn có chắc chắn muốn xóa Cầu Thủ này không?')) {
            window.location.href = 'CTdelete.php?id=' + id;
        }
    }
    </script>
</body>

</html>