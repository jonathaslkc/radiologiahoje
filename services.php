<?php
$titulohead = "Editais e Processos Seletivos";
$menusel = "editaisps";
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
    <?php include_once ("elements/admin.php"); ?>
<!-- /Administrativo -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Editais e Processos Seletivos <?php echo date('Y'); ?></h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Editais / Processos Seletivos</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <section class="services">
        <div class="container">
            <div class="row-fluid">
                
                <div class="widget search">
                    <form>
                        <input type="text" class="input-block-level" placeholder="Pesquisar por Estado">
                    </form>
                </div>
                
                <table class="table table-inverse">
                  <thead>
                    <tr class="btn-info">
                      <th>#</th>
                      <th>Descrição</th>
                      <th>Tipo</th>
                      <th>Estado</th>
                      <th>Inscrições</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($editalps->selecaoeditais() as $key => $valEPS): ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $valEPS->descricao; ?></td>
                        <td><?php 
                                if ($valEPS->tipo == 'E'){
                                    echo 'Edital';
                                }if ($valEPS->tipo == 'P'){
                                    echo 'Processo Seletivo';
                                }
                            ?>
                        </td>
                        <td><?php echo $valEPS->estado; ?></td>
                        <td><?php echo 'De: <b>'.utf8_encode(strftime( '%d de %B de %Y', strtotime($valEPS->dataini))).'</b><br>Até: <b>'.utf8_encode(strftime( '%d de %B de %Y', strtotime($valEPS->datafin))).'</b>'?></td>
                        <td><a class="btn btn-info" target="_blank" href="<?php echo $valEPS->fonte; ?>">Visualizar</a></td>
                    </tr>                        
                    <?php endforeach; ?>
                  </tbody>
                </table>
                
               <!-- <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-bar-chart icon-large"></i>
                        <p> </p>
                        <h4>Premium Bootstrap Templates</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-cog icon-large"></i>
                        <p> </p>
                        <h4>Web Design &amp; Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-heart icon-large"></i>
                        <p> </p>
                        <h4>Premium Wordpress Themes</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row-fluid">
                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-globe icon-large"></i>
                        <p> </p>
                        <h4>Responsive Web Design</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-camera icon-large"></i>
                        <p> </p>
                        <h4>iOS Application Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>

                <div class="span4">
                    <div class="center">
                        <i style="font-size: 48px" class="icon-bullhorn icon-large"></i>
                        <p> </p>
                        <h4>Android Application Development</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                    </div>
                </div>-->

            </div>

            <hr>

            <div class="center">
<!--                <a class="btn btn-primary btn-large" href="#">Request a free quote</a>-->
            </div>
            <p>&nbsp;</p>

        </div>
    </section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
