<?php
include('admincp/config/config.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['IdUser'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'không có giá trị';
    } else {
        // Insert feedback into the Message table
        $insert_message = $conn->prepare("INSERT INTO `Message` (NoiDung, ThoiGianGui, IdUser, Email) VALUES (?, NOW(), ?, ?)");
        $insert_message->execute([$content, $phone, $email]);

        $message = 'Gửi thành công!';
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
    include 'components/user_header.php';


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';


    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.example.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nguyenvietsang1302@gmail.com';
            $mail->Password   = 'fxto iuij mobb ugse';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;


            $mail->setFrom('nguyenvietsang1302@gmail.com', 'BongDa');

            $mail->addAddress($_POST["email"], 'Recipient Name');


            $mail->isHTML(true);
            $mail->Subject = 'Cảm ơn bạn đã gửi phản hồi!';
            $mail->Body    = 'Chúng tôi rất vui vì bạn đã gửi đánh giá! ';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    ?>

    <?php include('admincp/config/config.php'); ?>

    <form method="post" action="">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>

        <label for="IdUser">Phone:</label>
        <input id="sdt" type="text" name="IdUser" required>

        <label for="content">Feedback:</label>
        <textarea id="content" name="content" required></textarea>

        <input type="submit" value="Send Feedback">
    </form>

    <?php
    echo $message;
    if ($message === 'Gửi thành công!') {
        echo '<script>alert("gửi thành công!");</script>';
    }
    ?>

</body>

</html>