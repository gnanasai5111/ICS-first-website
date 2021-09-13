<?php

require 'PHPMailer/PHPMailerAutoload.php';
require 'config.php';

$name=$email=$message="";

$name = $_POST["name"];
// $lastName = $_POST["lastName"];
$email = $_POST["email"];
// $number = $_POST["number"];
$subject=$_POST["subject"];
$message=$_POST["message"];

$mail = new PHPMailer;

if( $mail_type === 1 ) {
    //sendmail is chosen
    $mail->isSendmail();
}

elseif ($mail_type === 2){
    //smtp is chosen
    $mail->isSMTP();

    }

    $mail->Host = $host_name;
    $mail->SMTPAuth = true;
    $mail->Username = $user_name;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = $port;
    $mail->setFrom($email, 'User');
    $mail->addAddress($to_email,$to_name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = 'Name: ' . $name .'<br>Email: ' . $email . '<br>Subject: ' . $subject . '<br> Message: ' . $message;


if (!$mail->send()) {
    echo 'Email could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
//    echo 'Email has been sent';
    header("Location: " . $_SERVER["HTTP_REFERER"]);

}