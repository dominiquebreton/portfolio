<?php
if(! (include 'recaptcha_verify.php')){//le fichier recaptcha_verify.php renvoie la vérification du code secret
    die("pb avec le captcha");
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
//$infos_compte = include 'infos_compte.php';
//var_dump($infos_compte);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                  // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = '';                                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                                 // SMTP username
    $mail->Password = '';                                 // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom("", 'Mailer');
    $mail->addAddress("", 'Hey !');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Body ='<b>Nom :</b>'.$_POST['nom'].'<br><b>Prénom :</b>'.$_POST['prenom'].'<br><b>Téléphone :</b>'.$_POST["telephone"].'<br><b>Email :</b>'.$_POST["email"].'<br><b>Message :</b>'.$_POST["message"].'<br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
    header("location:index.php");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>