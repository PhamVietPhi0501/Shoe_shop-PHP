<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

class mailer{
    public function dathang($tieude,$noidung,$maildat){
        try {
            //Server settings
            $mail = new PHPMailer(true);
            

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testmail512002@gmail.com';
            $mail->Password = 'hzgdixmqrhyrbjxn';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465; 

            $mail->setFrom('testmail512002@gmail.com');

            $mail->addAddress($maildat);

            $mail->isHTML(true);

            $mail->Subject = $tieude;

            $mail->Body = $noidung;

            $mail->send();
            'Message has been sent';
        } catch (Exception $e) {
            "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>