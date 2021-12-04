<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>formulario Contato</title>
<style type="text/css">
body,td,th {
	font-family: Arial;
	font-size: 12px;
}
.fonte_titulo{
	color:#FFFFFF;	
}
</style>
</head>

<body>
<form action="email.php" method="post" name="form_contato" id="form_contato">
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr bgcolor="#0821B1">
      <td height="26" colspan="2" bgcolor="#0C2198" class="fonte_titulo">&nbsp;Formulário de contato</td>
    </tr>
    <tr bgcolor="#DADDFF">
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr bgcolor="#C7CCFF">
      <td height="20">&nbsp;<strong>Nome</strong></td>
      <td><input name="nome" type="text" required="required" id="nome"></td>
    </tr>
    <tr bgcolor="#DADDFF">
      <td width="80" height="20">&nbsp;<strong>E-mail:</strong></td>
      <td width="517"><input name="email" type="text" required="required" id="email" size="40" maxlength="40"></td>
    </tr>
    <tr bgcolor="#C7CCFF">
      <td height="20">&nbsp;<strong>Mensagem</strong></td>
      <td><textarea name="mensagem" cols="60" rows="4" required id="mensagem"></textarea></td>
    </tr>
    <tr bgcolor="#DADDFF">
      <td height="40">&nbsp;</td>
      <td><input name="button" type="submit" id="button" value="Enviar email"></td>
    </tr>
  </table>
</form>
</body>
</html>