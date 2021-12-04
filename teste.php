<?php
$titulohead = "ÁREA DE TESTES";
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
                <h1>Área de Testes de App; Plugins e Scripts em Geral</h1>
            </div>
        </div>
    </section>
    <!-- / .title -->       
    <br>
    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div class="header">
                    <h4>ÁREA DE TESTES</h4>
                </div>
                <div class="center">
                    <fieldset class="text-success"></fieldset>
                    <form name="enviar" method="POST" enctype="multipart/form-data">
                        <fieldset class="registration-form">
                            <div class="control-group">
                                <div class="controls">
                            
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                            
                                </div>
                            </div>
                        </fieldset>
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
    

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>

</body>
</html>


<!--    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div class="header">
                    <h4>ÁREA DE TESTES</h4>
                </div>
                <div class="center">
                    <fieldset class="text-success"><h3>< ?php echo var_dump($msg); ?></h3></fieldset>
                    <form name="enviar" method="POST" enctype="multipart/form-data">
                        <fieldset class="registration-form">
                            <div class="control-group">
                                <div class="controls">
                                    <input type="file" id="img" name="img" class="btn btn-warning input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" id="enviar" name="cadastrarImg" class="btn btn-success btn-block btn-large" value="Enviar">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <form name="enviar" method="POST" enctype="multipart/form-data">
                        <fieldset class="registration-form">
                            <div class="control-group">
                                <div class="controls">
                                    Imagens
                                    <img src="images/sample/upload/titulo-imagem.jpg" alt="Eliane">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>-->
    
<!--    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div class="header">
                    <h4>ÁREA DE TESTES</h4>
                </div>-->
<!--                <div class="row-fluid">
                    <div class="container center">
                        <div class="span3">
                            
                            <div id="message">
                                <h4 id='loading' >Carregando...</h4>
                            </div>
                        
                        </div>
                        <div class="span6">
                        
                            <div class="main">
                                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                    <div id="image_preview"><img id="previewing" src="noimage.png" /></div>
                                    <hr id="line">
                                    <div id="selectImage">
                                        <label>Selecione  Imagem</label><br/>
                                        <input type="file" name="file" id="file" required />
                                        <input type="submit" value="Carregar" class="submit" />
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <div class="span3">c</div>
                    </div>
                </div>-->
<!--                <div class="center">
                    <div class="main">
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            <div id="image_preview"><img id="previewing" src="noimage.png" /></div>
                            <hr id="line">
                            <div id="selectImage">
                                <label>Selecione  Imagem</label><br/>
                                <input type="file" name="file" id="file" required />
                                <input type="submit" value="Carregar" class="submit" />
                            </div>
                        </form>
                    </div>
                    <h4 id='loading' >Carregando...</h4>
                    <p id="message"></p>
                </div>
            </div>
        </div>
    </section>-->