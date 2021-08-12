<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
include './vendor/autoload.php';
class SMTPMailer{
    public function load(){
        //php mailer
        $mail = new PHPMailer;
        $mail->isSMTP();
        //$mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username   = 'sabiha.435.nahar@gmail.com';                    
        $mail->Password   = 'kiha789BIHA';
        //$mail->Charset = "utf-8";
        $mail->isHTML(true);
        $mail->From = 'sabiha.435.nahar@gmail.com';
        $mail->FromName = 'Mia';
        return $mail;
    }
}
