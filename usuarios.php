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
    <div class="row-fluid" id="ad" hidden>
        <!-- Administrativo -->
        <?php include_once ("elements/admin.php"); ?>
        <!-- /Administrativo -->
    </div>
    <div class="row-fluid">
        <div class="span8"></div>
        <div class="span3" style="text-align: right;">
            <div class="btn btn-success" style="text-align: right; border: 1px solid" id="k" onclick="if (document.getElementById('ad').hidden == false){document.getElementById('ad').hidden = true;document.getElementById('i-um').hidden = false;document.getElementById('i-dois').hidden = true;}else{document.getElementById('ad').hidden = false;document.getElementById('i-um').hidden = true;document.getElementById('i-dois').hidden = false;}">
                <div hidden id="i-dois"><i id="a" class="icon-chevron-up"></i>Ferramentas</div><div id="i-um"><i id="a" class="icon-chevron-down"></i>Ferramentas</div>
            </div>
        </div>
        <div class="span1"></div>
    </div>
    <!-- / .title -->
<?php 
    if(isset($_SESSION['logado'])  && (($_SESSION['tipoacesso'] == '2') || ($_SESSION['tipoacesso'] == '3'))):
?>
<section id="registration-page" class="container center">
    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
        <h3>Inserção de Contas</h3>
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <h5>Cadastro de Usuários</h5>[clique]
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="" name="">
                        <hr>
                          <fieldset class="registration-form">
                            <div class="control-group">
                                <!-- Relação Membro -->
                                <div class="controls">
                                    <select name="rel_usu_membro1">
                                        <optgroup label="Membro à Receber Acesso">
                                            <?php foreach($membroob->findAll() as $key => $value0): ?>
                                                <?php echo '<option value="'.$value0->email.'" >'.$value0->nome.' '.$value0->sobrenome.'</option>' ?>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select> 
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- Usuario -->
                                <div class="controls">
                                    <input type="text" id="usuario" name="usuario1" placeholder="Usuario" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Senha -->
                                <div class="controls">
                                    <input type="password" id="senha" name="senha1" placeholder="Senha" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- Tipo de Acesso-->
                                <div class="controls">
                                    <select id="tipoacesso" name="tipoacesso1">
                                        <optgroup label="Níveis de Acesso">
                                            <option value="1" >Comum</option>
                                            <option value="2" >Mediano</option>
                                            <option value="3" >Avançado</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                              <!-- Ativo? -->
                              <div class="controls">
                                  <label for="ativo">Ativo?</label><br>
                                  Sim<input type="radio" id="ativo" name="ativo1" value="1" checked>
                                  Não<input type="radio" id="ativo" name="ativo1" value="0" >
                              </div>
                            </div>

                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls">
                                    <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarUsu">Cadastrar</button>
                                    <button class="btn btn-info btn-medium btn-block" type="reset">Limpar</button>
                                </div>
                            </div>
                          </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        <h5>Cadastro de Membros </h5>[clique]
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                    <form method="POST" action="" name="">
                        <hr>
                          <fieldset class="registration-form">
                            <div class="control-group">
                                <!-- Nome --><!-- Sobrenome -->
                                <div class="controls">
                                    <input type="text" id="nome" name="nome2" placeholder="Nome" class="input-xlarge"> <input type="text" id="sobrenome" name="sobrenome2" placeholder="Sobrenome" class="input-xlarge">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- cpf -->
                                <div class="controls">
                                    <input type="text" id="cpf" name="cpf2" placeholder="CPF" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- dtnasc -->
                                <div class="controls">
                                    <input type="text" id="dtnasc" name="dtnasc2" placeholder="Data de Nascimento" class="input-xlarge">                                    
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- logradouro --><!-- complemento --><!-- numero -->
                                <div class="controls">
                                    <input type="text" id="logradouro" name="logradouro2" placeholder="Logradouro" class="input-medium"> <input type="text" id="complemento" name="complemento2" placeholder="Complemento" class="input-medium"> <input type="text" id="numero" name="numero2" placeholder="Número" class="input-small">
                                </div>
                            </div>
                            <div class="control-group">
                              <!-- CEP -->
                                <div class="controls">
                                    <input type="text" id="cep" name="cep2" placeholder="CEP" class="input-medium">
                                </div>
                            </div>      
                            <div class="control-group">
                                <!-- telefone --><!-- celular -->
                                <div class="controls">
                                    <input type="text" id="telefone" name="telefone2" placeholder="Telefone" class="input-medium"> <input type="text" id="celular" name="celular2" placeholder="Celular" class="input-medium">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- email -->
                                <div class="controls">
                                    <input type="text" id="email" name="email2" placeholder="email" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                              <!-- Ativo -->
                              <div class="controls">
                                  <label for="ativo2">Ativo?</label><br>
                                  Sim<input type="radio" id="ativo" name="ativo2" value="1" checked>
                                  Não<input type="radio" id="ativo" name="ativo2" value="0" >
                              </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls">
                                    <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarMem">Cadastrar</button>
                                    <button class="btn btn-info btn-medium btn-block" type="reset">Limpar</button>
                                </div>
                            </div>
                          </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    endif;
