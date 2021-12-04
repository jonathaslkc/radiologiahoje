<?php 
require_once('class.phpmailer.php'); //chama a classe de onde você a colocou.

$nome     = utf8_decode($_POST["nomeC"]);
$email    = $_POST["emailC"];
$assunto  = utf8_decode($_POST["motivoC"]);
$mensagem = utf8_decode($_POST["mensagemC"]);

$mail = new PHPMailer(); // instancia a classe PHPMailer


$mail->IsSMTP(); // telling the class to use SMTP

$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "jonlinkinpark@gmail.com";  // GMAIL username
$mail->Password   = "mds3069plkc3";            // GMAIL password

$mail->SetFrom('jonlinkinpark@gmail.com', 'First Last');

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic".$assunto;
$mail->IsHTML(true);
$mail ->MsgHTML($mensagem);
$mail->Body = $mensagem;

$mail->AddAddress("jonlinkinpark@gmail.com", "John Doe");

if(!$mail->Send()){
    echo "Erro ao enviar Email:" . $mail->ErrorInfo;
}else{
    header('refresh: 1; url = contact-us.php');
    echo '<script>alert("Mensagem Encaminhada!")</script>';
}