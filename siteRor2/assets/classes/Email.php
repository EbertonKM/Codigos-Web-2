<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php'; 

class Email {

    function __construct() {
        $post = filter_input_array(INPUT_POST);
        $email = $post['email'];
        $problema = $post['problema'];
        $erroCode = $post['erroCode'];
        $descricao = $post['descricao'];

        switch($problema) {
            case 1:
                $problema = 'Problemas no pagamento';
                break;
            case 2:
                $problema = 'Erros na instalação';
                break;
            case 3:
                $problema = 'Problemas técnicos ou de compatibilidade';
                break;
            case 4:
                $problema = 'Outro';
                break;
            default:
                $problema = 'Não especificado';
                break;
        }

        $body = "<h2>Pedido de Suporte:</h2>
        <strong>Email: </strong>{$email}<br>
        <strong>Problema informado: </strong>{$problema}<br>
        <strong>Código de erro: </strong>{$erroCode}<br>
        <strong>Descrição: </strong>{$descricao}<br>";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';             //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '895c26ff601f3b';                       //SMTP username
            $mail->Password   = 'cf0f6b88ad29cd';                       //SMTP password
        //  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'UTF-8';

            //Recipients
            $mail->setFrom('contato@dominio.com.br', 'Origem');
            $mail->addAddress('contato@dominio.com.br', 'Destino');     //Add a recipient

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = 'Suporte Risk Of Rain';
            $mail->Body    = $body;

            $mail->send();
            header('location:home?status=sucesso');
            exit;
        } catch (Exception $e) {
            header('location:home?status=erro');
            exit;
        }      
    }
}
?>