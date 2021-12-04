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
                        <li><a href="forum.php">Fórum</a> <span class="divider">/</span></li>
                        <li class="active">Fórum Debates FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <?php if (isset($_SESSION['logado'])):
                      echo '<div>
                              <a class="btn btn-info btn-large" href="criartopico.php">+Novo Sub Tópico</a>
                           </div>';
                      else:
                        echo '<div>
                                '.$msgerro2.'
                                <a data-toggle="modal" class="btn btn-info btn-medium" href="#CadMUForm">Cadastre-se para Participar do Fórum!</a>
                                <a data-toggle="modal" class="btn btn-warning btn-medium" href="#loginForm2">Já possui conta? Clique para Logar!</a>
                             </div>';    
                      endif;
                ?>
                <div class="box">
                    <div class="row-fluid label label-info">
                        <div class="span6 center"><h4>Tópico</h4></div>
                        <div class="span2 center"><h4>Respostas</h4></div>
                        <div class="span2 center"><h4>Exibições</h4></div>
                        <div class="span2 center"><h4>Data de Criação</h4></div>
                    </div>
                    
                    <?php 
                    if (!$subtopico->findAll()):
                        echo 'Nenhum Tópico Encontrado!';
                    else:
                        foreach($subtopico->findAll() as $key => $valTop):
                            echo'
                                <div class="row-fluid">
                                    <div class="span6">
                                        <ul class="faq">
                                            <li>
                                               <span class="number">'.($key + 1).'</span>
                                               <div>
                                                   <h4><a href="showsubtopicos.php?num='.$valTop->id.'">
                                                        '.$valTop->titulo.'
                                                    </a></h4>
                                                   <p>'.$valTop->descricao.'</p>
                                               </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="span2 center">x</div>
                                    <div class="span2 center">'.$valTop->qtdacesso.'</div>
                                    <div class="span2 center">'.utf8_encode(strftime( '%a, %d/%b/%Y', strtotime($valTop->data))).'</div>
                                </div>';
                        endforeach; 
                    endif;?>
                </div>
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

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
