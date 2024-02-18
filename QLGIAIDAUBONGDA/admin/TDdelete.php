<?php
// Kết nối đến cơ sở dữ liệu
$host = 'localhost:4307';
$dbname = 'football';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy ID từ tham số truyền vào
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa dữ liệu từ cơ sở dữ liệu dựa trên ID
    $query = "DELETE FROM TranDau WHERE MaTranDau=$id";

    if ($conn->query($query) === TRUE) {
        // Trả về kết quả để thông báo thành công
        echo "Xóa dữ liệu thành công!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "Không có ID được truyền vào.";
}

// Đóng kết nối
$conn->close();
