<?php
$titulohead = "Termos de Uso";
$menusel = "inicio";
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
                    <h1>Termos de Uso</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Termos de uso</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                <div class="box">
                    <div class="row-fluid">
                        <p>

                        </p>
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
