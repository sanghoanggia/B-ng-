<!-- editViTri.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Vị Trí Trận Đấu</title>
    <!-- Add CSS styles for editViTri.php if needed -->
</head>

<body>
    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $maViTri = $_POST["maViTri"];
        $tenViTri = $_POST["tenViTri"];

        // Update data in the database
        $query = "UPDATE ViTriTranDau SET TenViTri='$tenViTri' WHERE MaViTri=$maViTri";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật dữ liệu thành công!'); window.location.href = 'NhanVienToChuc.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    }

    // Check if there is an ID parameter in the URL
    if (isset($_GET['id'])) {
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
        $result = $conn->query("SELECT * FROM ViTriTranDau WHERE MaViTri=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tenViTri = $row["TenViTri"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Close the connection
        $conn->close();
    }
    ?>

    <h1>Sửa Vị Trí Trận Đấu</h1>
    <form method="post" action="">
        <input type="hidden" name="maViTri" value="<?php echo $id; ?>">
        <label for="tenViTri">Tên Vị Trí:</label>
        <input type="text" name="tenViTri" value="<?php echo $tenViTri; ?>" required><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>