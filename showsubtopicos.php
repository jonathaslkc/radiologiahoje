<?php
$titulohead = "Fórum - Tópicos";
$menusel = "forum";
include_once ("elements/header.php"); 
?>

<body>

<!--Header-->
    <?php include_once ("elements/menu.php"); ?>
<!-- /header -->
<!-- Administrativo -->
    <?php include_once ("elements/admin.php"); ?>
<!-- /Administrativo -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Fórum / Debates / FAQ</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Fórum</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div <?php if (isset($_SESSION['logado'])): else: echo 'hidden'; endif; ?>><!--<a class="btn btn-info btn-large" href="showsubtopicos.php#reply-to">+Responder</a>--></div>
                <div class="box">
                    <?php $id = (int)$_GET['num'];
                        $idst = $id;
                        $resultado = $subtopico->find($id);?>  
                    <h2>[Tópico]</h2>
                    <h3><?php echo $resultado->titulo; ?></h3>
                    <p><?php echo $resultado->descricao; ?></p>
                </div>
            </div>
                    <?php if (isset($_SESSION['logado'])):
                      else:
                        echo $msgerro2.'<div>
                                <a data-toggle="modal" class="btn btn-info btn-medium" href="#CadMUForm">Cadastre-se para Participar do Fórum!</a>
                                <a data-toggle="modal" class="btn btn-warning btn-medium" href="#loginForm2">Já possui conta? Clique para Logar!</a>
                             </div>';    
                      endif;
                    ?>
            <br>
            <div class="container" <?php if (!isset($_SESSION['logado'])): echo 'hidden'; else: 
    
                 endif; ?>>
                <div class="row-fluid">
                    <div class="box">
                        <?php echo '<h4>'.$msgerro2.'</h4>' ?>
                        <form method="POST" action="" name="">
                            <div class="control-group">
                                <!-- texto -->
                                <div class="controls">
                                    <textarea name="texto" maxlength="2000" class="input-xxlarge" placeholder="Digite aqui o que deseja colocar em enquete!"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls"><br><br>
                                    <input type="submit" name="responderSTop" value="Inserir Resposta" class="btn btn-success btn-large">
                                    <input type="reset" value="Limpar" class="btn btn-warning btn-xxlarge">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="row-fluid">
                <?php 
                    if (!$resposta->findRes($id)):
                        echo '<p class="box">Nenhuma resposta ativa!</p>';
                    else:
                        ?>
                        <a class="btn btn-info btn-medium" href="<?php echo $_SERVER["REQUEST_URI"].'#'.$_SESSION['pegaUltVl']?>">Ver Última Resposta</a>
                        <?php
                        foreach($resposta->findRes($id) as $key => $valRes):
                        $resultfind = $logar->findUsuario($valRes->rel_usu_reply);
                            echo' 
                                <div class="box" id='.($key + 1).'>
                                    <div class="row-fluid label label-info">
                                        <div class="span6"><h6>Em: '.utf8_encode(strftime( '%d/%B/%Y - %X', strtotime($valRes->data))).'</h6></div>
                                        <div class="span5 center"></div>
                                        <div class="span1 center"><h6>#'.($key + 1).'</h6></div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span4 box">
                                            <img style="width:85px;border-radius:10px;box-shadow: 7px 5px 3px #666" src="images/sample/'.$resultfind->img.'">
                                            <h5>'.$valRes->rel_usu_reply.'</h5>
                                            <p>Data de ingresso: '.utf8_encode(strftime( '%d/%b/%Y', strtotime($resultfind->dtcriacao))).'</p>
                                        </div>
                                        <div class="span8">'.$valRes->texto.'</div>
                                    </div>
                                </div>
                                <br>';$_SESSION['pegaUltVl'] = $key;
                        endforeach; 
                    endif;?>
            </div>
        </div>
    </section>

<!--  Login form -->
<div class="modal hide fade in" id="CadMUForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Formulário de Cadastro</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <span style="font-size:18px;font-weight:bold;text-align:center;"><?php echo $msgerro2; ?></span>
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
            <p class="text-error box">Senha deve possuir no mínimo 6 dígitos!<br>
            Campos marcados com * são obrigatórios!</p>
            <hr>
            <fieldset class="registration-form">
                <div class="control-group">
                    <!-- Nome --><!-- Sobrenome -->
                    <div class="controls">
                        <span class="text-error" style="font-size:18px;font-weight:bold;">*</span><input type="text" required="required" id="nome" name="nometop" placeholder="Nome" class="input-xlarge"> <span class="text-error" style="font-size:18px;font-weight:bold;">*</span><input type="text" required="required" id="sobrenome" name="sobrenometop" placeholder="Sobrenome" class="input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <!-- dtnasc -->
                    <div class="controls">
                        <input type="text" id="dtnasc" name="dtnasctop" maxlength="10" placeholder="Data de Nascimento" class="input-xlarge">                                    
                    </div>
                </div>

                <div class="control-group">
                    <!-- telefone --><!-- celular -->
                    <div class="controls">
                        <input type="text" id="telefone" name="numcontatotop" maxlength="13" placeholder="Número de Contato" class="input-medium">
                    </div>
                </div>

                <div class="control-group">
                    <!-- email -->
                    <div class="controls">
                        <span class="text-error" style="font-size:18px;font-weight:bold;">*</span><input type="text" required="required" id="email" name="emailtop" placeholder="Email" class="input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <!-- Usuario -->
                    <div class="controls">
                        <span class="text-error" style="font-size:18px;font-weight:bold;">*</span><input type="password" maxlength="15" required="required" id="senha" name="senhatop" placeholder="Senha de Acesso" class="input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <!-- Buttons -->
                    <div class="controls">
                        <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarMemUsu">Cadastrar</button>
                        <button class="btn btn-info btn-medium btn-block" type="reset">Limpar</button>
                    </div>
                </div>
            </fieldset>
        </form>
<!--        <a href="#">Esqueceu sua senha?</a>-->
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->
    
<?php include_once ("elements/footer.php"); ?>

<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({ 
        
        language: 'pt_BR',
        selector: 'textarea',
          theme: 'modern',
          plugins: [
            'advlist autolink lists link image charmap print hr anchor pagebreak',
            'wordcount visualblocks visualchars code',
            'media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
          ],
          toolbar1: 'bold italic | alignleft aligncenter alignright alignjustify | bullist outdent indent | print media | forecolor backcolor emoticons | link image',
          image_advtab: true,
          templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
          ],
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ]
    });
</script>
    
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
