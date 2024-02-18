<?php
// Your PHP code for deleting a record goes here
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $host = 'localhost:4307';
    $dbname = 'football';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $query = "DELETE FROM NhanVienToChuc WHERE MaNhanVien=$id";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Xóa Nhân Viên thành công!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
