<?php
// Kiểm tra nếu có tham số id được truyền
if (isset($_GET['id'])) {
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
    $id = $_GET['id'];

    // Xóa dữ liệu từ cơ sở dữ liệu dựa trên ID

    $query = "DELETE FROM SuKien WHERE MaSuKien=$id";

    if ($conn->query($query) === TRUE) {
        // Thông báo alert khi xóa thành công và chuyển hướng
        echo "<script>alert('Xóa dữ liệu thành công!');</script>";
        echo "<script>window.location.href = 'SuKien.php';</script>";
    } else {
        // Thông báo alert khi xóa thất bại
        echo "<script>alert('Xóa dữ liệu thất bại: " . $conn->error . "');</script>";
        echo "<script>window.location.href = 'SuKien.php';</script>";
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Thông báo khi không có ID được truyền vào
    echo "<script>alert('Không có ID được truyền vào.');</script>";
    echo "<script>window.location.href = 'SuKien.php';</script>";
}
