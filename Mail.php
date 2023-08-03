<?php
require 'Patients.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = 'test@example.com';
$mail->Password = 'secret';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('admin@example.com', 'User');
$mail->addAddress('testuser@example.com', 'Someone');
$mail->addAttachment('file.zip');

$mail->isHTML(true);
$mail->Subject = 'Test mail';
$mail->Body    = '<p>Hello!</p>';
$mail->AltBody = 'Hello!';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
