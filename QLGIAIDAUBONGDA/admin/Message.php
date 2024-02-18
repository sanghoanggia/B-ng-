<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Messages</title>
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

    $query = "SELECT * FROM Message";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Messages</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>Mã Message</th><th>Nội Dung</th><th>Thời Gian Gửi</th><th>Id User</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaMessage"] . "</td>";
            echo "<td>" . $row["NoiDung"] . "</td>";
            echo "<td>" . $row["ThoiGianGui"] . "</td>";
            echo "<td>" . $row["IdUser"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editMessage(" . $row["MaMessage"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteMessage(" . $row["MaMessage"] . ")'>Xóa</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng Message</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addMessage()">Thêm Message</button>
    </div>

    <script>
    function addMessage() {
        // Chuyển hướng đến trang thêm Message
        window.location.href = 'MGadd.php';
    }

    function editMessage(id) {
        // Chuyển hướng đến trang sửa Message với ID tương ứng
        window.location.href = 'MGedit.php?id=' + id;
    }

    function deleteMessage(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa Message này không?')) {
            window.location.href = 'MGdelete.php?id=' + id;
        }
    }
    </script>
</body>

</html>