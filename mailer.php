<?php
require 'PHPMailerAutoload.php';
require 'credential.php';

$mail = new PHPMailer;

$params = array();
parse_str($_POST['formdata'], $params);
$_POST = $params;

if (isset($_POST['email']) && $_POST['email'] != '' && $_POST["bottle"] != 0 || $_POST["can"] != 0) {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        //inputs
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone-number'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
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
        $body = "<h1>Nova porudžbina, br. $orderNum</h1>
                <hr />
                <p>Ime i prezime: $name $lastname</p>
                <p>Email adresa: $email</p>
                <p>Mesto: $city</p>
                <p>Poštanski broj: $zipcode</p>
                <p>Ulica i broj: $address</p>
                <p>Sprat/Stan: $apartment</p>
                <p>Broj telefona: $phoneNumber</p>
                <p>Poruka: $message</p>
                <p><b>Porudžbina:</b></p>
                <hr />
                <p><b>Flašica 0.33ml: $bottle kom.</b></p>
                <p><b>Limenka 0.33ml: $can kom.</b></p>";

        //PHPMailer setup 

        $mail->isSMTP();
        try {
        
            $noReply = 'no-reply@zocpivo.com';
            $mail->Host = "mail.zocpivo.com";
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL;
            $mail->Password = PASS;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = "465";
           
            $mail->CharSet = 'utf-8';
            $mail->setFrom($email, $fullName);
            $mail->Subject = $subject;
            $mail->addAddress(EMAIL);
            $mail->Body = $body;
            $mail->isHTML(true);
    
            if(!$mail->send()) {
                sendConfirmationMail($email, $name, $subject);
                echo json_encode([
                    "success" => false,
                    "message" => "Greška na serveru, pokušajte ponovo kasnije!"
                ]);
                exit();
    
            } else {
                $autorespond = sendConfirmationMail($email, $name, $subject);
                echo json_encode([
                    "success" => true,
                    "message" => "Uspešno ste poručili! Hvala na poverenju!"
                ]);
                exit();
            
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Email adresa nije validna!"
        ]);
        exit();
   }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Nisu popunjena sva obavezna polja!"
    ]);
    exit();
}


function sendConfirmationMail($email, $name, $subject) {
    $mail = new PHPMailer;
    $mail->IsSMTP();
    try {
        $noReply = 'no-reply@zocpivo.com';
        $mail->Host = "mail.zocpivo.com";
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = "465";
       
        $mail->CharSet = 'utf-8';
        $mail->setFrom($noReply, $noReply);
        $mail->Subject = "Porudžbina";
        $mail->addAddress($email);
        $body = "<p>Poštovani/a $name</h1>
        <p>Vaša porudžbina je zavedena.</p>
        <p>Hvala na poverenju!</p>
        <hr />
        <p><strong>S poštovanjem,<strong/></p>
        <p><strong>Žoc Pivo</strong></p>
        <p><strong>Web: zocpivo.com</strong></p>
        <p><strong>Email: info@zocpivo.com</strong></p>
        <p><strong>Telefon: +381606969260</strong></p>";
        $mail->Body = $body;
        $mail->isHTML(true);

        return $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

