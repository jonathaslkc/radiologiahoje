<?php
$titulohead = "Radiologia Hoje - Seu portal de Notícias e Educação";
$menusel = "inicio";
include_once ("elements/header.php"); 
?>

<body>
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--Header-->
    <?php include_once ("elements/menu.php"); ?>
<!-- /header -->
<!-- Administrativo -->
    <?php include_once ("elements/admin.php"); ?>
<!-- /Administrativo -->
    <!--Slider-->
<section id="slide-show">
    <div id="slider" class="sl-slider-wrapper">

        <!--Slider Items-->    
        <div class="sl-slider">
            <!--Slider Item1-->
            <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="container">
                        <a href="noticia.php" style="color:#fff">
                            <img class="pull-right" src="images/sample/slider/img1.png" alt="" />
                            <h2>Portal Radiologia Hoje</h2>
                            <h3 class="gap">Primeiro portal web relacionado a Radiologia do Estado!</h3>
                        </a>
                        <a class="btn btn-large btn-transparent" href="noticia.php">Leia mais...</a>
                    </div>
                </div>
            </div>
            <!--/Slider Item1-->

            <!--Slider Item2-->
            <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="container">
                        <a href="noticia2.php" target="_blank" style="color:#fff">
                            <img class="pull-right" src="images/sample/slider/img2.png" style="vertical-align: middle" alt="" />
                            <h2>Processo Seletivo da FHS</h2>
                            <h3 class="gap">Conheça e acompanhe o andamento do Processo</h3>
                        </a>
                        <a class="btn btn-large btn-transparent" target="_blank" href="noticia2.php">Leia mais...</a>
                    </div>
                </div>
            </div>
            <!--Slider Item2-->

            <!--Slider Item3-->
            <div class="sl-slide item3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="container">
                        <a href="noticia3.php" target="_blank" style="color:#fff">
                            <img class="pull-right" src="images/ebserv.png" alt="" />
                            <h2>EBSERV</h2>
                            <h3 class="gap">Concurso Autorizado! Serão mais de 700 vagas para o HRL-UFS</h3>
                        </a>
                        <a class="btn btn-large btn-transparent" href="noticia3.php">Leia mais...</a>
                    </div>
                </div>
            </div>
            <!--Slider Item4-->
            <div class="sl-slide item4" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="container">
                        <a href="noticia1.php" target="_blank" style="color:#fff">
                            <img class="pull-right" src="images/sample/slider/turmarad.png" alt="" />
                            <h2>Novos Formandos!</h2>
                            <h3 class="gap">Segunda Turma de Tecnólogos em Radiologia (2013/2)</h3>
                        </a>
                        <a class="btn btn-large btn-transparent" href="noticia1.php">Leia mais...</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/Slider Items-->

        <!--Slider Next Prev button-->
        <nav id="nav-arrows" class="nav-arrows">
            <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
            <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
        </nav>
        <!--/Slider Next Prev button-->

    </div>
    <!-- /slider-wrapper -->           
</section>
<!--/Slider-->

<section class="main-info">
    <div class="container">
        <div class="row-fluid">
<!--            <div class="span9">-->
            <div class="row-fluid">
                <h4>Bem Vindo ao portal Radiologia Hoje. Aqui você encontra temas sobre *Notícias* *Estudos* *Cursos* relacionados a Radiologia Médica e Industrial</h4>
                <p class="no-margin">Olá visitante, pedimos sua ajuda para divulgar nossa -page no facebook. É simples! Basta clicar no botão compartilhar. Grato!</p>
                <div class="fb-share-button" data-href="http://radiologiahoje.pe.hu/inicio/" data-layout="button" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fradiologiahoje.pe.hu%2Finicio%2F&amp;src=sdkpreparse">Compartilhar</a>
                </div>
            </div>
<!--            <div class="span3">
                Clique aqui para 
            </div>-->
        </div>
    </div>
</section>

