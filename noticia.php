<?php
$titulohead = "Nossos Serviços";
$menusel = "blog";
include_once ("elements/header.php"); 
?>

<body>

<!--Header-->
    <?php include_once ("elements/menu.php"); ?>
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
        <div class="row-fluid">
            <div class="span8">
                <div class="blog">
                    <div class="blog-item well">
                        <a href="#"><h2>Radiologia Hoje<br>Primeiro portal web relacionado a Radiologia do Estado de Sergipe!</h2></a>
                        <div class="blog-meta clearfix">
                            <p class="pull-left">
                              <i class="icon-user"></i> por <a href="#">Jonathas Farias de Carvalho</a> | <i class="icon-folder-close"></i> Categoria <a href="#">Notícia</a> | <i class="icon-calendar"></i> 20 de Junho de 2016
                          </p>
                          <p class="pull-right"><i class="icon-comment pull"></i> <a href="#comments">0 Comentário</a></p>
                      </div>
                        <p><img src="images/sample/slider/img1.png" style="width:100%;" alt="" /></p>
                        <p>
                            Nesta segunda-feira, 20, torna-se publico o portal RadiologiaHoje. Temos como objetivo apresentar informações da área de Radiologia (Notícias / Apostilas / Artigos) aos leitores de forma simples, rápida e necessária. Nosso portal conta com layout agradável e moderno, valorizando o ambiente mobile (responsivo). As informações contidas aqui serão com foco nas seguintes classes: Profissional da área médica (com foco em radiologia); Estudantes e Leitores em geral.
                        </p>
                        <ul><li><span style="">Resumo dos que você pode encontrar aqui</span></li></ul>
                        <ul style="list-style: none;"><li>
                            <ul><li>Editais</li></ul>
                            <ul><li>Processos Seletivos</li></ul>
                            <ul><li>Temas para Estudo Relacionados a Radiologia</li></ul>
                            <ul><li>Blog de Notícias</li></ul>
                            <ul><li>Fórum (em desenvolvimento)</li></ul>
                        </li></ul>
                    <p>
                        Aproveite, estude, interaja e fique em dias com as principais notícias de Sergipe, Brasil e Mundo.
                    </p>
                    <br><br>

                    <div class="tag">
                        Tags : <a href="#"><span class="label label-success">Radiologia</span></a> 
<!--                        <a href="#"><span class="label label-success">HTML5</span></a> 
                        <a href="#"><span class="label label-success">Bootstrap</span></a> 
                        <a href="#"><span class="label label-success">WordPress</span></a>-->
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
                    
                    <div id="comments" class="comments">

                        <h4>0 Comentários</h4>
                        <div class="comments-list">
<!--                            <div class="comment media">
                                <div class="pull-left">
                                    <img class="avatar" src="images/sample/cAvatar1.jpg" alt="" />  
                                </div>

                                <div class="media-body">
                                    <strong>Posted by <a href="#">Krikor</a></strong><br>
                                    <small>Thursday, 01 March 2012 15:26</small><br>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage</p>
                                </div>
                            </div>

                            <div class="comment media">
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

                        <!-- Start Comment Form -->
                        <div class="comment-form">
                            <h4>Faça um Comentário</h4>
                            <p class="muted">Os campos ~nome~email~mensagem~ são obrigatórios.</p>
                            <form name="comment-form" id="comment-form">
                                <div class="row-fluid">
                                    <div class="span4">
                                        <input type="text" name="name" required="required" class="input-block-level" placeholder="Nome" />
                                    </div>
                                    <div class="span4">
                                        <input type="email" name="email" required="required" class="input-block-level" placeholder="Email" />
                                    </div>
                                    <div class="span4">
                                        <input type="url" name="website" class="input-block-level" placeholder="Website" />
                                    </div>
                                </div>
                                <textarea rows="10" name="message" id="message" required="required" class="input-block-level" placeholder="Mensagem"></textarea>
                                <input type="submit" value="Enviar Comentário" class="btn btn-large btn-primary" />
                            </form>
                        </div>
                        <!-- End Comment Form -->

                    </div>

                </div>
                <!-- End Blog Item -->

            </div>
        </div>
        <aside class="span4">
            <div class="widget search">
                <form>
                    <input type="text" class="input-block-level" placeholder="Pesquisar">
                </form>
            </div>
            <!-- /.search -->

            <div class="widget ads">
                <div class="row-fluid">Publicidade</div>
                <div class="row-fluid">
                    <div class="span6">
                        <a href="contact-us.php"><img src="images/parceiro.png" alt=""></a>
                    </div>

                    <div class="span6">
                        <a href="contact-us.php"><img src="images/parceiro.png" alt=""></a>
                    </div>
                </div>
                <p> </p>
                <div class="row-fluid center">
                    <div class="span-fluid">
                        <a href="http://api.hostinger.com.br/redir/15184693" target="_blank"><img src="http://hostinger.com.br/banners/br/hostinger-300x250-1.gif" alt="Hospedagem" border="0" width="300" height="250" /></a>
                    </div>
