<?php

	require_once 'class.phpmailer.php';

	// Inicia a classe PHPMailer
	$mail = new PHPMailer();

    if(isset($_POST['enviarMsg'])):
        
		// recebe as Variaveis
		$nome     = $_POST["nomeC"];
		$email    = $_POST["emailC"];
		$assunto  = $_POST["motivoC"];
		$mensagem = $_POST["mensagemC"];

                
                
                $mail->IsSMTP(true); // Define que a mensagem será SMTP
                $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
                $mail->Port = 587;
                $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                $mail->SMTPSecure = 'ssl';
                $mail->Username = 'jonlinkinpark@gmail.com'; // Usuário do servidor SMTP
                $mail->Password = 'mds3069plkc3'; // Senha do servidor SMTP

		// Define o remetente.
		$mail->From     = "jonlinkinpark@gmail.com"; // Seu e-mail
		$mail->FromName = "Colaborador";       // Seu nome

		// Define os destinatário(s)
		$mail->AddAddress($email, $nome);
		$mail->AddCC('jonlinkinpark@gmail.com', 'Eu'); // Copia
		//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

		// Define os dados técnicos da Mensagem
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

		// Define a mensagem (Texto e Assunto)
		$mail->Subject = $assunto; // Assunto da mensagem
		$mail->Body    = $mensagem;


		// Envia o e-mail
		$enviado = $mail->Send();

		// Exibe uma mensagem de resultado
        if ($enviado):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Mensagem enviada com sucesso!</fieldset>';
        else:
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Erro!<br> Não foi possível enviar sua mensagem!</fieldset>';
        endif;
    endif;
