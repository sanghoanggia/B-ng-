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
            $diemQueryChuNha = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 3 WHERE CauLacBo1.MaCLB = '$maCLBChuNha'";
            $conn->query($diemQueryChuNha);
            echo " ban thang nha";
        } else if ($banThangNha == $banThangKhach) {
            $diemQueryChuNha = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 1 WHERE CauLacBo1.MaCLB = '$maCLBChuNha'";
            $conn->query($diemQueryChuNha);


            $diemQueryKhach = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 1 WHERE CauLacBo1.MaCLB = '$maCLBKhach'";
            $conn->query($diemQueryKhach);
        } else {
            $diemQueryKhach = "UPDATE CauLacBo1 SET SoDiem = SoDiem - 3 WHERE CauLacBo1.MaCLB = '$maCLBKhach'";
            $conn->query($diemQueryKhach);
            echo " ban thang khach";
        }

        // Thực hiện xóa
        $queryDeleteMatch = "DELETE FROM TranDau WHERE MaTranDau = $id";
        if ($conn->query($queryDeleteMatch) === TRUE) {
            echo "Xóa thành công!";
        } else {
            echo "Error: " . $queryDeleteMatch .  "<br>" . $conn->error;
        }
    } else {
        echo "Không tìm thấy trận đấu có ID là $id";
    }

    $conn->close();
} else {
    echo "ID không tồn tại";
}
