
<?php
 session_start();
 
 use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require __DIR__.  '/vendor/autoload.php';
    require __DIR__ . '/database.php';

    $name = $_POST["user_name"];
    $email = $_POST["user_email"];
    $subject = $_POST["user_subject"];
    $message = $_POST["user_message"];
    $patterns = [
        '/https?:\/\/[^\s]*\b/i',
        '/www\.[^ ]+/',
        '/[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}/'
    ];
    $filtered_message = preg_replace($patterns, '', $message);

    $sql_strn = "INSERT INTO contactUs (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    $insert_data = $conn->query($sql_strn);



    $mail = new PHPMailer(true); 

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;

    $mail->Username = "adinarayanapasala9@gmail.com";
    $mail->Password = "alcusnmwkzmrrlvc";

    $mail->setFrom($email, $name);
    $mail->addAddress("ashokkumarpasala1999@gmail.com", "Ashok kumar pasala");
    $mail->SMTPSecure = 'tls';
    $mail->Subject = $subject;
    $mail->Body = $filtered_message;


    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent successfully.<a href="home_page.php"><p>Back to Home page</p></a> ';
    }
    } else {
        echo "Invalid request method";
    }

    $conn->close();
?>
