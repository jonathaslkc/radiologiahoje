<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 

$tamtxt = 12;
?>

<body>
    
<!--Header-->
    <?php include_once ("elements/menu.php"); 
    
    if(isset($_SESSION['logado'])  && (($_SESSION['tipoacesso'] == '2') || ($_SESSION['tipoacesso'] == '3'))):  //TESTAR SE ESTÁ LOGADO
    ?>
    ?>
<!-- /header -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <h1>Painel Administrativo <br> Notificações</h1>
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

<section id="registration-page" class="container">
            <div class="center">
                <a class="btn btn-primary btn-medium" href="notificacao.php"><i class="icon-refresh"></i> Atualizar</a>
            </div>
    <form class="center" action='' method="POST">
      <fieldset class="registration-form">
        <div class="control-group">
          <!-- Tipo de Acesso-->
          <div class="controls">
            <table class="table table-inverse">
                <legend>Notificações</legend>
                <thead>
                    <tr class="btn-info">
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Usuário</th>
                        <th>Tipo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($logar->findAll() as $key => $valUsu): ?>
                    <tr id="sel-table">
                        <th><?php echo strftime('%d/%b/%Y', strtotime($valUsu->dtcriacao)); ?></th>
                        <td><?php echo 'Usuário "'.$valUsu->usuario.'" cadastrado c/ situção';?><?php if($valUsu->ativo = '1'):echo ' <i class="icon-ok-circle text-success"></i>';else:echo ' <i class="icon-ban-circle text-danger"></i>'; endif; ?></td>
                        <td></td>
                        <td>Cadastro</td>
                        <td><a class="btn-success box btn-small" href="">Acompanhar</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php foreach($membroob->findAll() as $key => $valMem): ?>
                    <tr id="sel-table">
                        <th><?php echo strftime('%d/%b/%Y', strtotime($valMem->datacriacao)); ?></th>
                        <td><?php echo 'Membro "'.$valMem->nome.'" cadastrado c/ situção';?><?php if($valMem->ativo = '1'):echo ' <i class="icon-ok-circle text-success"></i>';else:echo ' <i class="icon-ban-circle text-danger"></i>'; endif; ?></td>
                        <td></td>
                        <td>Cadastro</td>
                        <td><a class="btn-success box btn-small" href="">Acompanhar</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php foreach($postagensob->findAll() as $key => $valPos): ?>
                    <tr id="sel-table">
                        <th><?php echo strftime('%d/%b/%Y', strtotime($valPos->datapublicacao)); ?></th>
                        <td><?php 
                            echo 'Postagem: ';
                                if (strlen($valPos->titulo) > $tamtxt): echo '"'.substr($valPos->titulo, 0, $tamtxt).'"...';else: echo '"'.$valPos->titulo.'"'; endif;
                            echo ' c/ situção';?><?php if($valMem->ativo = '1'):echo ' <i class="icon-ok-circle text-success"></i>';else:echo ' <i class="icon-ban-circle text-danger"></i>'; endif; ?></td>
                        <td><?php $resultfind = $membroob->findMembro($valPos->rel_post_membro); echo $resultfind->nome; ?></td>
                        <td>Postagem</td>
                        <td><a class="btn-success box btn-small" href="">Acompanhar</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php foreach($comentob->findAll() as $key => $valComent): ?>
                    <tr id="sel-table">
                        <th><?php echo strftime('%d/%b/%Y', strtotime($valComent->data)); ?></th>
                        <td><?php 
                            echo 'Comentário: '.$valComent->nome;
                                if (strlen($valComent->texto) > $tamtxt): echo ' "'.substr($valComent->texto, 0, $tamtxt).'"...';else: echo ' "'.$valComent->texto.'"'; endif;
                            echo ' c/ situção';?><?php if($valComent->ativo = '1'):echo ' <i class="icon-ok-circle text-success"></i>';else:echo ' <i class="icon-ban-circle text-danger"></i>'; endif; ?></td>
                        <td></td>
                        <td>Comentário</td>
                        <td><a class="btn-success box btn-small" href="">Acompanhar</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
      </fieldset>
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

include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
