<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 

$sucessSend = TRUE;

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
                <h1>Painel Administrativo <br> Postagem</h1>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
    
    <section class="services">
    <form class="form-inline" action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row-fluid">
                <div class="header">
                    <h4>Formulário para Criar Postagem</h4>
                </div>
                <div class="center">
                <fieldset class="registration-form">
                    <fieldset class="text-success"><h3><?php echo $msgerro2; ?></h3></fieldset>
                        <div class="control-group">
                            <!-- Perfil -->
                            <div class="controls">
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo $msg; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <img style="width:70%;border-radius:10px;box-shadow: 7px 5px 3px #666" 
                                            src="images/sample/uploadpost/publicacao-padrao.png">
                                            <br><h6 class="text-info">Imagem Padrão</h6>
                                        </div>
                                    </div>
                                <fieldset class="registration-form">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="file" id="imgpost" name="imgpost" class="btn btn-warning input-xlarge">
                                            <br><h6 class="text-info">Extensão da imagem: png/jpg/jpeg.<br>Tamanho: até 1mb.</h6>
                                        </div>
                                    </div>
                                </fieldset> 
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Título -->
                            <div class="controls">
                                <input type="text" id="titulo" name="titulo" <?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo "value=\"" . $titulo . "\"";} ?>  placeholder="Digite um Título para sua Postagem" class="input-xxlarge"><br>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- texto -->
                            <div class="controls">
                                <textarea name="texto"><?php if (($_SERVER['REQUEST_METHOD'] == "POST") AND ($sucessSend == FALSE)) { echo $texto;}else{echo 'Digite aqui...';} ?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Data publicação -->
                            <label>Data de Publicação</label>
                            <div class="controls">
                                <input type="text" class="input-small" id="dadapublicacao" name="datapublicacao" readonly value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Categoria -->
                            <label>Categoria</label>
                            <div class="controls">
                                <select id="passaValor" name="passaValor" onchange="getValor(this.value, 0)" class="center">
                                    <option value="0">Selecione</option>
                                        <?php foreach($categoriaob->findAll() as $key => $valCat): ?>
                                            <?php echo "<option value='$valCat->nome'>$valCat->nome</option>" ?>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Categoria -->
                            <div class="controls">
                                <select name="recebeValor" id="recebeValor" size="5">
                                    <option value="0">Selecione algo acima primeiro</option>
                                </select>
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
                                <input type="submit" name="cadastrarPos" value="Cadastrar" class="btn btn-success btn-large btn-block">
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