<!--Services-->
<section id="services">
    <div class="container">
        <div class="center gap">
            <h3>ATUALIZE-SE</h3>
            <p class="lead">Congressos, Feiras, Jornadas, Seminários e Eventos deste ano [2016]</p>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <a href="">
                            <h4 class="media-heading">CBR 2016</h4>
                            <p>
                                A 46ª edição do Congresso Brasileiro de Radiologia (CBR 16) será realizada de 13 a 15 de outubro do próximo ano, no Expo Unimed, em Curitiba (PR). O evento nacional do Colégio acontecerá na capital paranaense...
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <a href="">
                            <h4 class="media-heading">SBMN 2016</h4>
                            <p>
                                O XXX Congresso Brasileiro de Medicina Nuclear acontecerá entre os dias 12 a 14 de novembro de 2016, na capital paulista, São Paulo/SP no Hotel Caesar Bussiness Faria Lima. A SBMN é constituída por médicos especialistas em Medicina Nuclear e outros profissionais de áreas correlatas, como tecnólogos, biólogos, físicos e químicos...
                            </p>
                        </a>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <a href="">
                            <h4 class="media-heading">JPR 2016</h4>
                            <p>
                                A 46ª Jornada Paulista de Radiologia (JPR'2016), que acontece de 28 de abril a 1º de maio de 2016, é organizada em parceria com a Sociedade de Radiologia Norte-Americana (RSNA). Esse será o segundo evento organizado pela SPR em conjunto com a RSNA, como parte do acordo entre as duas entidades...
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="gap"></div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-shopping-cart icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Ecommerce Solution</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">SEO &amp; Solution</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Bootstrap</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>
        </div>-->

    </div>
</section>
<!--/Services-->

<section id="recent-works">
    <div class="container">
        <div class="center">
            <h3>Conheça nossos parceiros!</h3>
<!--            <p class="lead">Look at some of the recent projects we have completed for our valuble clients</p>-->
        </div>  
        <div class="gap"></div>
        <ul class="gallery col-4">
            <!--Item 1-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/jfc.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a target="_blank" href="https://www.facebook.com/jonathas.fariascarvalho"><i class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>JFC Informática</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/parceiros/jfc.png" alt="A JFC Informática é nosso parceiro! Conheça..." style="max-height:400px;width:100%">
                    </div>
                </div>                 
            </li>
            <!--/Item 1--> 

            <!--Item 2-->
            <li>
                <div class="preview center">
                    <img alt=" " style="height: 120px" src="images/crtr7.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-2"><i class="icon-eye-open"></i></a><a target="_blank" href="https://www.facebook.com/crtr7/?fref=ts"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc center">
                    <h5>CRTR 7° - Conselho de<br> Técnicos em Radiologia</h5>
                </div>
                <div id="modal-2" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/crtr7lang.jpg" alt="Nossos parceiros" style="max-height:400px;width:100%">
                    </div>
                </div>                 
            </li>
            <!--/Item 2-->

            <!--Item 3-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/parceiro.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-3"><i class="icon-eye-open"></i></a><a href="contact-us.html"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Seja nosso parceiro!</h5>
                </div>
                <div id="modal-3" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/parceiro.png" alt="Nossos parceiros" style="max-height:400px;width:100%">
                    </div>
                </div>                 
            </li>
            <!--/Item 3--> 

            <!--Item 4-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/parceiro.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-4"><i class="icon-eye-open"></i></a><a href="contact-us.html"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Seja nosso parceiro!</h5>
                </div>
                <div id="modal-4" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/parceiro.png" alt="Nossos parceiros" style="max-height:400px;width:100%">
                    </div>
                </div>                 
            </li>
            <!--/Item 4-->               

        </ul>
    </div>

</section>

<section id="clients" class="main">
    <div class="container">
<!--        <div class="row-fluid">
            <div class="span2">
                <div class="clearfix">
                    <h4 class="pull-left">OUR PARTNERS</h4>
                    <div class="pull-right">
                        <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                    </div>
                </div>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
            <div class="span10">
                <div id="myCarousel" class="carousel slide clients">
                   Carousel items 
                  <div class="carousel-inner">
                    <div class="active item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 /Carousel items 

            </div>
        </div>
    </div>-->
</div>
</section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript"> 
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->
</body>
</html>