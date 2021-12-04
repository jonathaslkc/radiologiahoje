<?php
    if(!isset($_SESSION)) { session_start(); }                                      // -------------------------------- INÍCIAR SESSÃO
    
    function __autoload($class_name){                                               // -------------------------------- CARREGAR CLASSE USADA
        require_once 'classes/' . $class_name . '.php';
    }

        $logar = new usuario();                                                     // -------------------------------- CRIANDO O OBJETO USUARIO
?>
<!--
    NESTA PÁGINA É CRIADA A $SESSION PARA INCLEMENTAÇÃO DO CPFCNPJ DA PESSOA/EMPRESA
-->
<!DOCTYPE html>
<html>
<head>
    <title>Login - Acesso Fácil</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-34731274-1']);
        _gaq.push(['_trackPageview']);
        _gaq.push(['_trackEvent', 'sharing', 'viewed full-screen', 'snippet 944kj',0,true]);
        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
        </script>
        <script type="text/javascript">
        (function($) { 
            $('#theme_chooser').change(function(){
                whichCSS = $(this).val();
                document.getElementById('snippet-preview').contentWindow.changeCSS(whichCSS);
            });
        })(jQuery);
    </script>
</head>
<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div style="text-align:right;padding: 10px;">
                        <a href='index.php?logout=ok' onclick='return confirm("Você realmente deseja trocar de usuário?")'>
                            <span style=" font-weight: bold; color: red;">Logar com outro Usuário</span>
                        </a>
                    </div>
                    <form name="form" method="post" action="#" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <br><br>
                        <div style=" width:90%;">
                            <fieldset class="scheduler-border" style="text-align: center">
                                <legend>Logotipo</legend>
                            </fieldset>
                        </div>
                        <br>
                    <?php 
                        if ($logar->select($_SESSION['usuario']) == NULL):
                            echo '<h2>Nenhum Cadastro Encontrado!</h2>';
                    ?>
                    <br><br><br>
                    <a href="index.php" class="btn btn-success btn-lg btn-block" role="button">Cadastrar uma empresa</a><br>
                    <?php
                        else:
                    ?>
                        <label for="empcadastrada">Selecione a Empresa desejada:</label><br>
                        <select name="empcadastrada" id="empcadastrada" class="form-control">
                            <optgroup label="Razão / CNPJ">
                    <?php       if (isset($_SESSION['usuariofilho'])):
                                    foreach($logar->selectdif($_SESSION['usuario'],$_SESSION['empacesso']) as $key => $value):
                                        echo '<option value="'.$value->cpfcnpj.'">'. $value->razao .' / '. $value->cpfcnpj .'</option>';
                                    endforeach;
                                else:
                                    foreach($logar->select($_SESSION['usuario']) as $key => $value):
                                        echo '<option value="'.$value->cpfcnpj.'">'. $value->razao .' / '. $value->cpfcnpj .'</option>';
                                    endforeach;
                                endif;
                    ?>
                            </optgroup>
                        </select>
                        <br><br><br>
                        <input type="submit" name="avancar" class="btn btn-success btn-lg btn-block" value="Avancar"><br>
                    <?php
                        endif; 
                        if (isset($_POST['avancar'])):
                            $_SESSION['cpfcnpjempresa'] = $_POST['empcadastrada'];
                            header("location:index.php");
                        endif;
                    ?>
                        
                        
                        <!--<input type="submit"  name="entrar" class="btn btn-lg btn-primary btn-block btn-primary" onclick="windows.open('index.php')" value="Próximo">--><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>