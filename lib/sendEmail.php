<?php

include_once 'vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions

function send_email($name, $email, $message)  {

    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output DEBUG_SERVER disable=DEBUG_OFF
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.nzian.xyz';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'noreply@nzian.xyz';                     // SMTP username
    $mail->Password   = 'nzian@nr@47';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('noreply@nzian.xyz', 'NzianXYZ');
    $mail->addAddress('info@nzian.xyz', 'NZIAN');     // Add a recipient
    $mail->addReplyTo($email, $name);
    $mail->addCC('nzianit@gmail.com', "Ziauddin Robin");
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hire Me form message';
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    return array('status'=> 1, "Message sent successfully");
    } catch (Exception $e) {
        return array('status' => 0, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
