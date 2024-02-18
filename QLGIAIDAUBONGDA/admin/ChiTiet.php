<!-- editChiTietTranDau.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Chi Tiết Trận Đấu</title>
    <!-- Add CSS styles for editChiTietTranDau.php if needed -->
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        color: #333;
    }

    textarea,
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        cursor: pointer;
        padding: 10px;
        border: none;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box;
        transition: background-color 0.3s ease;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }
    </style>
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
        $maTranDau = $_POST["maTranDau"];
        $mota = $_POST["mota"];
        $hinhAnh = $_POST["hinhAnh"];

        // Update data in the database
        $query = "UPDATE ChiTietTranDau1
                  SET 
                      Mota='$mota', 
                      HinhAnh='$hinhAnh' 
                  WHERE MaTranDau=$maTranDau";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật dữ liệu thành công!'); window.location.href = 'TranDau.php';</script>";
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
        $result = $conn->query("SELECT * FROM ChiTietTranDau1 WHERE MaTranDau=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $mota = $row["Mota"];
            $hinhAnh = $row["HinhAnh"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Close the connection
        $conn->close();
    }
    ?>

    <h1>Sửa Chi Tiết Trận Đấu</h1>
    <form method="post" action="">
        <label for="maTranDau">Mã Trân Đấu:</label>
        <input type="text" name="maTranDau" value="<?php echo $id; ?>" required><br>

        <label for="mota">Mô Tả:</label>
        <input type="text" name="mota" value="<?php echo $mota; ?>" required><br>

        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="file" name="hinhAnh" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>