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
                <h1>Painel Administrativo <br> Postagens e suas ferramentas</h1>
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
            <li><a href="#list_membro">Listagem de Categorias/Tags</a></li>
            <li><a href="#list_comments">Listagem de Comentários</a></li>
        </ul>
    </div>
<section id="registration-page" class="container center">
    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
        <h3>Inserção de Categorias/Tags relacionadas a postagem</h3>
  
<!--        <textarea>Easy! You should check out MoxieManager!</textarea>-->
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <h5>Cadastro de Categoria</h5>[clique]
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="" name="">
                        <hr>
                          <fieldset class="registration-form">
                            <div class="control-group">
                                <!-- Categoria -->
                                <div class="controls">
                                    <input type="text" id="nomecategoria" name="nomecategoria" placeholder="Digite de Categoria" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls">
                                    <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarCat">Cadastrar</button>
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
                        <h5>Cadastro de Tag </h5>[clique]
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
                                    <select id="rel_tags_post" name="rel_tags_post">
                                        <optgroup label="Relacionar à Categoria">
                                            <?php foreach($categoriaob->findAll() as $key => $valCat): ?>
                                                <?php echo '<option value="'.$valCat->nome.'" >'.$valCat->nome.'</option>' ?>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Nome -->
                                <div class="controls">
                                    <input type="text" id="nometag" name="nometag" placeholder="Nome de Tag" class="input-xlarge">
                                </div>
                            </div>
                              
                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls">
                                    <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarTag">Cadastrar</button>
                                </div>
                            </div>
                          </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        <a class="btn btn-info btn-large btn-block" target="_blank" href="criarpostagem.php">Criar Postagem</a>
    
    </section>

    <!-- -------------### LISTAGENS  ###----------------- -->
    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
    <!-- -------------### LISTAGEM DE POSTAGENS  ###----------------- -->
                <h2 id="list_usuario">Listagem de Postagens Existentes</h2>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Membro</th>
                        <th>Título</th>
                        <th>Trecho de Texto</th>
                        <th>Imagem Anexada</th>
                        <th>Data de Publicação</th>
                        <th>Cat. Add.</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($postagensob->findAll() as $key => $valPos): ?>
                    <tr id="sel-table">
                        <th scope="row"><?php echo $valPos->id; ?></th>
                        <td><?php echo $valPos->rel_post_membro; ?></td>
                        <td><?php echo $valPos->titulo; ?></td>
                        <td>
                            <?php if (strlen($valPos->texto) > $tamtxt):
                                    echo substr($valPos->texto, 0, $tamtxt).'...';
                                  else: 
                                    echo $valPos->texto; 
                                  endif;?>
                        </td>
                        <td><?php echo '<img style="width:90px;" src="images/sample/uploadpost/'.$valPos->img.'">' ?></td>
                        <td><?php echo utf8_encode(strftime( '%a, %d/%b/%Y', strtotime($valPos->datapublicacao))); ?></td>
                        <td><?php echo $valPos->rel_categoria; ?></td>
                        <td><?php 
                              if ($valPos->ativo == '1'){
                                  echo 'Publicada';
                              }if ($valPos->ativo == '0'){
                                  echo 'Desativada';
                              }
                            ?>
                        </td>
                        <td>
  <!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                          <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editorpostagem.php?acao=editar&id=" . $valPos->id . "'>Editar</a>"; ?>
                          <?php echo "<a class='btn btn-danger btn-medium btn-block' href='postagens-ferramentas.php?acaoPos=deletar&id=" . $valPos->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valPos->titulo . " ?\")'>Deletar</a>" ?>
                        </td>
                    </tr>                        
                    <?php endforeach; ?>
                </tbody>
                </table>
                </form>
                <br><hr><br>
                
                <!-- -------------### LISTAGEM DE CATEGORIAS E TAGS  ###----------------- -->
                
                <h2 id="list_membro" class="center">Listagem de Categorias e Tags Cadastradas</h2>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="widget search"><form>
                            <input type="text" class="input-block-level" placeholder="Pesquisar por Nome 'Categoria'">
                        </form></div>
                        <form class="form-inline" method="post">
                        <table class="table table-inverse">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Categorias</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                          <tbody>
                            <?php foreach($categoriaob->findAll() as $key => $valCat): ?>
                                <tr id="sel-table">
                                    <th scope="row"><?php echo $valCat->id; ?></th>
                                    <td><?php echo $valCat->nome;?></td>
                                    <td>
                                        <?php echo "<a class='btn btn-danger btn-medium btn-block' href='postagens-ferramentas.php?acaoCat=deletar&id=" . $valCat->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valCat->nome . " ?\")'>Deletar</a>" ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        </form>
                    </div>

                    <div class="span6">
                        <div class="widget search"><form>
                            <input type="text" class="input-block-level" placeholder="Pesquisar por Nome 'Tag'">
                        </form></div>
                        <form class="form-inline" method="post">
                        <table class="table table-inverse">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Relacionamento</th>
                                    <th>Tags</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                          <tbody>
                            <?php foreach($tagob->findAll() as $key => $valTag): ?>
                                <tr id="sel-table">
                                    <th scope="row"><?php echo $valTag->id; ?></th>
                                    <td><?php echo $valTag->rel_tags_post;?></td>
                                    <td><?php echo $valTag->nome;?></td>
                                    <td>
                                          <?php echo "<a class='btn btn-danger btn-medium btn-block' href='postagens-ferramentas.php?acaoTag=deletar&id=" . $valTag->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valTag->nome . " ?\")'>Deletar</a>" ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        </form>
                    </div>
                </div>
                
                <h2 id="list_comments">Listagem Comentários</h2>
                 <?php echo '<h4>'.$msgerro3.'</h4>' ?>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Postagem</th>
                        <th>Nome</th>
                        <th>Comentário</th>
                        <th>Data</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comentob->findAllcoment() as $key => $valCom): ?>
                    <tr id="sel-table">
                        <th scope="row"><?php echo $valCom->id; ?></th>
                        <td><?php 
                                if (strlen($valCom->rel_com_post) > $tamtit):
                                    echo substr($valCom->rel_com_post, 0, $tamtit).'...';
                                else: 
                                    echo $valCom->rel_com_post; 
                                endif;
                        ?></td>
                        <td><?php echo $valCom->nome; ?></td>
                        <td><?php 
                            if (strlen($valCom->texto) > $tamtxtc):
                                echo substr($valCom->texto, 0, $tamtxtc).'...';
                            else: 
                                echo $valCom->texto; 
                            endif;
                        ?></td>
                        
                        <td><?php echo utf8_encode(strftime( '%d de %b de %Y - %X', strtotime($valCom->data))); ?></td>
                        <td><?php 
                              if ($valCom->ativo == '1'){
                                  echo '<p class="text-success"><i class="icon-ok"></i> Aceita</p>';
                              }if ($valCom->ativo == '0'){
                                  echo '<p class="text-warning"><i class="icon-time"></i>Em análise</p>';
                              }
                            ?>
                        </td>
                        <td>
                            <?php echo "<a class='btn btn-info btn-medium btn-block' data-toggle='modal' data-target='#comentForm".$key."'><i class='icon-file icon-large'></i> Ler</a>"; ?>
                            <?php
                                if ($valCom->ativo == '0'):
                                    echo "<a class='btn btn-success btn-medium btn-block' href='postagens-ferramentas.php?acaoCom=aceitar&id=" . $valCom->id . "'>Aceitar</a>";
                                else:
                                    echo "<a class='btn btn-warning btn-medium btn-block' href='postagens-ferramentas.php?acaoCom=indeferir&id=" . $valCom->id . "' onclick='confirmacao()'>Indeferir</a>";
                                endif;
                            ?>
                            <?php echo "<a class='btn btn-danger btn-medium btn-block' href='postagens-ferramentas.php?acaoCom=deletar&id=" . $valCom->id . "' onclick='return confirm(\"Deseja realmente deletar o comentário de " . $valCom->nome . " ?\")'>Deletar</a>" ?>
                        </td>
                        <div hidden><input type="text" name="aa" id="aa"></div>
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
                    <?php endforeach; ?>
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
