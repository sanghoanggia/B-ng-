<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Chi Tiết Trận Đấu</title>
    <!-- Add your CSS styles or include a stylesheet if needed -->
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
    if (isset($_GET['id'])) {
        // Add your database connection code here
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the form data and insert into the ChiTietTranDau1 table

            $maTranDau = $_POST["maTranDau"];
            $mota = $_POST["mota"];
            $hinhAnh = $_POST["hinhAnh"];

            // SQL query to insert data into the ChiTietTranDau1 table
            $insertQuery = "INSERT INTO ChiTietTranDau1 (MaTranDau, Mota, HinhAnh) 
                        VALUES (?, ?, ?)";

            // Use prepared statement to prevent SQL injection
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iss", $id, $mota, $hinhAnh);

            // Execute the query
            if ($insertStmt->execute()) {
                echo "<script>alert('Thêm Chi Tiết Trận Đấu thành công!'); window.location.href = 'TranDau.php';</script>";
            } else {
                echo "Error: " . $insertStmt->error;
            }

            // Close the prepared statement
            $insertStmt->close();
        }
    } else {
        echo "Không có dữ liệu";
        exit();
    }
    // Close the database connection
    $conn->close();
    ?>

    <h1>Add Chi Tiết Trận Đấu</h1>
    <form method="post" action="">

        <label for="mota">Mô Tả:</label>
        <textarea name="mota" rows="4" required></textarea><br>

        <label for="hinhAnh">Hình Ảnh:</label>
        <input type="file" name="hinhAnh" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>

        <input type="submit" value="Thêm Chi Tiết">
    </form>
    <!-- Add your JavaScript if needed -->
</body>

</html>