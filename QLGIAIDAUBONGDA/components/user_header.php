<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Giải đấu Bóng đá</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #444;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: #333;
        }

        /* Thêm CSS cho thanh tìm kiếm */
        .search-container {
            float: right;
            margin-top: 10px;
            margin-right: 20px;
        }

        .search-container input[type=text] {
            padding: 6px;
            font-size: 14px;
            border: none;
        }

        .search-container button {
            padding: 6px 10px;
            margin-left: 5px;
            background: #ddd;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        /* Thêm CSS cho thanh tìm kiếm */
        .search-container {
            float: right;
            margin-top: 10px;
            margin-right: 20px;
        }

        .search-container form {
            display: flex;
        }

        .search-container input[type=text] {
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px 0 0 5px;
            /* Đường viền cong bên trái */
            outline: none;
        }

        .search-container button {
            padding: 10px;
            background: #ddd;
            font-size: 14px;
            border: none;
            border-radius: 0 5px 5px 0;
            /* Đường viền cong bên phải */
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Quản lý Giải đấu Bóng đá</h1>

        <!-- Thanh tìm kiếm -->
        <div class="search-container">
            <form method="post" action="search_results.php">
                <!-- <label for="search">Nhập từ khóa:</label> -->
                <input type="text" name="search" id="search" required placeholder="Tìm kiếm giải đấu">
                <!-- Sử dụng formaction để xác định trang xử lý tìm kiếm khi nhấn nút -->
                <button type="submit" formaction="search.php">Tìm kiếm</button>
            </form>
        </div>
    </header>
    <nav>

        <a href="sukien.php">Trang chủ</a>
        <a href="home1.php">Các giải đấu</a>
        <a href="allCLB.php">Đội bóng</a>
        <a href="lichthidau.php">Lịch thi đấu</a>
        <a href="message.php">Liên hệ</a>

        <a href="tochuc.php">Tổ Chức</a>

        <a href="admin/login.php">Admin</a>
    </nav>
    <script>
        function redirectToSearch() {
            var searchTerm = document.getElementById('search').value;
            if (searchTerm.trim() !== '') {
                document.getElementById('searchForm').submit();
            } else {
                alert('Vui lòng nhập ít nhất một ký tự để tìm kiếm.');
            }
        }
    </script>
    <!-- Nội dung trang web sẽ được thêm vào đây -->

</body>

</html>