<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Message</title>
    <!-- Add CSS for the editMessage.php page if needed -->
</head>

<body>
    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $host = 'localhost:4307';
        $dbname = 'your_database_name';
        $username = 'your_username';
        $password = 'your_password';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $maMessage = $_POST["maMessage"];
        $noiDung = $_POST["noiDung"];
        $idUser = $_POST["idUser"];

        // Update data in the database
        $query = "UPDATE Message SET NoiDung='$noiDung', IdUser=$idUser WHERE MaMessage=$maMessage";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Cập nhật Message thành công!'); window.location.href = 'message.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    }

    // Check if there's an ID parameter in the URL
    if (isset($_GET['id'])) {
        // Connect to the database
        $host = 'localhost:4307';
        $dbname = 'football';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the database based on the ID
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM Message WHERE MaMessage=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $noiDung = $row["NoiDung"];
            $idUser = $row["IdUser"];
        } else {
            echo "Không có dữ liệu";
            exit();
        }

        // Close the connection
        $conn->close();
    }
    ?>

    <h1>Sửa Message</h1>
    <form method="post" action="">
        <input type="hidden" name="maMessage" value="<?php echo $id; ?>">

        <label for="noiDung">Nội Dung:</label>
        <textarea name="noiDung" required><?php echo $noiDung; ?></textarea><br>

        <!-- You may replace this with a dropdown menu for selecting users -->
        <label for="idUser">Id User:</label>
        <input type="number" name="idUser" value="<?php echo $idUser; ?>" required><br>

        <input type="submit" value="Cập Nhật">
    </form>
</body>

</html>