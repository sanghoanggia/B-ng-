<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Tìm Kiếm</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 50px;
        height: auto;
        border-radius: 50%;
    }

    /* Responsive design for smaller screens */
    @media screen and (max-width: 600px) {
        table {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <?php include 'components/user_header.php';

    ?>

    <h2>Kết Quả Tìm Kiếm</h2>

    <?php
    include('admincp/config/config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searchTerm = $_POST['search'];

        // Thực hiện truy vấn tìm kiếm trong bảng GiaiDau

        $query = "SELECT * FROM GiaiDau WHERE TenGiaiDau LIKE '%$searchTerm%' OR MoTa LIKE '%$searchTerm%'";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Hiển thị kết quả tìm kiếm
            echo "<table>";
            echo "<tr><th>Tên</th><th>Mô Tả</th><th>Ảnh</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["TenGiaiDau"] . "</td>";
                echo "<td>" . $row["MoTa"] . "</td>";
                echo "<td><img src='images/" . $row["HinhAnh"] . "' alt='Hình ảnh' width='50'></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Không có kết quả tìm kiếm.";
        }
    }

    // Đóng kết nối
    $conn->close();
    ?>
</body>

</html>