<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    form {
        max-width: 300px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        background-color: #333;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <form action="login.php" method="post">
        <label for="name">Tên đăng nhập:</label>
        <input type="text" id="name" name="name" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng Nhập</button>
    </form>
    <?php
    $host = 'localhost:4307';
    $dbname = 'football';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $adminName = $_POST["name"];
        $adminPassword = $_POST["password"];

        // Bảo vệ dữ liệu trước SQL injection
        $adminName = mysqli_real_escape_string($conn, $adminName);
        $adminPassword = mysqli_real_escape_string($conn, $adminPassword);

        // Truy vấn để kiểm tra đăng nhập
        $query = "SELECT * FROM Admin WHERE Namee = '$adminName' AND Passwords = '$adminPassword'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // Đăng nhập thành công, chuyển hướng đến trang sang.php
            header("Location: tonghop.php");
            exit();
        } else {
            // Đăng nhập thất bại, có thể thêm thông báo lỗi
            echo "Đăng nhập thất bại.";
        }
    }

    $conn->close();
    ?>

</body>

</html>