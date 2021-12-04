<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 

$tamtxt = 35;
$tamtxtc= 150;
$tamtit = 20;
$msgerro3='';
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
                <h1>Painel Administrativo <br> Tópicos e suas ferramentas</h1>
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
    <br>
    <div class="container">
        <h4>Ir para:</h4>
        <ul>
            <li><a href="#list_topics">Listagem de Tópicos</a></li>
            <li><a href="#list_subtopics">Listagem de Sub Tópicos</a></li>
        </ul>
    </div>
<section id="registration-page" class="container center">
    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
        <h3>Cadastrar</h3>
  
<!--        <textarea>Easy! You should check out MoxieManager!</textarea>-->
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <h5>Novo Tópico</h5>[clique]
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="" name="">
                        <hr>
                            <fieldset class="registration-form">
                                <div class="control-group">
                                    <!-- Título -->
                                    <div class="controls">
                                        <input type="text" name="titulo" <?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo "value=\"" . $titulo . "\"";} ?>  placeholder="Digite um Título para o Tópico" class="input-xxlarge"><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- texto -->
                                    <div class="controls">
                                        <textarea name="descricao" maxlength="150" class="input-xxlarge" placeholder="Digite aqui uma descrição"><?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo $descricao;}else{echo '';} ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Buttons -->
                                    <div class="controls">
                                        <input type="submit" name="cadastrarTop" value="Cadastrar" class="btn btn-success btn-large btn-block">
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
                        <h5> Novo Sub Tópico </h5>[clique]
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="" name="">
                        <hr>
                            <fieldset class="registration-form">
                                <div class="control-group">
                                    <!-- Relação com Categoria -->  
                                    <div class="controls">
                                        <select name="rel_stopico_topico">
                                            <optgroup label="Relacionar ao Tópico">
                                                <?php foreach($topico->findAll() as $key => $valTop1): ?>
                                                    <?php echo '<option value="'.$valTop1->titulo.'" >'.$valTop1->titulo.'</option>'; ?>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Título -->
                                    <div class="controls">
                                        <input type="text" name="titulo" placeholder="Digite um Título para o Sub Tópico" class="input-xxlarge"><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- texto -->
                                    <div class="controls">
                                        <textarea name="descricao" class="input-xxlarge" placeholder="Digite aqui o que deseja colocar em enquete!"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Ativo? -->
                                    <div class="controls">
                                        <label for="ativo">Ativo?</label><br>
                                        Sim<input type="radio" id="ativo" name="ativo" value="1" checked>
                                        Não<input type="radio" id="ativo" name="ativo" value="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Buttons -->
                                    <div class="controls">
                                        <input type="submit" name="cadastrarSTop" value="Cadastrar" class="btn btn-success btn-large btn-block">
                                    </div>
                                </div>
                          </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------### LISTAGENS  ###----------------- -->
    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
    <!-- -------------### LISTAGEM DE POSTAGENS  ###----------------- -->
                <h2 id="list_topics">Listagem de Tópicos Existentes</h2>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!$topico->findAll()): 
                        echo '<tr><td colspan="5">Nenhum Dado Encontrado!</td></tr>'; 
                    else: 
                        foreach($topico->findAll() as $key => $valTop): ?>
                        <tr id="sel-table">
                            <th scope="row"><?php echo $valTop->id; ?></th>
                            <td><?php echo $valTop->titulo; ?></td>
                            <td><?php echo $valTop->descricao; ?></td>
                            <td>
      <!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                              <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editortopicos.php?acao=editar&id=" . $valTop->id . "'>Editar</a>"; ?>
                              <?php echo "<a class='btn btn-danger btn-medium btn-block' href='topicos-ferramentas.php?acao=deletar&id=" . $valTop->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valTop->titulo . " ?\")'>Deletar</a>" ?>
                            </td>
                        </tr>
                        <?php endforeach; 
                    endif;?>
                </tbody>
                </table>
                </form>
                <br><hr><br>
                
                <h2 id="list_subtopics">Listagem de Sub tópicos Existentes</h2>
                 <?php echo '<h4>'.$msgerro3.'</h4>' ?>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por título"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Tópico</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Acessos</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!$subtopico->findAll()): 
                        echo '<tr><td colspan="9">Nenhum Dado Encontrado!</td></tr>'; 
                    else: 
                        foreach($subtopico->findAll() as $key => $valSTop): ?>
                        <tr id="sel-table">
                            <th scope="row"><?php echo $valSTop->id; ?></th>
                            <td><?php echo $valSTop->rel_usu_stopico; ?></td>
                            <td><?php echo $valSTop->rel_stopico_topico; ?></td>
                            <td><?php echo $valSTop->titulo; ?></td>
                            <td><?php echo $valSTop->descricao; ?></td>
                            <td><?php echo utf8_encode(strftime( '%a, %d/%b/%Y', strtotime($valSTop->data))); ?></td>
                            <td><?php echo $valSTop->qtdacesso; ?></td>
                            <td><?php 
                                  if ($valSTop->ativo == '1'){
                                      echo 'Ativa';
                                  }if ($valSTop->ativo == '0'){
                                      echo 'Desativada';
                                  }
                                ?>
                            </td>
                            <td>
      <!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                              <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editorsubtopicos.php?acao=editar&id=" . $valSTop->id . "'>Editar</a>"; ?>
                              <?php echo "<a class='btn btn-danger btn-medium btn-block' href='topicos-ferramentas.php?acaoStop=deletar&id=" . $valSTop->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valSTop->titulo . " ?\")'>Deletar</a>" ?>
                            </td>
                        </tr>
                        <!--  Coment form -->
                        <div class="modal hide fade in" id="comentForm<?php echo $key; ?>" aria-hidden="false">
                            <div class="modal-header">
                                <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
                                <h4>Comentário</h4>
                            </div><!--Modal Body-->
                            <div class="modal-body">
                                <p>" <?php echo $valCom->texto ?> "</p>
                            </div><!--/Modal Body-->
                        </div>
                        <!--  /Coment form -->
                        <?php 
                        endforeach;
                    endif;?>
                </tbody>
                </table>
                </form>
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
