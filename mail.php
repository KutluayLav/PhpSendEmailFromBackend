<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'const.php';
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

$mail->CharSet = 'utf-8';
$mail->SMTPDebug = false;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = EMAIL_USERNAME;
$mail->Password = EMAIL_PASSWORD;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
$mail->SMTPDebug  = 2;

$mail->addAddress(TO_EMAIL, 'Kutluay ulutas iletisim');

$mail->isHTML(true);
?>