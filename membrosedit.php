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
    <form class="form-inline" method="post" id="form-dados-usu">
        <div class="container">
            <div class="row-fluid">
                <div class="header">
                    <h4>Formulário de Dados Cadastrais - Membros</h4>
                </div>
                <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
			$id = (int)$_GET['id'];
			$resultado = $membroob->find($id);
                ?>
                <div class="center">
                    <fieldset class="text-success"><h3><?php echo $msgerromemedit; ?></h3></fieldset>
                     
                          <fieldset class="registration-form">
                            <div class="control-group">
                                <!-- Nome --><!-- Sobrenome -->
                                <div class="controls">
                                    <input type="text" id="nome" name="nomeMemedit" value="<?php echo $resultado->nome ?>" placeholder="Nome" class="input-xlarge"> <input type="text" id="sobrenome" name="sobrenomeMemedit" value="<?php echo $resultado->sobrenome ?>" placeholder="Sobrenome" class="input-xlarge">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- cpf -->
                                <div class="controls">
                                    <input type="text" id="cpf" name="cpfMemedit" value="<?php echo $resultado->cpf ?>" placeholder="CPF" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- dtnasc -->
                                <div class="controls">
                                    <input type="text" id="dtnasc" name="dtnascMemedit" value="<?php echo $resultado->dtnasc ?>" placeholder="Data de Nascimento" class="input-xlarge">                                    
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- logradouro --><!-- complemento --><!-- numero -->
                                <div class="controls">
                                    <input type="text" id="logradouro" name="logradouroMemedit" value="<?php echo $resultado->logradouro ?>" placeholder="Logradouro" class="input-medium"> <input type="text" id="complemento" name="complementoMemedit" value="<?php echo $resultado->complemento ?>" placeholder="Complemento" class="input-medium"> <input type="text" id="numero" name="numeroMemedit" value="<?php echo $resultado->numero ?>" placeholder="Número" class="input-small">
                                </div>
                            </div>
                            <div class="control-group">
                              <!-- CEP -->
                                <div class="controls">
                                    <input type="text" id="cep" name="cepMemedit" value="<?php echo $resultado->cep ?>" placeholder="CEP" class="input-medium">
                                </div>
                            </div>      
                            <div class="control-group">
                                <!-- telefone --><!-- celular -->
                                <div class="controls">
                                    <input type="text" id="telefone" name="telefoneMemedit" value="<?php echo $resultado->telefone ?>" placeholder="Telefone" class="input-medium"> <input type="text" id="celular" name="celularMemedit" value="<?php echo $resultado->celular ?>" placeholder="Celular" class="input-medium">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- email -->
                                <div class="controls">
                                    <input type="text" id="email" name="emailMemedit" value="<?php echo $resultado->email ?>" readonly placeholder="email" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                              <!-- Ativo -->
                              <div class="controls">
                                  <label for="ativo">Ativo?</label><br>
                                  Sim<input type="radio" id="ativo" name="ativoMemedit" value="1" <?php if ($resultado->ativo == "1"){echo ' checked';} ?>>
                                  Não<input type="radio" id="ativo" name="ativoMemedit" value="0" <?php if ($resultado->ativo == "0"){echo ' checked';} ?>>
                              </div>
                            </div>  
                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls">
                                    <button class="btn btn-success btn-large btn-block" name="atualizarMem" type="submit">Alterar</button>
                                    <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao2=deletar&id=" . $resultado->id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultado->nome . " ?\")'>Deletar</a>" ?>
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

</body>
</html>