<!--
                    <div class="span6">
                        <a href="#"><img src="images/parceiro.png" alt=""></a>
                    </div>-->
                </div>
            </div>
            <!-- /.ads -->

            <div class="widget widget-popular">
                <h3>Postagens mais Populares</h3>
                <div class="widget-blog-items">
                    <div class="widget-blog-item media">
                        <div class="pull-left">
                            <div class="date">
                                <span class="month">Jun</span>
                                <span class="day">20</span>
                            </div>
                        </div>
                        <div class="media-body">
                            <a href="art_psfundacao.php"><h5>PS FHS<br>Andamento do Processo</h5></a>
                        </div>
                    </div>

<!--                    <div class="widget-blog-item media">
                        <div class="pull-left">
                            <div class="date">
                                <span class="month">Jun</span>
                                <span class="day">24</span>
                            </div>
                        </div>
                        <div class="media-body">
                            <a href="#"><h5>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris</h5></a>
                        </div>
                    </div>

                    <div class="widget-blog-item media">
                        <div class="pull-left">
                            <div class="date">
                                <span class="month">Jun</span>
                                <span class="day">24</span>
                            </div>
                        </div>
                        <div class="media-body">
                            <a href="#"><h5>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris</h5></a>
                        </div>
                    </div>-->

                </div>                        
            </div>
            <!-- End Popular Posts -->        

            <div class="widget">
                <h3>Categorias</h3>
                <div>
                    <div class="row-fluid">
                        <div class="span6">
                            <ul class="unstyled">
                                <li><a href="#">Notícias</a></li>
<!--                                <li><a href="#">Design</a></li>
                                <li><a href="#">Updates</a></li>
                                <li><a href="#">Tutorial</a></li>
                                <li><a href="#">News</a></li>-->
                            </ul>
                        </div>

                        <div class="span6">
                            <ul class="unstyled">
<!--                                <li><a href="#">Joomla</a></li>
                                <li><a href="#">Wordpress</a></li>
                                <li><a href="#">Drupal</a></li>
                                <li><a href="#">Magento</a></li>
                                <li><a href="#">Bootstrap</a></li>-->
                            </ul>
                        </div>
                    </div>

                </div>                       
            </div>
            <!-- End Category Widget -->

            <div class="widget">
                <h3>Todas as Tags</h3>
                <ul class="tag-cloud unstyled">
                    <li><a class="btn btn-mini btn-primary" href="#">Radiologia</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">Radiologia Industrial</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">Medicina</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">Radioterapia</a></li>
<!--                    <li><a class="btn btn-mini btn-primary" href="#">Drupal</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">Bootstrap</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">jQuery</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">Tutorial</a></li>
                    <li><a class="btn btn-mini btn-primary" href="#">Update</a></li>-->
                </ul>
            </div> 
            <!-- End Tag Cloud Widget -->

            <div class="widget">
                <h3>Arquivos</h3>
                <ul class="archive arrow">
                    <li><a href="#">Junho 2016</a></li>
<!--                    <li><a href="#">April 2013</a></li>
                    <li><a href="#">March 2013</a></li>
                    <li><a href="#">February 2013</a></li>-->
                </ul>
            </div> 
            <!-- End Archive Widget -->   

        </aside>
    </div>

</section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
