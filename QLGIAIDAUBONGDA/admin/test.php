<?php
if (isset($_GET['id'])) {
    $host = 'localhost:4307';
    $dbname = 'football';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];

    // Lấy thông tin cần thiết trước khi xóa
    $queryGetMatch = "SELECT MaCLBChuNha, MaCLBKhach, banthangnha, banthangkhach FROM TranDau WHERE MaTranDau = $id";
    $resultGetMatch = $conn->query($queryGetMatch);

    if ($resultGetMatch->num_rows > 0) {
        $rowMatch = $resultGetMatch->fetch_assoc();
        $maCLBChuNha = $rowMatch['MaCLBChuNha'];
        $maCLBKhach = $rowMatch['MaCLBKhach'];

        $banThangNha = $rowMatch['banthangnha'];
        $banThangKhach = $rowMatch['banthangkhach'];


        if ($banThangNha > $banThangKhach) {
            $diemQueryChuNha = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 3 WHERE MaCLB = '$maCLBChuNha'";
            if ($conn->query($diemQueryChuNha) === FALSE) {
                echo "Lỗi cập nhật điểm CLB chủ nhà: " . $conn->error;
            }
        } else if ($banThangNha == $banThangKhach) {
            $diemQueryChuNha = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 1 WHERE MaCLB = '$maCLBChuNha'";
            if ($conn->query($diemQueryChuNha) === FALSE) {
                echo "Lỗi cập nhật điểm CLB chủ nhà: " . $conn->error;
            }

            $diemQueryKhach = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 1 WHERE MaCLB = '$maCLBKhach'";
            if ($conn->query($diemQueryKhach) === FALSE) {
                echo "Lỗi cập nhật điểm CLB khách: " . $conn->error;
            }
        } else {
            $diemQueryKhach = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 3 WHERE MaCLB = '$maCLBKhach'";
            if ($conn->query($diemQueryKhach) === FALSE) {
                echo "Lỗi cập nhật điểm CLB khách: " . $conn->error;
            }
        }



        echo '<pre>';
        echo " Xóa Thành CÔNG !";
        header("Location: TranDau.php");
        exit();
    } else {
        echo "Không tìm thấy trận đấu có ID là $id";
    }

    $conn->close();
} else {
    echo "ID không tồn tại";
}
