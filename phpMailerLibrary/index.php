<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/9/2020
 * Time: 3:23 PM
 */

require_once 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
//		 $mail->SMTPDebug = 2;                                   // Enable verbose debug output
$mail->isSMTP();                                        // Set mailer to use SMTP
//        $mail->IsMail();
$mail->Host = 'resiliencesoft.com';                      // Specify main and backup SMTP servers
//        $mail->Host = 'billexperts.com.au';                      // Specify main and backup SMTP servers
//        $mail->Host = 'ssl://smtp.gmail.com';                      // Specify main and backup SMTP servers
//        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->SMTPAuth = false;                                 // Enable SMTP authentication
//$mail->SMTPAutoTLS  = false;
$mail->Username = 'mahendra@resiliencesoft.com';            // SMTP username
$mail->Password = 'Mahendra!@34';                       // SMTP password

//         $mail->Username = 'contact@billexperts.com.au';            // SMTP username
//        $mail->Password = 'Nadax@123';                       // SMTP password

//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                       // TCP port to connect to

$mail->setFrom('mahendra@resiliencesoft.com','Prime SMM Panel');
$mail->addAddress('mahendrarai120899@gmail.com');           // Add a recipient
$mail->addReplyTo('mahendra@resiliencesoft.com', 'Admin');
$mail->addCC('mahendra@resiliencesoft.com');
$mail->isHTML(false);                                    // Set email format to HTML
//        $mail->isHTML(true);                                    // Set email format to HTML

$mail->Subject = "test";
//        $mail->Body    = $message;
$mail->Body    = "hello";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//        $mail->send();
if($mail->Send()) {
//    return true;
    echo "yes";
} else {
    echo "There was a problem sending the form.: " . $mail->ErrorInfo;
    exit;
}