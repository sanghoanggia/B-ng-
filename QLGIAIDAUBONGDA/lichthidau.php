<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các Trận Đấu Chưa Diễn Ra</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <?php
    include 'components/user_header.php';
    include('admincp/config/config.php');

    $currentDate = date('Y-m-d');
    $sql = "SELECT * FROM TranDau WHERE NgayDienRa > '{$currentDate}' ORDER BY NgayDienRa";
    $result = $conn->query($sql);

    $queryTranDau = "
    SELECT 
        TranDau.NgayDienRa,
        TranDau.banthangnha,
        TranDau.banthangkhach,
        TranDau.*,
        CLBChuNha.TenCLB AS TenCLBChuNha,
        CLBKhach.TenCLB AS TenCLBKhach,
        tenGiai.TenGiaiDau AS TenGiaiDau
    FROM TranDau
    INNER JOIN CauLacBo AS CLBChuNha ON TranDau.MaCLBChuNha = CLBChuNha.MaCLB
    INNER JOIN CauLacBo AS CLBKhach ON TranDau.MaCLBKhach = CLBKhach.MaCLB
    INNER JOIN GiaiDau AS tenGiai ON TranDau.MaGiaiDau = tenGiai.MaGiaiDau
    WHERE NgayDienRa > '{$currentDate}'
    ORDER BY NgayDienRa";
    $resultTranDau = $conn->query($queryTranDau);






    if ($result->num_rows > 0) {
        echo "<h1>Các Trận Đấu Chưa Diễn Ra</h1>";
        echo "<table>
                    <tr>
                        <th>Tên Giải Đấu</th>
                        <th>Ngày Diễn Ra</th>
                        <th>Đội Chủ Nhà</th>
                        <th>Đội Khách</th>
  
                    </tr>";

        while ($row = $resultTranDau->fetch_assoc()) {
            echo "<tr>
                        <td>{$row['TenGiaiDau']}</td>
                        <td>{$row['NgayDienRa']}</td>
                        <td>{$row['TenCLBChuNha']}</td>
                        <td>{$row['TenCLBKhach']}</td>

                    </tr>";
        }

        echo "</table>";
    } else {
        echo "Không có trận đấu nào chưa diễn ra.";
    }

    $conn->close();
    ?>
</body>

</html>