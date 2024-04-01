<?php
// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require_once './vendor/autoload.php';
require __DIR__. '/database.php';
$email = $_POST['user_email'];
// create a new object
$mail = new PHPMailer();
// configure an SMTP
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "adinarayanapasala9@gmail.com";
$mail->Password = "alcusnmwkzmrrlvc";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('noreplay@reset-domain.com');
$mail->addAddress($email);
$mail->Subject = 'password Reset';
// Set HTML 
$mail->isHTML(TRUE);
$mail->Body = <<<END

    Click <a href="http://localhost/phptask/reset_password_form.php">here</a> 
    to Reset your password.

    END;
// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent successfully, check you email for Reset the password';
}