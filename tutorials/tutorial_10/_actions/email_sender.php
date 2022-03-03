<?php

include("../vendor/autoload.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use DataBase\MySQL;
use DataBase\MembersTable;

$email = $_POST['email'];

$table = new MembersTable(new MySQL());

if ($table) {
    $confirmation = $table->findByEmail($email);

    if ($confirmation === false) {
        header('location: ../forgot_password.php?unsuccess=1');
    } else {
        // header('location: ../forgot_password.php?success=1');
        $id = $confirmation->id;
        $name = $confirmation->name;
        $email = $confirmation->email;
        $token = $confirmation->token;

        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;  // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;  // Enable SMTP authentication
            $mail->Username = '';  // SMTP username
            $mail->Password = '';  // SMTP password
            $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;  // TCP port to connect to

            $mail->setfrom('tkha730@gmail.com', 'Thu Kha');
            $mail->addaddress("$email", "$name");  // Add a recipient

            $mail->isHTML(true);  // Set email format to HTML

            $mail->Subject = "Hello, $name";
            $mail->Body    = "Please,<b><a href='http://localhost/php_training/tutorials/tutorial_10/_actions/reset_password.php?" . "id=$id&email=$email&token=$token'" . ">click here</a></b> to change your password";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
                header('location: ../login.php?mailsuccess=1');
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