?>
    <!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
    
    <section class="services">
        <form class="form-inline" action="usuarios.php" method="post" id="form-dados-usu">
        <div class="container">
            <div class="row-fluid">
<!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
                <h2 id="list_usuario">Listagem de Usuários Existentes</h2>
<!--                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>-->
                <table class="table-responsive">
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
                    <tr>
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
                        <td><?php echo utf8_encode(strftime( '%d/%b/%Y - %X', strtotime($valUsu->ultacesso))); ?></td>
                        <td><?php echo utf8_encode(strftime( '%d/%b/%Y - %X', strtotime($valUsu->dtcriacao))); ?></td>
                        <td>
  <!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                          <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='usuariosedit.php?acao=editar&id=" . $valUsu->id . "'>Editar</a>"; ?>
                          <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao1=deletar&id=" . $valUsu->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valUsu->usuario . " ?\")'>Deletar</a>" ?>
                        </td>
                    </tr>                        
                    <?php endforeach; ?>
                </tbody>
                </table>
                <br><hr><br>
                
                <!-- -------------### LISTAGEM DE MEMBROS  ###----------------- -->
                
                <h2 id="list_membro">Listagem de Membros Existentes</h2>
                <!-- CADASTRO DE MEMBROS -->
                <div class="widget search">
                    <input type="text" class="input-block-level" placeholder="Pesquisar por Nome">
                </div>
                
                <table class="table-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome Completo</th>
                      <th>Data de Nascimento</th>
                      <th>CPF</th>
                      <th>Endereço</th>
                      <th>Contato</th>
                      <th>Email</th>
                      <th>Ativo</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($membroob->findAll() as $key => $valMem): ?>
                    <tr>
                      <th scope="row"><?php echo $valMem->id; ?></th>
                      <td><?php echo $valMem->nome.' '.$valMem->sobrenome; ?></td>
                      <td><?php echo $valMem->dtnasc; ?></td>
                      <td><?php echo $valMem->cpf; ?></td>
                      <td><?php echo $valMem->logradouro.' - '.$valMem->complemento.', '.$valMem->numero.' - '.$valMem->cep; ?></td>
                      <td><?php echo 'Tel.: '.$valMem->telefone.'<br>Cel.: '.$valMem->celular; ?></td>
                      <td><?php echo $valMem->email; ?></td>
                      <td>
                            <?php
                            if ($valMem->ativo == '1') {
                                echo 'Sim';
                            } else {
                                echo 'Não';
                            }
                            ?>
                      </td>
                      <td>
                            <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='membrosedit.php?acao=editar&id=" . $valMem->id . "'>Editar</a>"; ?>
                            <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao2=deletar&id=" . $valMem->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valMem->nome . " ?\")'>Deletar</a>" ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                
               <!-- <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-bar-chart icon-large"></i>
                        <p> </p>
                        <h4>Premium Bootstrap Templates</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-cog icon-large"></i>
                        <p> </p>
                        <h4>Web Design &amp; Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-heart icon-large"></i>
                        <p> </p>
                        <h4>Premium Wordpress Themes</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row-fluid">
                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-globe icon-large"></i>
                        <p> </p>
                        <h4>Responsive Web Design</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-camera icon-large"></i>
                        <p> </p>
                        <h4>iOS Application Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-bullhorn icon-large"></i>
                        <p> </p>
                        <h4>Android Application Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>-->

            </div>
            <hr>
            <p>&nbsp;</p>
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
<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "scrollX": true
    } );
} );
</script>
    
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
