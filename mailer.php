<?php
require 'PHPMailerAutoload.php';
require 'credential.php';

$mail = new PHPMailer;

if (isset($_POST['email']) && $_POST['email'] != '') {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header('Content-Type: text/html; charset=utf-8');
        //inputs
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone-number'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $message = $_POST['message'];
        $promo = $_POST['promo'];
        $subject = "Nova porudžbina od ". $name . " " . $lastname;
        //products
        $bottle = $_POST['bottle'];
        $can = $_POST['can'];  
        
        //email body
        $body = "";
        $body .= "<b>Ime i prezime:</b> " . $name." ".$lastname . "\r\n";
        $body .= "<b>Email:</b> " . $email . "\r\n";
        $body .= "<b>Grad:</b> " . $city . "\r\n";
        $body .= "<b>Adresa:</b> " . $address . "\r\n";
        $body .= "<b>Broj telefona:</b> " . $phoneNumber . "\r\n";
        $body .= "<b>Poruka:</b> " . $message . "\r\n";
        if($promo === 'on') {
            $body .= "Želim da primam obaveštenja o promocijama" . "\r\n\n";
        } else {
            $body .= "Ne želim da primam obaveštenja o promocijama" . "\r\n\n";
        }
        $body .= "<b>Porudžbina:</b>" . "\r\n";
        $body .= "Flaša 0.33ml: ". $bottle . " kom." . "\r\n";
        $body .= "Limenka 0.33ml: ". $can . " kom." . "\r\n";
        
        //PHPMailer setup
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, 'Zoc');
        $mail->addAddress(EMAIL);
        $mail->addReplyTo($email);
        $mail->isHTML(true);

        $mail->Subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $mail->Body = $body;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
            header('Location: index.html');
        }

    } 
}
