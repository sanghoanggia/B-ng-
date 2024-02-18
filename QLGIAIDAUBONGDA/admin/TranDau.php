<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Trận Đấu</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .table-detail {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .button-container {
        margin-top: 20px;
        text-align: center;
    }

    .button-container button {
        padding: 10px 20px;
        font-size: 16px;
        margin: 0 10px;
        cursor: pointer;
    }

    .button-container button.add {
        background-color: #4caf50;
        color: white;
        border: none;
    }

    .button-container button.edit {
        background-color: #2196f3;
        color: white;
        border: none;
    }

    .button-container button.delete {
        background-color: #f44336;
        color: white;
        border: none;
    }
    </style>
</head>

<body>
    <?php
    $host = 'localhost:4307';
    $dbname = 'football';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM TranDau";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h1>Danh Sách Trận Đấu</h1>";
        echo "<div class='table-detail'>";
        echo "<table>";
        echo "<tr><th>Mã Trận Đấu</th><th>Tên Giải Đấu</th><th>Ngày Diễn Ra</th><th>Tên CLB Chủ Nhà</th><th>Tên CLB Khách</th><th>Bàn Thắng Nhà</th><th>Bàn Thắng Khách</th><th>Thao Tác</th></tr>";

        while ($row = $result->fetch_assoc()) {
            // Lấy tên CLB Chủ Nhà
            $queryCLBChuNha = "SELECT TenCLB FROM CauLacBo1 WHERE MaCLB = " . $row["MaCLBChuNha"];
            $resultCLBChuNha = $conn->query($queryCLBChuNha);
            $rowCLBChuNha = $resultCLBChuNha->fetch_assoc();
            $tenCLBChuNha = $rowCLBChuNha["TenCLB"];

            // Lấy tên CLB Khách
            $queryCLBKhach = "SELECT TenCLB FROM CauLacBo1 WHERE MaCLB = " . $row["MaCLBKhach"];
            $resultCLBKhach = $conn->query($queryCLBKhach);
            $rowCLBKhach = $resultCLBKhach->fetch_assoc();
            $tenCLBKhach = $rowCLBKhach["TenCLB"];

            $queryGiaiDau = "SELECT TenGiaiDau FROM GiaiDau WHERE MaGiaiDau = " . $row["MaGiaiDau"];
            $resultGiaiDau = $conn->query($queryGiaiDau);
            $rowGiaiDau = $resultGiaiDau->fetch_assoc();
            $tenGiaiDau = $rowGiaiDau["TenGiaiDau"];


            echo "<tr>";
            echo "<td>" . $row["MaTranDau"] . "</td>";
            echo "<td>" . $tenGiaiDau . "</td>";
            echo "<td>" . $row["NgayDienRa"] . "</td>";
            echo "<td>" . $tenCLBChuNha . "</td>"; // Hiển thị tên CLB Chủ Nhà
            echo "<td>" . $tenCLBKhach . "</td>"; // Hiển thị tên CLB Khách
            echo "<td>" . $row["banthangnha"] . "</td>";
            echo "<td>" . $row["banthangkhach"] . "</td>";
            echo "<td>";
            echo "<button class='edit' onclick='editTranDau(" . $row["MaTranDau"] . ")'>Sửa</button>";
            echo "<button class='delete' onclick='deleteTranDau(" . $row["MaTranDau"] . ")'>Xóa</button>";
            echo "<button class='edit' onclick='addChiTiet(" . $row["MaTranDau"] . ")'>Thêm Chi Tiết</button>";
            echo "<button class='edit' onclick='editChiTiet(" . $row["MaTranDau"] . ")'>Sửa Chi Tiết</button>";
            echo "</td>";
            echo "</tr>";
        }


        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Không có thông tin cho Bảng TranDau</h1>";
    }

    $conn->close();
    ?>

    <div class="button-container">
        <button class="add" onclick="addTranDau()">Thêm Trận Đấu</button>
    </div>

    <script>
    function addTranDau() {
        // Chuyển hướng đến trang thêm Trận Đấu
        window.location.href = 'TDadd.php';
    }

    function editTranDau(id) {
        // Chuyển hướng đến trang sửa Trận Đấu với ID tương ứng
        window.location.href = 'TDedit.php?id=' + id;
    }

    function deleteTranDau(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa Trận Đấu này không?')) {
            window.location.href = 'TDdelete.php?id=' + id;
        }
    }
    </script>
    <!-- Thêm đoạn mã JavaScript bên dưới phần thân trang HTML -->
    <script>
    function deleteTranDau(id) {
        if (confirm('Bạn có chắc chắn muốn xóa trận đấu này không?')) {
            // Gửi yêu cầu xóa bằng Ajax
            window.location.href = 'test.php?id=' + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Hiển thị thông báo và chuyển hướng sau khi xóa thành công
                    alert('Xóa thành công!');
                    window.location.href = 'TranDau.php';
                }
            };

            xmlhttp.open("GET", "TDdelete.php?id=" + id, true);
            xmlhttp.send();

        }
    }

    function editChiTiet(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận

        window.location.href = 'ChiTiet.php?id=' + id;

    }

    function addChiTiet(id) {
        // Hiển thị xác nhận xóa và chuyển hướng khi xác nhận

        window.location.href = 'ChiTietAdd.php?id=' + id;

    }
    </script>

</body>

</html>