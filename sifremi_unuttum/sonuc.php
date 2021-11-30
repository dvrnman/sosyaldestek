<?php
ob_start();
include_once "../baglan.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './mail/Exception.php';
require './mail/PHPMailer.php';
require './mail/SMTP.php';

function mailgonder($gonderilecekmail , $key , $gonderilecekisim)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;    
      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.sosyal360.net';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mailsosyal@sosyal360.net';                     //SMTP username
        $mail->Password   = 'K{=)]v(@JK{{';                               //SMTP password
        $mail->CharSet="UTF-8";                 
        $mail->SMTPSecure = "tls";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->SMTPOptions = array(
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name'=>false,
                'allow_self_signed' => true            
            ],
        );                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('mailsosyal@sosyal360.net', 'Sosyal360');
        $mail->addAddress($gonderilecekmail,$gonderilecekisim);     //Add a recipient
                 
        
    
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Şifreyi Sıfırlama';
        $mail->Body    = 'Şifre Sıfırla Anahtarı:'."http://sosyal360.net/sifremi_unuttum/yenile.php?key=".$key;
       
    
        $mail->send();
     
    } catch (Exception $e) {
        echo "Mail Gönderim Hatası:<br><br> {$mail->ErrorInfo}";
    }
    
}



?>
