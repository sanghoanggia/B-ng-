<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Admin</title>
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
    // Connect to the database
    $host = 'localhost:4307';
    $dbname = 'football';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM Admin";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Admin</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>ID Admin</th><th>Tên Admin</th><th>Mật Khẩu</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["IdAdmin"] . "</td>";
            echo "<td>" . $row["Namee"] . "</td>";
            echo "<td>" . $row["Passwords"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editAdmin(" . $row["IdAdmin"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteAdmin(" . $row["IdAdmin"] . ")'>Xóa</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng Admin</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addAdmin()">Thêm Admin</button>
    </div>

    <script>
    function addAdmin() {
        // Redirect to the addAdmin.php page
        window.location.href = 'ADadd.php';
    }

    function editAdmin(id) {
        // Redirect to the editAdmin.php page with the corresponding ID
        window.location.href = 'ADedit.php?id=' + id;
    }

    function deleteAdmin(id) {
        // Display confirmation and redirect upon confirmation
        if (confirm('Bạn có chắc chắn muốn xóa Admin này không?')) {
            window.location.href = 'ADdelete.php?id=' + id;
        }
    }
    </script>
</body>

</html>