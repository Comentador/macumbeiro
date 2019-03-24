<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
    $mail->Username   = 'bcomentador@gmail.com';                     // SMTP username
    $mail->Password   = 'humdados123456';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bcomentador@gmail.com', 'Mailer');
    $mail->addAddress('dellstutoriais@gmail.com', 'Dells User');     // Add a recipient
    $mail->addAddress('dellstutoriais@gmail.com');               // Name is optional
    $mail->addReplyTo('dellstutoriais@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Login no subwaychecker';
    $mail->Body    = 'Tomara que va embora!</b>';
    $mail->AltBody = 'Fuck the new email interace';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}