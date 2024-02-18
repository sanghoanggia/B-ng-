<?php
include 'components/user_header.php';
include('admincp/config/config.php');

if (isset($_GET['MaGiaiDau'])) {
    $maGiaiDau = $_GET['MaGiaiDau'];

    $queryTranDau = "SELECT MaTranDau,TranDau.*, CLBChuNha.TenCLB AS TenCLBChuNha, CLBKhach.TenCLB AS TenCLBKhach
                    FROM TranDau
                    INNER JOIN CauLacBo1 AS CLBChuNha ON TranDau.MaCLBChuNha = CLBChuNha.MaCLB
                    INNER JOIN CauLacBo1 AS CLBKhach ON TranDau.MaCLBKhach = CLBKhach.MaCLB
                    WHERE TranDau.MaGiaiDau = $maGiaiDau
                    ORDER BY TranDau.NgayDienRa ASC";

    $resultTranDau = $conn->query($queryTranDau);


    $querytengiaidau = "SELECT * FROM GiaiDau WHERE MaGiaiDau = $maGiaiDau ";
    $resultten = $conn->query($querytengiaidau);

    // Truy vấn lấy thông tin từ bảng CauLacBo1 và sắp xếp theo số điểm giảm dần
    $queryRanking = "SELECT * FROM CauLacBo1 WHERE MaGiaiDau = $maGiaiDau ORDER BY SoDiem DESC";
    $resultRanking = $conn->query($queryRanking);


    // Truy vấn lấy thông tin từ bảng CauLacBo1
    $queryClb = "SELECT * FROM CauLacBo1 WHERE MaGiaiDau = $maGiaiDau";
    $resultClb = $conn->query($queryClb);
} else {
    echo "Không có mã giải đấu được chọn.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Xếp Hạng</title>
    <link rel="stylesheet" href="css/stylegiaidau.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Desired+Font&display=swap">

</head>

<body>

    <div class="main-content">

        <div class="content-left">
            <div class="khunglong">
                <?php if ($resultten->num_rows > 0) {
                    $rowten = $resultten->fetch_assoc();
                    $tenGiaiDau = $rowten["TenGiaiDau"];
                } else {
                    $tenGiaiDau = "Không có tên giải đấu";
                }

                // Display the tournament name
                echo " $tenGiaiDau";
                ?>
            </div>
            <div>

                <h2>Kết quả các trận đấu đã diễn ra</h2>
                <ul class="result-list">
                    <?php

                    // Hiển thị thông tin về các trận đấu đã diễn ra
                    if ($resultTranDau->num_rows > 0) {
                        while ($rowTranDau = $resultTranDau->fetch_assoc()) {
                            echo "<li class='result-item'>";
                            echo "<a  href='TranDau.php?MaTranDau=" . $rowTranDau['MaTranDau'] . "'>" . $rowTranDau['NgayDienRa'] . ": <span class='team-name'>" . $rowTranDau['TenCLBChuNha'] . "</span> " . $rowTranDau['banthangnha'] . " - " . $rowTranDau['banthangkhach'] . " " . $rowTranDau['TenCLBKhach'] . "</a>";
                            echo "</li>";
                        }
                    } else {
                        echo "<li>Không có trận đấu đã diễn ra</li>";
                    }
                    ?>
                </ul>
            </div>

            <div>
                <!-- <h2>Các trận đấu sắp diễn ra</h2>
                <ul class="upcoming-list">
                    <?php
                    // Hiển thị thông tin về các trận đấu sắp diễn ra
                    // Bạn có thể sử dụng $resultTranDauSapDienRa tương tự như trên
                    ?>
                </ul> -->
            </div>
        </div>

        <div class="content-right">
            <!-- Bảng xếp hạng -->
            <div class="ranking">
                <h2>Bảng Xếp Hạng</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Đội</th>
                            <th>Số Trận</th>
                            <th>Bàn Thắng</th>
                            <th>Bàn Thua</th>
                            <th>Hiệu Số</th>
                            <th>Số Điểm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Hiển thị thông tin bảng xếp hạng
                        if ($resultRanking->num_rows > 0) {
                            while ($rowRanking = $resultRanking->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowRanking['TenCLB'] . "</td>";
                                echo "<td>" . $rowRanking['SoTran'] . "</td>";
                                echo "<td>" . $rowRanking['banthang'] . "</td>";
                                echo "<td>" . $rowRanking['banthua'] . "</td>";
                                echo "<td>" . $rowRanking['HieuSo'] . "</td>";
                                echo "<td>" . $rowRanking['SoDiem'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="foot">
        <!-- Hiển thị tất cả câu lạc bộ -->
        <div class="clubs">
            <h2>Các Câu Lạc Bộ</h2>
            <div class="clubs-container">
                <?php
                // Hiển thị thông tin về câu lạc bộ
                if ($resultClb->num_rows > 0) {
                    while ($rowClb = $resultClb->fetch_assoc()) {
                        echo "<div class='club-item'>";
                        echo "<a href='CauLacBo1.php?MaCLB=" . $rowClb['MaCLB'] . "'>";
                        echo "<img src='images/"  . $rowClb['HinhAnh'] . "' alt='" . $rowClb['TenCLB'] . "'>";
                        echo "<span class='club-name'>" . $rowClb['TenCLB'] . "</span>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Không có câu lạc bộ nào</p>";
                }


                ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>