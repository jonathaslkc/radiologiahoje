<?php
$titulohead = "Informações, Notícias, Educação - RadiologiaHoje";
$menusel = "blog";
include_once ("elements/header.php"); 

$contcat= 0;
$contaComentarios = 0;
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
    <?php 
        include_once ("elements/menu.php"); 
        ///////////////////////////////////////### CONTADOR DE VISITAS COM COOKIES ###//////////////////////////////////////////////////////
        $id = ($_GET['id']);
        $titulo = $id;
        $contador = &$_COOKIE[ 'contador_'.$id.'' ];

        if(!$contador):
            $resultado = $postagensob->verificaracessos($titulo);
            $result = $resultado->acessos + 1;
            
            $titulo                 = $_GET['id'];
            $acessos                = $result; 
            $postagensob->setAcessos($acessos);

            if($postagensob->updateacess($titulo)):

            endif;
        endif;
        foreach($comentob->buscacomentarios($resultado->titulo) as $key => $valComent): 
            $contaComentarios = $key + 1;
        endforeach;
    ?>
<!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Blog</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
                        <li><a href="blog.php">Blog</a> <span class="divider">/</span></li>
                        <li class="active">Notícia</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79715649-1', 'auto');
  ga('send', 'pageview');

</script>
<section id="about-us" class="container">
    
<?php if(isset($_GET['acao']) && $_GET['acao'] == 'open'){
    $titulo = $_GET['id'];
    $resultado = $postagensob->localizapost($titulo);
    $resultfind = $membroob->findMembro($resultado->rel_post_membro);
?>
    
        <div class="row-fluid">
            <div class="span8">
                <div class="blog">
                    <div class="blog-item well">                    
                        <a href="#"><h2><?php echo $resultado->titulo; ?></h2></a>
                        <div class="blog-meta clearfix">
                            <p class="pull-left">
                                <i class="icon-user"></i> por <a href="#"><?php echo $resultfind->nome.' '.$resultfind->sobrenome; ?></a> | <i class="icon-folder-close"></i> Categoria <a href="#"><?php echo $resultado->rel_categoria; ?></a> | <i class="icon-calendar"></i> <?php echo utf8_encode(strftime( '%A, %d de %B de %Y', strtotime($resultado->datapublicacao)));?>
                            </p>
                            <p class="pull-right">
                                <i class="icon-comment pull"></i> <a href="#comments"><?php echo $contaComentarios ?>Comentários</a>
                            </p>
                        </div>
                        <p><img src="images/sample/uploadpost/<?php echo $resultado->img; ?>" style="width:100%;" alt="" /></p>
                        <p>
                            <?php echo $resultado->texto; ?>
                        </p>

                        <br><br>

                        <div class="tag">
                            Tags : 
                            <?php foreach($tagob->buscatags($resultado->rel_categoria) as $key => $valTag):
                                echo'<a href="#"><span class="label label-success">'.$valTag->nome.'</span></a> '?>
                            <?php endforeach; ?>
                        </div>

<!--                    <div class="user-info media box">
                            <div class="pull-left">
                                <img src="images/sample/avatar.jpg" alt="" />
                            </div>
                            <div class="media-body">
                                <h5 style="margin-top: 0">Jonathas Farias de Carvalho</h5>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything.</p>
                                <div class="author-meta">
                                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                                </div>
                            </div>
                        </div>-->

                        <p>&nbsp;</p>
                        
                        <br><br>
                        
                        <div id="comments" class="comments">
                            <?php $resultcom = $comentob->buscacomentarios($resultado->titulo);?>
                            <h4><?php echo $contaComentarios; ?> Comentários</h4>
                            <div class="comments-list">
                                <?php foreach($comentob->buscacomentarios($resultado->titulo) as $key => $valComent):
                                    echo '
                                    <div class="comment media">
                                        <div class="pull-left">
                                            <img class="avatar" src="images/sample/cAvatar4.jpg" alt="" />  
                                        </div>
                                        <div class="media-body">
                                            <strong>Postado por <a href="#">'.$valComent->nome.'</a></strong><br>
                                            <small>'.utf8_encode(strftime( '%A, %d de %B de %Y as %H:%I', strtotime($valComent->data))).'</small><br>
                                            <p>'.$valComent->texto.'</p>
                                        </div>
                                    </div>'; 
                                endforeach; ?>
<!--                            <div class="comment media">
                                    <div class="pull-left">
                                        <img class="avatar" src="images/sample/cAvatar2.jpg" alt="" />     
                                    </div>

                                    <div class="media-body">
                                        <strong>Posted by <a href="#">Krikor</a></strong><br>
                                        <small>Thursday, 01 March 2012 15:26</small><br>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage</p>
                                    </div>
                                </div>-->

                            </div>
                            
                            <br><br>
                        
                            <!-- Start Comment Form -->
                            <div class="comment-form">
                                <h4>Faça um Comentário</h4>
                                <h3><?php echo $msgerro2; ?></h3>
                                <p class="muted">Os campos ~nome~email~mensagem~ são obrigatórios.</p>
                                <form name="comment-form" id="comment-form" action="<?php echo $_SERVER["REQUEST_URI"];?>#direct-comment" method="POST">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <input type="text" name="nome" required="required" class="input-block-level" placeholder="Nome" />
                                        </div>
                                        <div class="span4">
                                            <input type="email" name="email" required="required" class="input-block-level" placeholder="Email" />
                                        </div>
                                        <div class="span4">
                                            <input type="url" name="website" class="input-block-level" placeholder="Website" />
                                        </div>
                                    </div>
                                    <textarea rows="10" name="mensagem" id="message" required="required" class="input-block-level" placeholder="Mensagem"></textarea>
                                    <input type="submit" name="cadastrarCom" value="Enviar Comentário" class="btn btn-large btn-primary" />
                                </form>
                            </div>
                            <!-- End Comment Form -->
                        </div>
                    </div>
                    <!-- End Blog Item -->
                </div>
            </div>
            <!-- aside span4 -->
            <?php include_once ("elements/bodybloglat.php"); ?>
            <!-- /aside span4 -->
        </div>
    
<?php } ?>
    
</section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
