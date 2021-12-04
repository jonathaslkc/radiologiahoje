<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 
?>

<body>
    
<!--Header-->
    <?php include_once ("elements/menu.php"); 
    
    
    
    if(isset($_SESSION['logado'])  && (($_SESSION['tipoacesso'] == '2') || ($_SESSION['tipoacesso'] == '3'))):  //TESTAR SE ESTÁ LOGADO
    ?>
<!-- /header -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <h1>Painel Administrativo <br> Editor de Evento</h1>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
    
    <section class="services">
    <form class="form-inline" id="uploadimage" action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row-fluid">
                <div class="header">
                    <h4>Formulário de Dados - Eventos</h4>
                </div>
                <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
                    $id = (int)$_GET['id'];
                    $resultado = $evento->find($id);
                ?>
                <div class="center">
                <fieldset class="registration-form">
                    <fieldset class="text-success"><h3><?php echo $msgerro2; ?></h3></fieldset>
                        <div class="control-group">
                            <!-- ID -->
                            <div class="controls">
                                <input type="text" readonly placeholder="ID" value="<?php echo $resultado->id ?>" class="input-mini">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Usuario -->
                            <div class="controls">
                                <input type="text" required id="titulo" name="titulo" placeholder="Título" value="<?php echo $resultado->titulo ?>" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Senha -->
                            <div class="controls">
                                <textarea name="descricao" maxlength="255" class="input-xxlarge" placeholder="Digite aqui uma descrição [Máx.: 255 Caract.]"><?php echo $resultado->descricao ?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label id="icone">Ícone [Símbolo]</label>
                            <div class="controls">
                                <select name="icon">
                                    <option value="icon-globe icon-medium" <?php if ($resultado->icon == "icon-globe icon-medium"){echo 'selected';} ?>>Globo</option>
                                    <option value="icon-music icon-medium" <?php if ($resultado->icon == "icon-music icon-medium"){echo 'selected';} ?>>Musical</option>
                                    <option value="icon-heart icon-medium" <?php if ($resultado->icon == "icon-heart icon-medium"){echo 'selected';} ?>>Coração</option>
                                    <option value="icon-book icon-medium" <?php if ($resultado->icon == "icon-education icon-medium"){echo 'selected';} ?>>Livro</option>
                                    <option value="icon-glass icon-medium" <?php if ($resultado->icon == "icon-glass icon-medium"){echo 'selected';} ?>>Taça</option>
                                    <option value="icon-briefcase icon-medium" <?php if ($resultado->icon == "icon-briefcase icon-medium"){echo 'selected';} ?>>Mala</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label id="lic">Legenda [ícone]:</label>
                            <div class="controls">
                                <div class="row-fluid">
                                    <div class="span4">
                                        <i class="icon-globe icon-mini"></i><span>Globo</span><br>
                                        <i class="icon-music icon-mini"></i><span>Mussical</span><br>
                                    </div>
                                    <div class="span4">
                                        <i class="icon-heart icon-mini"></i><span>Coração</span><br>
                                        <i class="icon-book"></i><span>Livro</span><br>
                                    </div>
                                    <div class="span4">
                                        <i class="icon-glass icon-mini"></i><span>Taça</span><br>
                                        <i class="icon-briefcase icon-mini"></i><span>Mala</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="url" maxlength="150" value="<?php echo $resultado->fonte ?>" name="fonte" placeholder="Fonte" class="input-xxlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" id="dtexpirar" name="dtexpirar" value="<?php echo utf8_encode(strftime( '%d-%m-%Y', strtotime($resultado->dtexpirar))); ?>" placeholder="Data para Expirar" class="input-xxlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Ativo? -->
                            <div class="controls">
                                <label for="ativo">Ativo?</label><br>
                                Sim<input type="radio" id="ativo" name="ativo" value="1" <?php if ($resultado->ativo == "1"){echo ' checked';} ?>>
                                Não<input type="radio" id="ativo" name="ativo" value="0" <?php if ($resultado->ativo == "0"){echo ' checked';} ?>>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Buttons -->
                            <div class="controls">
                                <button class="btn btn-success btn-large btn-block" name="atualizarEve" type="submit">Alterar</button>
                                <?php echo "<a class='btn btn-danger btn-medium btn-block' href='eventos-ferramentas.php?acaoEve=deletar&id=" . $resultado->id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultado->titulo . " ?\")'>Deletar</a>" ?>
                            </div>
                        </div>
                </fieldset>
                </div>
                <?php } ?>
            </div>
        </div>
    </form>
    </section>
    
<?php


else:
    echo('
            <section id="registration-page" class="container center">
                <fieldset class="registration-form">
                    <div class="control-group center">
                        <h3 class="text-error">Você não possui Permissão para continuar!</h3>
                        <a href="index.php" class="text-info"><h4>Voltar</h4></a>
                    </div>
                </fieldset>
            </section>
        ');
endif;


include_once ("elements/footer.php"); 
?>
   

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(function() {
    $( "#dtexpirar" ).datepicker({
        format: 'yyyy/mm/dd'
    });
  });
</script>

</body>
</html>
