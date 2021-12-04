<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 

$tamtxt = 35;
$tamtxtc= 150;
$tamtit = 20;
$msg='';
$sucessSend = TRUE;

#   <Paginação

$QtdReg = 2;

#   </Paginação

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
                <h1>Painel Administrativo <br> Edita/PS e suas ferramentas</h1>
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
            <li><a href="#list_membro">Listagem de Categorias/Tags</a></li>
            <li><a href="#list_comments">Listagem de Comentários</a></li>
        </ul>
    </div>-->
<section id="registration-page" class="container center">
        <h3>Inserção de Editais/PS</h3>
 
        <form class="form-inline" action="" method="post">
            <hr>
              <fieldset class="registration-form">
                <?php echo '<h4>'.$msgerro2.'</h4>' ?>
                <div class="control-group">
                    <!-- Tipo -->  
                    <div class="controls">
                        Edital <input type="radio" name="tipo" value="E" checked>  
                        PS <input type="radio" name="tipo" value="P">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Estado -->
                    <div class="controls">
                        <select class="cbempresa" name="estado">
                            <optgroup label="Selecione"><option value="AC">Acre</option><option value="AL">Alagoas</option><option value="AP">Amapá</option><option value="AM">Amazonas</option><option value="BA">Bahia</option><option value="CE">Ceará</option><option value="DF">Distrito Federal</option><option value="ES">Espirito Santo</option><option value="GO">Goiás</option><option value="MA">Maranhão</option><option value="MS">Mato Grosso do Sul</option><option value="MT">Mato Grosso</option><option value="MG">Minas Gerais</option><option value="PA">Pará</option><option value="PB">Paraíba</option><option value="PR">Paraná</option><option value="PE">Pernambuco</option><option value="PI">Piauí</option><option value="RJ">Rio de Janeiro</option><option value="RN">Rio Grande do Norte</option><option value="RS">Rio Grande do Sul</option><option value="RO">Rondônia</option><option value="RR">Roraima</option><option value="SC">Santa Catarina</option><option value="SP">São Paulo</option><option value="SE">Sergipe</option><option value="TO">Tocantins</option></optgroup>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <!-- Descricao -->
                    <div class="controls">
                        <textarea name="descricao"><?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo $descricao;}else{echo '';} ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <!-- Data Início -->
                    <div class="controls">
                        <input type="text" id="dataini" name="dataini" placeholder="Data Abertura" class="input-small">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Data Final -->
                    <div class="controls">
                        <input type="text" id="datafin" name="datafin" placeholder="Data Final" class="input-small">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Fonte -->
                    <div class="controls">
                        <input type="url" name="fonte" placeholder="Fonte" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Buttons -->
                    <div class="controls">
                        <button class="btn btn-success btn-large btn-block" type="submit" name="cadastrarEdiPs">Cadastrar</button>
                    </div>
                </div>
              </fieldset>
        </form>
    
    </section>

    <!-- -------------### LISTAGENS  ###----------------- -->
    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
    <!-- -------------### LISTAGEM DE POSTAGENS  ###----------------- -->
                <h2 id="list_editais">Listagem de Editais</h2>
                <div class="widget search"><form><input type="text" class="input-block-level" placeholder="Pesquisar por Usuário"></form></div>
                <form class="form-inline" method="post">
                <table class="table table-inverse">
                <thead class="btn-info">
                    <tr>
                        <th>#</th>
                        <th>Autor</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Data Início</th>
                        <th>Data Fim</th>
                        <th>Fonte</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach($editalps->findAll() as $key => $valEPS): ?>
                    <tr>
                        <th scope="row"><?php echo $valEPS->id; ?></th>
                        <td><?php echo $valEPS->rel_edi_mem; ?></td>
                        <td>
                            <?php if (strlen($valEPS->descricao) > $tamtxt):
                                    echo substr($valEPS->descricao, 0, $tamtxt).'...';
                                else: 
                                    echo $valEPS->descricao; 
                            endif;?>
                        </td>
                        <td><?php 
                              if ($valEPS->tipo == 'E'){
                                  echo 'Edital';
                              }if ($valEPS->tipo == 'P'){
                                  echo 'Processo Seletivo';
                              }
                            ?>
                        </td>
                        <td><?php echo $valEPS->estado; ?></td>
                        <td><?php echo utf8_encode(strftime( '%d/%m/%Y', strtotime($valEPS->dataini))); ?></td>
                        <td><?php echo utf8_encode(strftime( '%d/%m/%Y', strtotime($valEPS->datafin))); ?></td>
                        <td><?php echo $valEPS->fonte; ?></td>
                        <td>
                          <?php echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editoreditalps.php?acaoedips=editar&id=" . $valEPS->id . "'>Editar</a>"; ?>
                          <?php echo "<a class='btn btn-danger btn-medium btn-block' href='editalps-ferramentas.php?acaoedips=deletar&id=" . $valEPS->id ."#list_editais' onclick='return confirm(\"Deseja realmente deletar o registro do estado da(o) " . $valEPS->estado . " ?\")'>Deletar</a>" ?>
                        </td>
                    </tr>                        
                    <?php endforeach; ?>
<!--                    <tr><td colspan="9">< ?php foreach($editalps->linhas() as $key => $valCon): echo $valCon->count; endforeach; ?></td></tr>-->
                    <tr>
<!--                        <td colspan="9">
                            < ?php $result = $editalps->linhas(); echo 'Quantidade de Registros (Total): '.$result->NumLinhas; ?>
                        </td>-->
                    </tr>
                </tbody>
                </table>
                </form>
                <br><hr><br>
            </div>
            <hr>
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
    $( "#dataini,#datafin" ).datepicker({
        format: 'yy/mm/dd'
//        language: 'pt_BR',
    });
  });
</script>
<link rel="stylesheet" href="css/datepicker.css">
</body>
</html>
