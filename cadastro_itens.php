<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 
?>

<body>
    
<!--Header-->
    <?php include_once ("elements/menu.php"); ?>
<!-- /header -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <h1>Painel Administrativo <br> Cadastros</h1>
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
                
    <section class="services">
        <div class="container">
            <div class="row-fluid">

                <div class="span4">
                    <div class="center">
                        <a href="postagens-ferramentas.php" class="text-info">
                            <i style="font-size: 48px" class="icon-bullhorn icon-large"></i>
                            <p> </p>
                            <h4>Postagem [Blog]</h4>
                            <p>Inserir, alterar, deletar postagem. Necessário ativação do administrador.</p>
                        </a>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <a href="editalps-ferramentas.php" class="text-info">
                            <i style="font-size: 48px" class="icon-calendar icon-large"></i>
                            <p> </p>
                            <h4>Edital / PS</h4>
                            <p>Inserir, alterar ou deletar edital ou processo seletivo em aberto.</p>
                        </a>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <a href="eventos-ferramentas.php" class="text-info">
                            <i style="font-size: 48px" class="icon-globe icon-large"></i>
                            <p> </p>
                            <h4>Evento</h4>
                            <p>Inserir, deletar, alterar evento.</p>
                        </a>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row-fluid">
                <div class="span4">
                    <div class="center">
                        <a href="artigose-ferramentas.php" class="text-info">
                            <i style="font-size: 48px" class="icon-bar-chart icon-large"></i>
                            <p> </p>
                            <h4>Artigos de Estudos</h4>
                            <p>Inserir, alterar ou deletar artigos de estudos. Necessário ativação do administrador.</p>
                        </a>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <a href="topicos-ferramentas.php" class="text-info">
                            <i style="font-size: 48px" class="icon-book icon-large"></i>
                            <p> </p>
                            <h4>Fórum / FAQ</h4>
                            <p>Inserir, alterar ou deletar artigos de estudos. Necessário ativação do administrador.</p>
                        </a>
                    </div>
                </div>

<!--                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-globe icon-large"></i>
                        <p> </p>
                        <h4>Android Application Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>-->

            </div>

            <hr>

            <p>&nbsp;</p>

        </div>
    </section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
