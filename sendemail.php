<?php 

$nome     = utf8_decode($_POST["nomeC"]);
$email    = $_POST["emailC"];
$assunto  = utf8_decode($_POST["motivoC"]);
$mensagem = utf8_decode($_POST["mensagemC"] . 
        '*-------------------------------------------------------------------------*'.
        '### -> Motivo: '.$assunto.'
         ### -> Email: '.$email.'
         ### -> Nome: '.$nome);

$headers = 'From: radiologiahoje@radiologiahoje.com';// <- O e-mail que está configurado no .htaccess
$headers = 'Date:'.date('r');

if (mail('jonathas@radiologiahoje.com', $assunto, $mensagem, $headers)) {
	echo '<script>alert ("Envio concretizado! Obrigado por entrar em contato!")</script>';
        header('refresh: 0; url = contact-us.php');
}else{ 
	echo('Erro interno... Por favor, verifique outras possibilidades de entrar em contato:'
                . '----------------------------------------------------------'
                . ' --> Email: jonathas@radiologiahoje.com'
                . ' --> Telefone: 79 988485231<br>'
                . ' --> Obrigado!');
};

#    header('refresh: 1; url = contact-us.php');
#    echo '<script>alert("Mensagem Encaminhada!")</script>';-->