<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Cầu Thủ</title>
    <!-- Thêm CSS cho trang addCauThu.php nếu cần -->
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
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;

        margin: 0 0 20px;
        /* Thêm margin ở dưới */


    }

    label {
        display: block;
        margin: 10px 0 5px;
        color: #333;
    }

    input {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
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
    }

    input[type="submit"]:hover {
        background-color: #555;
    }
    </style>
</head>

<body>
    <?php
    // Kiểm tra nếu biểu mẫu đã được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $tenCauThu = $_POST["tenCauThu"];
        $maCLB = $_POST["maCLB"];
        $viTri = $_POST["viTri"];
        $ngaySinh = $_POST["ngaySinh"];
        $clbNow = $_POST["clbNow"];
        $clbOld = $_POST["clbOld"];
        $anh = $_POST["anh"];
        $queQuan = $_POST["queQuan"];
        $moTa = $_POST["moTa"];

        $query = "INSERT INTO CauThu (TenCauThu, MaCLB, ViTri, NgaySinh, CLB_now, CLB_old, anh, QueQuan, MoTa) VALUES ('$tenCauThu', $maCLB, '$viTri', '$ngaySinh', '$clbNow', '$clbOld', '$anh', '$queQuan', '$moTa')";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Thêm dữ liệu thành công!'); window.location.href = 'CauThu.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <h1>Thêm Cầu Thủ</h1>
    <form method="post" action="">
        <label for="tenCauThu">Tên Cầu Thủ:</label>
        <input type="text" name="tenCauThu" required><br>

        <label for="maCLB">Mã CLB:</label>
        <input type="number" name="maCLB" required><br>

        <label for="viTri">Vị Trí:</label>
        <input type="text" name="viTri"><br>

        <label for="ngaySinh">Ngày Sinh:</label>
        <input type="date" name="ngaySinh" required><br>

        <label for="clbNow">CLB Hiện Tại:</label>
        <input type="text" name="clbNow"><br>

        <label for="clbOld">CLB Trước Đó:</label>
        <input type="text" name="clbOld"><br>


        <input type="file" name="anh" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>

        <label for="queQuan">Quê Quán:</label>
        <input type="text" name="queQuan"><br>

        <label for="moTa">Mô Tả:</label>
        <textarea name="moTa"></textarea><br>

        <input type="submit" value="Thêm">
    </form>
</body>

</html>