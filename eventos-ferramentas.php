<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 

$tamtxt = 35;
$tamtxtc= 150;
$tamtit = 20;
$msgerro3='';
$sucessSend = FALSE;
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
                <h1>Painel Administrativo <br> Eventos e suas ferramentas</h1>
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
<!--    <div class="container">
        <h4>Ir para:</h4>
        <ul>
            <li><a href="#list_topics">Listagem de Tópicos</a></li>
            <li><a href="#list_subtopics">Listagem de Sub Tópicos</a></li>
        </ul>
    </div>-->
<section id="registration-page" class="container center">
    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
<!--        <h3>Cadastrar</h3>-->
  
<!--        <textarea>Easy! You should check out MoxieManager!</textarea>-->
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <h5>Cadastrar Novo Evento</h5>
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
                                        <input type="text" maxlength="60" name="titulo" <?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo "value=\"" . $titulo . "\"";} ?>  placeholder="Digite um Título para o Evento" class="input-xxlarge"><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- texto -->
                                    <div class="controls">
                                        <textarea name="descricao" maxlength="255" class="input-xxlarge" placeholder="Digite aqui uma descrição [Máx.: 255 Caract.]"><?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo $descricao;}else{echo '';} ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label id="icone">Ícone [Símbolo]</label>
                                    <div class="controls">
                                        <select name="icon">
                                            <option value="icon-globe icon-medium">Globo</option>
                                            <option value="icon-music icon-medium" >Musical</option>
                                            <option value="icon-heart icon-medium" >Coração</option>
                                            <option value="icon-book icon-medium" >Livro</option>
                                            <option value="icon-glass icon-medium" >Taça</option>
                                            <option value="icon-briefcase icon-medium" >Mala</option>
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
                                        <input type="url" maxlength="150" name="fonte" placeholder="Fonte" class="input-xxlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="dtexpirar" name="dtexpirar" placeholder="Data para Expirar" class="input-xxlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="ativo">Ativo?</label><br>
                                        Sim<input type="radio" id="ativo" name="ativo" value="1" checked>
                                        Não<input type="radio" id="ativo" name="ativo" value="0">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- Buttons -->
                                    <div class="controls">
                                        <input type="submit" name="cadastrarEve" value="Cadastrar" class="btn btn-success btn-large btn-block">
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
                <h2 id="list_topics">Listagem de Eventos Existentes</h2>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Fonte</th>
                        <th>Ícone</th>
                        <th>Expira em</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!$evento->findAll()): 
                        echo '<tr><td colspan="7">Nenhum Dado Encontrado!</td></tr>'; 
                    else: 
                        foreach($evento->findAll() as $key => $valEve): ?>
                        <tr id="sel-table">
                            <th scope="row"><?php echo $valEve->id; ?></th>
                            <td><?php echo $valEve->titulo; ?></td>
                            <td><?php echo $valEve->descricao; ?></td>
                            <td><?php echo $valEve->fonte; ?></td>
                            <td><?php echo '<i class="'.$valEve->icon.'"></i>'; ?></td>
                            <td><?php echo utf8_encode(strftime( '%d-%m-%Y', strtotime($valEve->dtexpirar))); ?></td>
                            <td><?php if($valEve->ativo == '1'): echo 'Ativo'; else: echo 'Desativado'; endif; ?></td>
                            <td>
      <!--                       <a data-toggle="modal" data-target='#membroForm'><i class="icon-file icon-large"></i>Visualizar</a>-->
                              <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editoreventos.php?acao=editar&id=" . $valEve->id . "'>Editar</a>"; ?>
                              <?php echo "<a class='btn btn-danger btn-medium btn-block' href='eventos-ferramentas.php?acaoEve=deletar&id=" . $valEve->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valEve->titulo . " ?\")'>Deletar</a>" ?>
                            </td>
                        </tr>
                        <?php endforeach; 
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
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(function() {
    $( "#dtexpirar" ).datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt_BR'
    });
  });
</script>
</body>
</html>
