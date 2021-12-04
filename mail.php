<?php
$message = "Testando outros remetentes, para facilitar a resposta";
$headers = 'From: exemplo@padaria.com';// <- O e-mail que está configurado no .htaccess
$headers = 'Date:'.date('r');

if (mail('jonathas@radiologiahoje.com', 'Teste', $message, $headers)) {
	print('Funcionou');
}else{ 
	print('Nao Funcionou...');

};
?>