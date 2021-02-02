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
        $apartment = $_POST['apartment'];
        $message = $_POST['message'];
        $promo = $_POST['promo'];
        $fullName = "$name $lastname";
        $subject = "Nova porudžbina od $fullName";
       

        //products
        $bottle = $_POST['bottle'];
        $can = $_POST['can'];  

        //email body
        $body = "<h1>Nova porudžbina</h1>
                <hr />
                <p>Ime i prezime: $name $lastname</p>
                <p>Email adresa: $email</p>
                <p>Grad: $city</p>
                <p>Ulica i broj: $address</p>
                <p>Sprat/Stan: $apartment</p>
                <p>Broj telefona: $phoneNumber</p>
                <p>Poruka: $message</p>
                <p><b>Porudžbina:</b></p>
                <hr />
                <p><b>Flašica 0.33ml: $bottle kom.</b></p>
                <p><b>Limenka 0.33ml: $can kom.</b></p>";


        //PHPMailer setup 

        // $mail->isSMTP();

        $mail->Host = 'mail.zocpivo.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
 
        $mail->setFrom($email, $fullName);
        $mail->addAddress(EMAIL);
        $mail->isHTML(true);
 


        $mail->Subject = $subject;
        $mail->Body = $body;

        if(!$mail->send()) {
            echo "Message could not be sent.";
            echo "Mailer Error: $mail->ErrorInfo";

        } else {
            sendConfirmationMail($email, $name, $subject);
            header('Location: index.html');
        
        }
    } 
}


function sendConfirmationMail($email, $name, $subject) {

       $mail = new PHPMailer;

        // $mail->isSMTP();

        $noReply = 'no-reply@zocpivo.com';
        $mail->Host = 'mail.zocpivo.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($noReply, $noReply);
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        
        $body = "<h1>Poštovani $name</h1>
                 <p>Vaša poružbina je uspešna.</p>
                 <p>Hvala na poverenju!</p>";

        $mail->Body = $body;

}

