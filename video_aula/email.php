<?php

// recebe as Variaveis
$nome     = $_POST["nome"];
$email    = $_POST["email"];
$mensagem = $_POST["mensagem"];

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
include("class.phpmailer.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
$mail->IsSMTP();
$mail->Host     = "smtps.uol.com.br";     // Endereço do servidor SMTP
$mail->SMTPAuth = true;                   // Usa autenticação SMTP? (opcional)
$mail->Username = '3dmaster@uol.com.br';  // Usuário do servidor SMTP       
$mail->Password = '****';               // Senha do servidor SMTP

// Define o remetente.
$mail->From     = "3dmaster@uol.com.br"; // Seu e-mail
$mail->FromName = "Administrador";       // Seu nome

// Define os destinatário(s)
$mail->AddAddress($email, $nome);
$mail->AddCC('3dmaster@uol.com.br', 'Eu'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

// Define a mensagem (Texto e Assunto)
$mail->Subject = "Mensagem do site"; // Assunto da mensagem
$mail->Body    = $mensagem;

// Envia o e-mail
$enviado = $mail->Send();

// Exibe uma mensagem de resultado
if ($enviado) {
   echo "E-mail enviado com sucesso!";   
} else {
   echo "Não foi possível enviar o e-mail !";
}

?>
