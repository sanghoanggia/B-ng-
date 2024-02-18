<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Câu Lạc Bộ</title>
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
        flex: 0 1 calc(15% - 20px);
        /* Tính toán flex-basis để có 8 CLB trên 1 hàng */
        margin: 10px;
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
    <?php
    include 'components/user_header.php'; ?>

    <section>
        <?php

        include('admincp/config/config.php');

        $sql = "SELECT * FROM CauLacBo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<article>
                <img src='images/{$row['HinhAnh']}' alt='{$row['TenCLB']}'>

                <div class='content'>
                    <h2><a href='caulacbo.php?MaCLB={$row['MaCLB']}'>{$row['TenCLB']}</a></h2>
                    <p>Mô Tả: {$row['MoTa']}</p>
                    <p>Sân Nhà: {$row['SanNha']}</p>
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