<?php
//$dir = dirname(__FILE__);
//echo "<p>Caminho absoluto da sua pasta: " . $dir . "</p>";
//echo "<p>Caminho absoluto da sua pasta aonde estara o seu .htpasswd: " . $dir . "/.htpasswd" . "</p>";
    if(!isset($_SESSION)) { session_start(); }                                      // -------------------------------- INÍCIAR SESSÃO
    
    function __autoload($class_name){                                               // -------------------------------- CARREGAR CLASSE USADA
        require_once 'classes/' . $class_name . '.php';
    }
    $msgerro         = '';
    date_default_timezone_set ('America/Sao_Paulo');
    if(isset($_POST['entrar'])):                                                    // -------------------------------- PEGAR DADOS POST NO CLIQUE 'ENTRAR'
        $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
     
        $logar = new usuario();                                                     // -------------------------------- CRIANDO O OBJETO USUARIO
        $logar->setLogin($login);
        $logar->setSenha($senha);
        
        if (($_POST['login'] == '') OR ($_POST['senha'] == '')){
            $msgerro = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos!</fieldset>';
        }else{
            if($logar->selectestado($login) != NULL):
                $msgerro= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Usuário aguardando aprovação do Administrador!</fieldset>';
            else:
                if($logar->logar($login, $senha)){                                      // -------------------------------- CHAMADA DO MÉTODO LOGAR
                    #$_SESSION['nomeusuario'] = $_POST['login'];
                    header("location: logaremp.php");
                }else{
                    $msgerro= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">Erro<br> Login/Senha incorreto!</fieldset>';
                }
            endif;
        }
    endif;
?>
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
                    <form name="form" method="post" action="#" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <fieldset style="text-align: center;padding-top: 40px;"><span style="font-size:20px;color:#00abeb;text-align: center;">
                            <img src="img/acessoFacil.png" class="img-thumbnail" alt="Software Acesso Fácil" width="100">&nbsp; +
                            <img src="img/acessoFacil.png" class="img-thumbnail" alt="Website Super Fácil Soluções" width="130">
                        </span></fieldset>
                        
                        <!--<span style="font-size:20px;color:#00abeb;">
                            <img src="img/acessoFacil.png" class="img-thumbnail" alt="Software Acesso Fácil" width="100">&nbsp; +
                            <img src="img/acessoFacil2.png" class="img-thumbnail" alt="Website Super Fácil Soluções" width="130">
                        </span>-->
                        <br><br>
                        <span style="font-size:18px;font-weight:bold;text-align:center;"><?php echo $msgerro; ?></span>
                        <label for="usr">Login:</label><br>
                        <input type="Text" name="login" class="form-control input-lg" id="usr" autofocus><br>
                        <?php// if(@$retorn){ echo 'style="background:#FFA07A;"';} ?>
                        <label for="pwd">Senha:</label><br>
                        <input type="password" name="senha" class="form-control input-lg" id="pwd"><br>

                        <!--<label style="font-size: 15px;  line-height: 15px;">Selecione a Empresa</label><br>
                        <select name="empcadastrada"><optgroup label="Razão / CNPJ">
                        <?php/* foreach($logar->logar($login,$senha) as $key => $value):
                            echo '<option value="'.$value->cpfcnpj.'">'. $value->razao .' / '. $value->cpfcnpj .'</option>';
                        endforeach;*/ ?>
                        </optgroup></select><br>-->
                        <div style="text-align: center;">
                        <label style="font-size: 12px;  line-height: 15px;"><a href="">Esqueceu sua senha?</a></label><br>
                        <label style="font-size: 12px;  line-height: 15px;"><a href="index2">Cadastrar minha empresa</a></label><br><br>
                        <?php// echo isset($errologin) ? $errologin : ''; ?>
                        </div>
                        <input type="submit"  name="entrar" class="btn btn-lg btn-primary btn-block btn-primary" value="Entrar"><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>