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
                <h1>Painel Administrativo <br> Listagem de Serviços para Usuários/Membros</h1>
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
                    <h4>Formulário de Dados Cadastrais - Usuários</h4>
                </div>
                <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
			$id = (int)$_GET['id'];
			$resultado = $logar->find($id);
                        
                ?>
                <div class="center">
                <fieldset class="registration-form">
                    <fieldset class="text-success"><h3><?php echo $msgerrousuedit; ?></h3></fieldset>
<!--                        <div class="control-group">
                             Perfil 
                            <div class="controls">
                                <img style="width:130px;height:120px;border-radius:10px;box-shadow: 7px 5px 3px #666" src="images/sample/<?php if (!$resultado->img){echo 'person-icon.png';}else{echo $resultado->img;} ?>">
                                <div class="main">
                                    <div id="image_preview"><img id="previewing" src="noimage.png" /></div>
                                    <hr id="line">
                                    <div id="selectImage">
                                        <input type="file"  name="file" id="file" required /><br>
                                        <input type="submit" value="Inserir Imagem" name="upar" class="submit btn btn-warning" />
                                    </div>
                                </div>
                                <h4 id='loading' >Carregando...</h4>
                                <p id="message"></p>
                            </div>
                        </div>-->
                        <div class="control-group">
                            <!-- Perfil -->
                            <div class="controls">
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo $msg; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <img style="width:130px;height:120px;border-radius:10px;box-shadow: 7px 5px 3px #666" 
                                            src="images/sample/<?php if (!$resultado->img){echo 'person-icon.png';}else{echo $resultado->img;} ?>">
                                        </div>
                                    </div>
                                <fieldset class="registration-form">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="file" id="img" name="img" class="btn btn-warning input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="submit" id="enviar" name="carregarImgUsu" class="btn btn-success btn-block btn-large" value="Carregar Imagem">
                                            <br><h6 class="text-info">Extensão da imagem: png/jpg/jpeg<br>Tamanho: até 2mb.</h6>
                                        </div>
                                    </div>
                                </fieldset> 
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- ID -->
                            <div class="controls">
                                <input type="text" readonly id="id" name="idUsuedit" placeholder="ID" value="<?php echo $resultado->id ?>" class="input-mini">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Usuario -->
                            <div class="controls">
                                <input type="text" required id="usuario" name="usuarioUsuedit" placeholder="Usuario" value="<?php echo $resultado->usuario ?>" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Senha -->
                            <div class="controls">
                                <input type="text" id="senha" name="senhaUsuedit" placeholder="Alterar Senha" maxlength="6" title="Digite, se deseja alterar a Senha" class="input-xlarge">
                                <br><h6 class="text-info">Digite, somente, se deseja alterá-la.</h6>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Último Acesso -->
                            <div class="controls">
                                <input type="text" required id="ultacesso" name="ultacessoUsuedit" placeholder="Data de Último Acesso" readonly value="<?php echo $resultado->ultacesso ?>" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Data de Criação -->
                            <div class="controls">
                                <input type="text" required id="dtcriacao" name="dtcriacaoUsuedit" value="<?php echo $resultado->dtcriacao ?>" readonly placeholder="Data de Criação" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Tipo de Acesso-->
                            <div class="controls">
                                <select id="tipoacesso" name="tipoacessoUsuedit">
                                    <option value="1" <?php if ($resultado->tipoacesso == "1"){echo 'selected';} ?>>Comum</option>
                                    <option value="2" <?php if ($resultado->tipoacesso == "2"){echo 'selected';} ?>>Mediano</option>
                                    <option value="3" <?php if ($resultado->tipoacesso == "3"){echo 'selected';} ?>>Avançado</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Ativo? -->
                            <div class="controls">
                                <label for="ativo">Ativo?</label><br>
                                Sim<input type="radio" id="ativo" name="ativoUsuedit" value="1" <?php if ($resultado->ativo == "1"){echo ' checked';} ?>>
                                Não<input type="radio" id="ativo" name="ativoUsuedit" value="0" <?php if ($resultado->ativo == "0"){echo ' checked';} ?>>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Buttons -->
                            <div class="controls">
                                <button class="btn btn-success btn-large btn-block" name="atualizarUsu" type="submit">Alterar</button>
                                <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao1=deletar&id=" . $resultado->id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultado->usuario . " ?\")'>Deletar</a>" ?>
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
<script src="js/scriptimgusuario.js"></script>

</body>
</html>
