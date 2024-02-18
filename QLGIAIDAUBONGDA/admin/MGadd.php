<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Message</title>
    <!-- Add CSS for the addMessage.php page if needed -->
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
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $noiDung = $_POST["noiDung"];
        $thoiGianGui = date("Y-m-d H:i:s");
        $idUser = $_POST["idUser"];

        // Insert data into the database
        $query = "INSERT INTO Message (NoiDung, ThoiGianGui, IdUser) VALUES ('$noiDung', '$thoiGianGui', $idUser)";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Thêm Message thành công!'); window.location.href = 'message.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    }
    ?>

    <h1>Thêm Message</h1>
    <form method="post" action="">
        <label for="noiDung">Nội Dung:</label>
        <textarea name="noiDung" required></textarea><br>

        <!-- You may replace this with a dropdown menu for selecting users -->
        <label for="idUser">Id User:</label>
        <input type="number" name="idUser" required><br>

        <input type="submit" value="Thêm">
    </form>
</body>

</html>