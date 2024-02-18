<?php
 
  include('admincp/config/config.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format';
    } else {
        // Insert feedback into the Message table
        $insert_message = $conn->prepare("INSERT INTO `Message` (NoiDung, ThoiGianGui, Email, Phone) VALUES (?, NOW(), ?, ?)");
        $insert_message->execute([$content, $email, $phone]);

        $message = 'Sent feedback successfully!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Feedback</title>
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

    form {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    textarea {
        width: 100%;
        height: 150px;
        margin-bottom: 20px;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }
    </style>
</head>

<body>
    <?php
  include 'components/user_header.php'?>;

    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="content">Feedback:</label>
        <textarea name="content" required></textarea>

        <input type="submit" value="Send Feedback">
    </form>

    <?php
    echo $message;
    if ($message === 'Sent feedback successfully!') {
        echo '<script>alert("Feedback sent successfully!");</script>';
    }
    ?>

</body>

</html>