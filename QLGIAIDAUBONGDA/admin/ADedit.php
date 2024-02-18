<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Admin</title>
    <!-- Add CSS for the editAdmin.php page if needed -->
</head>

<body>
    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $host = 'localhost:4307';
        $dbname = 'your_database_name';
        $username = 'your_username';
        $password = 'your_password';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $idAdmin = $_POST["idAdmin"];
        $name = $_POST["name"];
        $password = $_POST["password"];

        // Update data in the database
        $query = "UPDATE Admin SET Namee='$name', Passwords='$password' WHERE IdAdmin=$idAdmin";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật Admin thành công!'); window.location.href = 'admin.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    }

    // Check if there's an ID parameter in the URL
    if (isset($_GET['id'])) {
        // Connect to the database
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the database based on the ID
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM Admin WHERE IdAdmin=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["Namee"];
            $password = $row["Passwords"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Close the connection
        $conn->close();
    }
    ?>

    <h1>Sửa Admin</h1>
    <form method="post" action="">
        <input type="hidden" name="idAdmin" value="<?php echo $id; ?>">

        <label for="name">Tên Admin:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required><br>

        <label for="password">Mật Khẩu:</label>
        <input type="password" name="password" value="<?php echo $password; ?>" required><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>