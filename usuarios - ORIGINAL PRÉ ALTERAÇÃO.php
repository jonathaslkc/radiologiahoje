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
                                    <select id="rel_usu_membro" name="rel_usu_membro1">
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
                                    <input type="text" id="nome" name="nome" placeholder="Nome" class="input-xlarge"> <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" class="input-xlarge">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- cpf -->
                                <div class="controls">
                                    <input type="text" id="cpf" name="cpf" placeholder="CPF" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- dtnasc -->
                                <div class="controls">
                                    <input type="text" id="dtnasc" name="dtnasc" placeholder="Data de Nascimento" class="input-xlarge">                                    
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- logradouro --><!-- complemento --><!-- numero -->
                                <div class="controls">
                                    <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" class="input-medium"> <input type="text" id="complemento" name="complemento" placeholder="Complemento" class="input-medium"> <input type="text" id="numero" name="numero" placeholder="Número" class="input-small">
                                </div>
                            </div>
                            <div class="control-group">
                              <!-- CEP -->
                                <div class="controls">
                                    <input type="text" id="cep" name="cep" placeholder="CEP" class="input-medium">
                                </div>
                            </div>      
                            <div class="control-group">
                                <!-- telefone --><!-- celular -->
                                <div class="controls">
                                    <input type="text" id="telefone" name="telefone" placeholder="Telefone" class="input-medium"> <input type="text" id="celular" name="celular" placeholder="Celular" class="input-medium">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- email -->
                                <div class="controls">
                                    <input type="text" id="email" name="email" placeholder="email" class="input-xlarge">
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
                                    <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarUsu">Cadastrar</button>
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

    <!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
    
    <section class="services">
        <form class="form-inline" action="usuarios.php" method="post" id="form-dados-usu">
        <div class="container">
            <div class="row-fluid">
                
                <!-- CADASTRO DE USUÁRIOS -->
                <h2 id="list_usuario">Listagem de Usuários Existentes</h2>
                <div class="widget search">
<!--                    <form>
                        <input type="text" class="input-block-level" placeholder="Pesquisar por Usuário">
                    </form>-->
                </div>
                
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
                    <?php foreach($logar->findAll() as $key => $value1): ?>
                    <tr id="sel-table">
                      <th scope="row"><?php echo $value1->id; ?></th>
                      <td><?php echo $value1->rel_usu_membro; ?></td>
                      <td><?php echo $value1->usuario; ?></td>
                      <td>
                          <?php
                            if ($value1->tipoacesso == '1'){
                                echo 'Comum';
                            }
                            if ($value1->tipoacesso == '2'){
                                echo 'Médio';
                            }
                            if ($value1->tipoacesso == '3'){
                                echo 'Avançado';
                            }
                            ?>
                      </td>
                      <td>
                        <?php 
                            if ($value1->ativo == '1') {
                                echo 'Sim';
                            }else{
                                echo 'Não';
                            }
                        ?>
                      </td>
                      <td><?php echo $value1->ultacesso; ?></td>
                      <td><?php echo $value1->dtcriacao; ?></td>
                      <td>
