<?php
$titulohead = "Fórum - Tópicos";
$menusel = "forum";
include_once ("elements/header.php"); 
?>

<body>

<!--Header-->
    <?php include_once ("elements/menu.php"); ?>
<!-- /header -->
<!-- Administrativo -->
    <?php include_once ("elements/admin.php"); ?>
<!-- /Administrativo -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Fórum / Debates / FAQ</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Fórum</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    <?php if (isset($_SESSION['logado'])):?>
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div class="box center">
                    <?php echo '<h4>'.$msgerro2.'</h4>' ?>
                    <form method="POST" action="" name="">
                    <hr>
                            <div class="control-group">
                                <!-- Relação com Categoria -->  
                                <div class="controls">
                                    <select name="rel_stopico_topico">
                                        <optgroup label="Relacionar ao Tópico">
                                            <?php
                                            $res = $topico->find(7);
                                              echo '<option value="'.$res->titulo.'" >'.$res->titulo.'</option>';
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Título -->
                                <div class="controls">
                                    <input type="text" name="titulo" maxlength="60" placeholder="Digite um Título para o Sub Tópico" class="input-xxlarge"><br>
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- texto -->
                                <div class="controls">
                                    <textarea name="descricao" maxlength="2000" class="input-xxlarge" placeholder="Digite aqui o que deseja colocar em enquete!"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Buttons -->
                                <div class="controls"><br><br>
                                    <input type="submit" name="cadastrarSTop" value="Cadastrar" class="btn btn-success btn-large">
                                    <input type="reset" value="Limpar" class="btn btn-warning btn-xxlarge">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
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
