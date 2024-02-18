<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;

            margin: 0 0 20px;
            /* Thêm margin ở dưới */


        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <?php
    // Your PHP code remains unchanged
    ?>
    <h1>Thêm Admin</h1>
    <form method="post" action="">
        <label for="name">Tên Admin:</label>
        <input type="text" name="name" required><br>

        <label for="password">Mật Khẩu:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Thêm">
    </form>
</body>

</html>