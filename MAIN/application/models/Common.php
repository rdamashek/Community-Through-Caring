<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Common extends CI_Model
{



    public function send_email($to, $subject, $message, $from='', $from_name='')
    {




        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        try {
            $mail = new PHPMailer();

            // Settings 
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';

            $mail->Host       = $_ENV['SMTP_HOST'];    // SMTP server: here use: mail.lipsumtechnologies.com
            $mail->SMTPDebug  = $_ENV['SMTP_DEBUG'];                     // enables SMTP debug information (for testing)
            $mail->SMTPAutoTLS = $_ENV['SMTP_SECURE'];
            $mail->SMTPSecure = $_ENV['SMTP_AUTO_TLS'];
            $mail->SMTPAuth   = $_ENV['SMTP_AUTH'];                  // enable SMTP authentication
            $mail->Port       = $_ENV['SMTP_PORT'];                    // set the SMTP port for the GMAIL server
            $mail->Username   = $_ENV['SMTP_USERNAME'];            // e.g. test@malikmobile.com
            $mail->Password   = $_ENV['SMTP_PASSWORD'];            // password for above email id as created in the cPanel.
            $mail->setfrom($_ENV['SMTP_FROM_DEFAULT'], $_ENV['SMTP_FROM_NAME']);

if(strlen($from) > 0){
 //$mail->addReplyTo($from, $from_name);   
}

  

            // Content
            $mail->isHTML(true);                       // Set email format to HTML

            //Typical mail data
            $mail->addaddress($to, $to); // to OR recipient email id.
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();
            // echo "Message Sent OK\n";
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }
}