<!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal1<?php echo $value1->id; ?>">Visualizar</button>
                      </td>
                    </tr>
                    
                        <!-- Formulário Modal -->                    
                        <div class="modal hide fade in" id="myModal1<?php echo $value1->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
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
                                                    <input type="text" id="id" name="idUsu" placeholder="ID" value="<?php echo $value1->id ?>" class="input-mini">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Usuario -->
                                                <div class="controls">
                                                    <input type="text" id="usuario" name="usuarioUsu" placeholder="Usuario" value="<?php echo $value1->usuario ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Último Acesso -->
                                                <div class="controls">
                                                    <input type="text" id="ultacesso" name="ultacessoUsu" placeholder="Data de Último Acesso" readonly value="<?php echo $value1->ultacesso ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Data de Criação -->
                                                <div class="controls">
                                                    <input type="text" id="dtcriacao" name="dtcriacaoUsu" value="<?php echo $value1->dtcriacao ?>" readonly placeholder="Data de Criação" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Tipo de Acesso-->
                                                <div class="controls">
                                                    <select id="tipoacesso" name="tipoacessoUsu">
                                                        <option value="1" <?php if ($value1->tipoacesso == "1"){echo 'selected';} ?>>Comum</option>
                                                        <option value="2" <?php if ($value1->tipoacesso == "2"){echo 'selected';} ?>>Mediano</option>
                                                        <option value="3" <?php if ($value1->tipoacesso == "3"){echo 'selected';} ?>>Avançado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Ativo? -->
                                                <div class="controls">
                                                    <label for="ativo">Ativo?</label><br>
                                                    Sim<input type="radio" id="ativo" name="ativoUsu" value="1" <?php if ($value1->ativo == "1"){echo ' checked';}else{ echo ' disabled';} ?>>
                                                    Não<input type="radio" id="ativo" name="ativoUsu" value="0" <?php if ($value1->ativo == "0"){echo ' checked';} ?>>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Buttons -->
                                                <div class="controls"><h2><?php echo $value1->ativo ?></h2>
                                                    <button class="btn btn-success btn-large btn-block" name="atualizarUsu" type="submit">Alterar</button>
                                                    <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao1=deletar&id=" . $value1->id . "' onclick='return confirm(\"Deseja realmente deletar " . $value1->usuario . " ?\")'>Deletar</a>" ?>
                                                        
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
                <br><hr><br>
                
                <!-- -------------### LISTAGEM DE MEMBROS  ###----------------- -->
                
                <h2 id="list_membro">Listagem de Membros Existentes</h2>
                <!-- CADASTRO DE MEMBROS -->
                <div class="widget search">
<!--                    <form>
                        <input type="text" class="input-block-level" placeholder="Pesquisar por Nome">
                    </form>-->
                </div>
                
                <table class="table table-inverse">
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
                    <?php foreach($membroob->findAll() as $key => $value2): ?>
                    <tr id="sel-table">
                      <th scope="row"><?php echo $value2->id; ?></th>
                      <td><?php echo $value2->nome.' '.$value2->sobrenome; ?></td>
                      <td><?php echo $value2->dtnasc; ?></td>
                      <td><?php echo $value2->cpf; ?></td>
                      <td><?php echo $value2->logradouro.' - '.$value2->complemento.', '.$value2->numero.' - '.$value2->cep; ?></td>
                      <td><?php echo 'Tel.: '.$value2->telefone.'<br>Cel.: '.$value2->celular; ?></td>
                      <td><?php echo $value2->email; ?></td>
                      <td>
                            <?php
                            if ($value2->ativo == '1') {
                                echo 'Sim';
                            } else {
                                echo 'Não';
                            }
                            ?>
                      </td>
                      <td>
<!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $value2->id; ?>2">Visualizar</button>
                      </td>
                    </tr>
                    
                        <!-- Formulário Modal -->                    
                        <div class="modal hide fade in" id="myModal<?php echo $value2->id; ?>2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
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
                                                    <input type="text" id="id" name="id" placeholder="ID" value="<?php echo $value2->id ?>" class="input-mini">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Usuario -->
                                                <div class="controls">
                                                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $value2->usuario ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Último Acesso -->
                                                <div class="controls">
                                                    <input type="text" id="ultacesso" name="ultacesso" placeholder="Data de Último Acesso" readonly value="<?php echo $value2->ultacesso ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Data de Criação -->
                                                <div class="controls">
                                                    <input type="text" id="dtcriacao" name="dtcriacao" value="<?php echo $value2->dtcriacao ?>" readonly placeholder="Data de Criação" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Tipo de Acesso-->
                                                <div class="controls">
                                                    <select id="tipoacesso" name="tipoacesso">
                                                        <option value="1" <?php if ($value2->tipoacesso == "1"){echo 'selected';} ?>>Comum</option>
                                                        <option value="2" <?php if ($value2->tipoacesso == "2"){echo 'selected';} ?>>Mediano</option>
                                                        <option value="3" <?php if ($value2->tipoacesso == "3"){echo 'selected';} ?>>Avançado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Ativo? -->
                                                <div class="controls">
                                                    <label for="ativo">Ativo?</label><br>
                                                    Sim<input type="radio" id="ativo" name="ativo" value="1" <?php if ($value2->ativo == "1"){echo 'checked';} ?>>
                                                    Não<input type="radio" id="ativo" name="ativo" checked value="0" <?php if ($value2->ativo == "0"){echo 'checked';} ?>>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <!-- Buttons -->
                                                <div class="controls">
                                                    <button class="btn btn-success btn-large btn-block" type="submit">Alterar</button>
                                                    <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acao1=deletar&id=" . $value2->id . "' onclick='return confirm(\"Deseja realmente deletar " . $value2->usuario . " ?\")'>Deletar</a>" ?>
                                                        
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
