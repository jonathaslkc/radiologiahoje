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
    
    if(isset($_SESSION['logado'])):  //TESTAR SE ESTÁ LOGADO
    ?>
<!-- /header -->
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <h1>Painel Administrativo <br> Artigos de Estudo e suas ferramentas</h1>
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
            <li><a href="#list_membro">Listagem de Artigos</a></li>
<!--            <li><a href="#list_comments">Listagem de Comentários</a></li>-->
        </ul>
    </div>
<section id="registration-page" class="container center">
    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
<!--        <textarea>Easy! You should check out MoxieManager!</textarea>-->
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <h5>Criar Submenu</h5>[clique]
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="">
                        <hr>
                          <fieldset class="registration-form">
                            <div class="control-group">
                                <!-- Submenu -->
                                <div class="controls">
                                    <input type="text" id="submenu" name="submenu" placeholder="Digite Nome do Submenu" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Categoria -->
                                <div class="controls">
                                    <input type="submit" name="CadastrarSubmenu" value="Cadastrar"  class="btn btn-success btn-block btn-large">
                                </div>
                            </div>
                          </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2">
                        <h5>Criar Submenu Filho</h5>[clique]
                    </a>
                </div>
                <div id="collapseOne2" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="">
                        <hr>
                            <fieldset class="registration-form">
                                <div class="control-group">
                                    <!-- Relação com Submenu -->  
                                    <div class="controls">
                                        <select id="rel_sbfilho_subm" name="rel_sbfilho_subm">
                                            <optgroup label="Relacionar à Categoria">
                                                <?php foreach($submenu->findAll() as $key => $valSM):
                                                   echo '<option value="'.$valSM->titulo.'" >'.$valSM->titulo.'</option>';
                                                endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Submenu Filho -->
                                    <div class="controls">
                                        <input type="text" name="submenufilho" placeholder="Digite Nome do SubMenu Filho" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Categoria -->
                                    <div class="controls">
                                        <input type="submit" name="CadastrarSubmenufilho" value="Cadastrar"  class="btn btn-success btn-block btn-large">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne3">
                        <h5>Escrever Artigo de Estudo</h5>[clique]
                    </a>
                </div>
                <div id="collapseOne3" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="POST" action="" name="" enctype="multipart/form-data">
                            <hr>
                            <fieldset class="registration-form">
                                <div class="control-group">
                                    <!-- Relação com Submenu [Pai-Filho] -->  
                                    <div class="controls">
                                        <select id="rel_todos" name="rel_todos">
                                            <optgroup label="Relacionar ao Submenu">
                                                <?php foreach($submenu->findAll() as $key => $valSM2):
                                                   echo '<option value="'.$valSM2->titulo.'" >'.$valSM2->titulo.'</option>';
                                                endforeach; ?>
                                            </optgroup>
                                            <optgroup label="Relacionar ao Submenu Filho">
                                                <?php foreach($submenufil->findAll() as $key => $valSMF):
                                                   echo '<option value="'.$valSMF->titulo.'" >'.$valSMF->titulo.'</option>';
                                                endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Categoria -->
                                    <div class="controls">
                                        <textarea class="textoartigo"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Categoria -->
                                    <div class="controls">
                                        <input type="submit" name="CadastrarTextoartigo" value="Cadastrar"  class="btn btn-success btn-block btn-large">
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
                <h2 id="list_usuario">Listagem de Artigos de Estudos Existentes</h2>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Submenu</th>
                        <th>Trecho de Texto</th>
                        <th>Data de Publicação</th>
                        <th>Data de Atualização</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$submenu->findAll()): 
                        echo '<tr><td colspan="8">Nenhum Dado Encontrado!</td></tr>'; 
                    else:
                        foreach($artigoe->findAll() as $key => $valArt): ?>
                        <tr id="sel-table">
                            <th scope="row"><?php echo $valArt->id; ?></th>
                            <td><?php echo $valArt->rel_artigo_usu; ?></td>
                            <td><?php echo $valArt->rel_artigo_submenu; ?></td>
                            <td>
                                <?php if (strlen($valArt->texto) > $tamtxt):
                                        echo substr($valArt->texto, 0, $tamtxt).'...';
                                      else: 
                                        echo $valArt->texto; 
                                      endif;?>
                            </td>
                            <td><?php echo utf8_encode(strftime( '%a, %d/%b/%Y', strtotime($valArt->data))); ?></td>
                            <td><?php echo utf8_encode(strftime( '%a, %d/%b/%Y', strtotime($valArt->dataatualizacao))); ?></td>
                            <td><?php 
                                  if ($valArt->ativo == '1'){
                                      echo 'Publicada';
                                  }if ($valArt->ativo == '0'){
                                      echo 'Desativada';
                                  }
                                ?>
                            </td>
                            <td>
      <!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                              <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editorartigo.php?acao=editar&id=" . $valArt->id . "'>Editar</a>"; ?>
                              <?php echo "<a class='btn btn-danger btn-medium btn-block' href='artigose-ferramentas.php?acaoArt=deletar&id=" . $valArt->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valArt->rel_artigo_submenu . " ?\")'>Deletar</a>" ?>
                            </td>
                        </tr>                        
                        <?php endforeach; 
                    endif;?>
                </tbody>
                </table>
                </form>
                <br><hr><br>
                
                <!-- -------------### LISTAGEM DE CATEGORIAS E TAGS  ###----------------- -->
                
                <h2 id="list_membro" class="center">Listagem de Submenus [Pai/Filho] Existentes</h2>
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
                                    <th>Titulo</th>
                                    <th>Situação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                          <tbody>
                            <?php
                            if (!$submenu->findAll()): 
                                echo '<tr><td colspan="4">Nenhum Dado Encontrado!</td></tr>'; 
                            else:
                                foreach($submenu->findAll() as $key => $valSMen): ?>
                                    <tr id="sel-table">
                                        <th scope="row"><?php echo $valSMen->id; ?></th>
                                        <td><?php echo $valSMen->titulo;?></td>
                                        <td><?php 
                                              if ($valSMen->ativo == '1'){
                                                  echo 'Publicada';
                                              }if ($valSMen->ativo == '0'){
                                                  echo 'Desativada';
                                              }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo "<a class='btn btn-danger btn-medium btn-block' href='artigose-ferramentas.php?valSMen=deletar&id=" . $valSMen->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valSMen->titulo . " ?\")'>Deletar</a>" ?>
                                        </td>
                                    </tr>
                                <?php endforeach; 
                            endif;?>
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
                                    <th>Relação</th>
                                    <th>Titulo</th>
                                    <th>Situação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                          <tbody>
                            <?php
                            if (!$submenufil->findAll()): 
                                echo '<tr><td colspan="5">Nenhum Dado Encontrado!</td></tr>'; 
                            else:
                                foreach($submenufil->findAll() as $key => $valSMenF): ?>
                                    <tr id="sel-table">
                                        <th scope="row"><?php echo $valSMenF->id; ?></th>
                                        <td><?php echo $valSMenF->rel_sbfilho_subm; ?></td>
                                        <td><?php echo $valSMenF->titulo; ?></td>
                                        <td><?php 
                                              if ($valSMenF->ativo == '1'){
                                                  echo 'Publicada';
                                              }if ($valSMenF->ativo == '0'){
                                                  echo 'Desativada';
                                              }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo "<a class='btn btn-danger btn-medium btn-block' href='artigose-ferramentas.php?acaoSMenF=deletar&id=" . $valSMenF->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valSMenF->titulo . " ?\")'>Deletar</a>" ?>
                                        </td>
                                    </tr>
                                <?php endforeach;                            
                            endif;?>
                          </tbody>
                        </table>
                        </form>
                    </div>
                </div>
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

<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({ 
        
        language: 'pt_BR',
        selector: 'textarea',
          theme: 'modern',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'
          ],
          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
          toolbar2: 'print media | forecolor backcolor emoticons | link image preview',
          image_advtab: true,
          templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
          ],
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ],
          
          relative_urls: false,
          
          external_filemanager_path:"http://localhost/radiologiahoje/js/tinymce/filemanager/",
          filemanager_title:"Responsive Filemanager" ,
          external_plugins: { "filemanager" : "http://localhost/radiologiahoje/js/tinymce/filemanager/plugin.min.js"}
    });
</script>
    
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
