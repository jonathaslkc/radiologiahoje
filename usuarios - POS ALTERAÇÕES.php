<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 
?>

<body>
    
<!--Header-->
    <?php include_once ("elements/menu.php"); 
    
    if(isset($_SESSION['logado'])):  //TESTAR SE ESTÁ LOGADO
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
    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
    <!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
    <section class="services">
        <form class="form-inline" action="usuarios.php" method="post" id="form-dados-usu">
        <div class="container">
            <div class="row-fluid">
                <!-- CADASTRO DE USUÁRIOS -->
                <h2 id="list_usuario">Listagem de Usuários Existentes</h2>
<!--                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>-->
                <table class="table table-inverse">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Membro</th>
                      <th>Usuário</th>
                      <th>Tipo de Acesso</th>
                      <th>Ativo</th>
                      <th>Último Acesso</th>
                      <th>Data Criação</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($logar->findAll() as $key => $valUsu): ?>
                  <h2><?php echo $key; ?></h2>
                    <tr id="sel-table">
                      <th scope="row"><?php echo $valUsu->id; ?></th>
                      <td><?php echo $valUsu->rel_usu_membro; ?></td>
                      <td><?php echo $valUsu->usuario; ?></td>
                      <td><?php
                            if ($valUsu->tipoacesso == '1'){
                                echo 'Comum';
                            }
                            if ($valUsu->tipoacesso == '2'){
                                echo 'Médio';
                            }
                            if ($valUsu->tipoacesso == '3'){
                                echo 'Avançado';
                            }?>
                      </td>
                      <td><?php 
                            if ($valUsu->ativo == '1'){
                                echo 'Sim';
                            }if ($valUsu->ativo == '0'){
                                echo 'Não';
                            }?>
                      </td>
                      <td><?php echo $valUsu->ultacesso; ?></td>
                      <td><?php echo $valUsu->dtcriacao; ?></td>
                      <td>
<!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal1<?php echo $valUsu->id; ?>">Visualizar</button>
                      </td>
                    </tr>
                        <!-- Formulário Modal -->                    
                        <div class="modal hide fade in" id="myModal1<?php echo $valUsu->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
                                        <h4>Formulário de Dados Cadastrais</h4>
                                    </div>
                                    <!--Modal Body-->
                                    <div class="modal-body center">
                                        <fieldset class="registration-form">
                                            <div class="control-group">
                                                <!-- ID -->
                                                <div class="controls">
                                                    <input type="text" id="id" name="idUsu<?php echo $valUsu->id ?>" placeholder="ID" readonly value="<?php echo $valUsu->id ?>" class="input-mini">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Usuario -->
                                                <div class="controls">
                                                    <input type="text" id="usuario" name="usuarioUsu" placeholder="Usuario" value="<?php echo $valUsu->usuario ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Senha -->
                                                <div class="controls">
                                                    <input type="text" id="senha" name="senhaUsu" value="" placeholder="Senha" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Último Acesso -->
                                                <div class="controls">
                                                    <input type="text" id="ultacesso" name="ultacessoUsu" placeholder="Data de Último Acesso" readonly value="<?php echo $valUsu->ultacesso ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Data de Criação -->
                                                <div class="controls">
                                                    <input type="text" id="dtcriacao" name="dtcriacaoUsu" value="<?php echo $valUsu->dtcriacao ?>" readonly placeholder="Data de Criação" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Tipo de Acesso-->
                                                <div class="controls">
                                                    <select id="tipoacesso" name="tipoacessoUsu">
                                                        <option value="1" <?php if ($valUsu->tipoacesso == "1"){echo 'selected';} ?>>Comum</option>
                                                        <option value="2" <?php if ($valUsu->tipoacesso == "2"){echo 'selected';} ?>>Mediano</option>
                                                        <option value="3" <?php if ($valUsu->tipoacesso == "3"){echo 'selected';} ?>>Avançado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Ativo? -->
                                                <div class="controls">
                                                    <label for="ativo">Ativo?</label><br>
                                                    Sim<input type="radio" id="ativo" <?php if ($valUsu->ativo == "1"){echo ' checked';} ?> name="ativoUsu<?php echo $valUsu->id?>" value="1">
                                                    Não<input type="radio" id="ativo" <?php if ($valUsu->ativo == "0"){echo ' checked';} ?> name="ativoUsu<?php echo $valUsu->id?>" value="0">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Buttons -->
                                                <div class="controls">
                                                    <input type="submit" class='btn btn-info btn-medium btn-block' name="atualizarUsu" value="Alterar">
                                                    <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao1=deletar&id=" . $valUsu->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valUsu->usuario . " ?\")'>Deletar</a>" ?>     
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Formulario Modal -->
                    <?php endforeach; ?>
                  </tbody>
                </table>
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
