<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php'; 

class Email {

    function __construct() {
        $post = filter_input_array(INPUT_POST);
        $nome = $post['nome'];
        $email = $post['email'];
        $telefone = $post['telefone'];
        $mensagem = $post['mensagem'];

        $body = "<h2>Formulário de contato:</h2>
        <strong>Nome: </strong>{$nome}<br>
        <strong>Email: </strong>{$email}<br>
        <strong>Telefone: </strong>{$telefone}<br>
        <strong>Mensagem: </strong>{$mensagem}<br>";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '895c26ff601f3b';                     //SMTP username
            $mail->Password   = 'cf0f6b88ad29cd';                               //SMTP password
        //  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'UTF-8';

            //Recipients
            $mail->setFrom('contato@dominio.com.br', 'Origem');
            $mail->addAddress('contato@dominio.com.br', 'Destino');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Contato: '.$nome;
            $mail->Body    = $body;

            $mail->send();
            header('location:home');
        } catch (Exception $e) {
            echo "Mensagem não pode ser enviada. Mailer Error: {$mail->ErrorInfo}";
        }      
    }
}
?>