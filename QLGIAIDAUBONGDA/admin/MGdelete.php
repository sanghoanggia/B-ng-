<?php
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

    // Get the ID from the URL
    $id = $_GET['id'];

    // Delete data from the database based on the ID
    $query = "DELETE FROM Message WHERE MaMessage=$id";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Xóa Message thành công!'); window.location.href = 'message.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
