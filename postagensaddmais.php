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
                <h1>Painel Administrativo <br> Postagem</h1>
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
                    <h4>Formulário - Add Categoria e Tag -> <?php echo $_SESSION['titulopub']; ?></h4>
                </div>
                <div class="center">
                <fieldset class="registration-form">
                    <fieldset class="text-success"><h3><?php echo $msgerro2; ?></h3></fieldset>
                        
                        <div class="control-group">
                            <!-- Título -->
                            <div class="controls">
                                <h4>Selecione uma Categoria e Tag</h4>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Buttons -->
                            <div class="controls">
                                <select id="passaValor" name="passaValor" onchange="getValor(this.value, 0)">
                                    <option value="0"></option>
                                    <optgroup label="Categoria">
                                        <?php foreach($categoriaob->findAll() as $key => $valCat): ?>
                                            <?php echo '<option value="'.$valCat->nome.'" >'.$valCat->nome.'</option>' ?>
                                        <?php endforeach; ?>
                                    </optgroup>
                                </select>
                                <select name="recebeValor" id="recebeValor" >
                                    <option value="0">Selecione algo em Categoria primeiro</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Buttons -->
                            <div class="controls">
                                <input type="submit" name="cadastrarCTAm" value="Adicionar Mais" class="btn btn-success btn-large btn-block">
                            </div>
                        </div>
                </fieldset>
                </div>
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
   
<script type="text/javascript">
   function getValor(valor){
     $("#recebeValor").html("<option value='0'>Carregando...</option>");
     setTimeout(function(){
          $("#recebeValor").load("ajaxValor.php",{id:valor})
   }, 1000)
};
</script>

<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({ 
        selector: "textarea",
//        language: 'pt_BR',
        plugins : 'advlist autolink link image lists charmap print preview wordcount visualchars'
    });
</script>
  

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
