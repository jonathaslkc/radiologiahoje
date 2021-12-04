<?php
$titulohead = "Fórum";
$menusel = "forum";
include_once ("elements/header.php"); 


?>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NMDJTS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NMDJTS');</script>
<!-- End Google Tag Manager -->


<!--Header-->
    <?php include_once ("elements/menu.php"); ?>
<!-- /header -->
<!-- Administrativo -->
    <?php include_once ("elements/admin.php"); $sucessSend = TRUE;?>
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

    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
<!--                <h1>Aguardem!</h1>
                <h3>Estamos desenvolvendo a plataforma para você que deseja debater casos e questões interessantes.</h3>
                Em Construção...-->
                
                <div <?php if (isset($_SESSION['logado']) && (($_SESSION['tipoacesso'] == '2') || ($_SESSION['tipoacesso'] == '3'))): else: echo 'hidden'; endif; ?>><a class="btn btn-info btn-large" href="topicos-ferramentas.php">+Novo Tópico</a></div>
                <div class="box">
                    <div class="row-fluid label label-info">
                        <div class="span6 center"><h4>Tipo</h4></div>
                        <div class="span2 center"><h4>Tópicos</h4></div>
                        <div class="span2 center"><h4>Mensagens</h4></div>
                        <div class="span2 center"><h4>Última Mensagem</h4></div>
                    </div>
                    
                    <?php 
                    if (!$topico->findAll()):
                        echo 'Nenhum Tópico Encontrado!';
                    else:
                        foreach($topico->findAll() as $key => $valTop):
                            echo'<a href="topicos.php?titulo='.$valTop->titulo.'">
                                    <h3>'.$valTop->titulo.'</h3>
                                </a>
                                <div class="row-fluid">
                                    <div class="span6">'.$valTop->descricao.'</div>
                                    <div class="span2 center">x</div>
                                    <div class="span2 center">x</div>
                                    <div class="span2 center">x</div>
                                </div>';
                        endforeach; 
                    endif;?>
                </div>
            </div>
        </div>
    </section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
