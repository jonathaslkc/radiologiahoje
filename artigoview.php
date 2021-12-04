<?php
$titulohead = "Artigo";
$menusel = "artigose";
include_once ("elements/header.php"); 

?>

<body>

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
                    <h1>Artigos - Radiologia</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Artigo</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div <?php if (isset($_SESSION['logado'])): else: echo 'hidden'; endif; ?>><a class="btn btn-info btn-large" href="artigose-ferramentas.php">Editar Artigo</a></div>
                <div class="box">
                    <div class="row-fluid">
                        
                    </div>
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
