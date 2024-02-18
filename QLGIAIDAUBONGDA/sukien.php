<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sự Kiện</title>
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

    section {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
    }

    article {
        width: 100%;
        max-width: 400px;
        margin: 20px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    article:hover {
        transform: scale(1.05);
    }

    img {
        width: 100%;
        height: auto;
        border-radius: 8px 8px 0 0;
    }

    .content {
        padding: 15px;
    }

    h2 {
        margin-top: 0;
        color: #333;
    }

    p {
        color: #666;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <?php include 'components/user_header.php'; ?>
    <section>
        <?php
        include('admincp/config/config.php');

        $queryTranDau = "
        SELECT 
            SuKien.TenSuKien,
            SuKien.MoTa,
            SuKien.HinhAnh,
            tenGiai.TenGiaiDau AS TenGiaiDau
        FROM SuKien
        INNER JOIN GiaiDau AS tenGiai ON SuKien.MaGiaiDau = tenGiai.MaGiaiDau";
        $resultTranDau = $conn->query($queryTranDau);

        if ($resultTranDau->num_rows > 0) {
            while ($row = $resultTranDau->fetch_assoc()) {
                echo "<article>
                        <img src='images/{$row['HinhAnh']}' alt='{$row['TenSuKien']}'>
                        <div class='content'>
                            <h2>{$row['TenSuKien']}</h2>
                            <p>{$row['MoTa']}</p>
                            <p>{$row['TenGiaiDau']}</p>
                        </div>
                    </article>";
            }
        } else {
            echo "Không có dữ liệu";
        }

        $conn->close();
        ?>
    </section>
</body>

</html>