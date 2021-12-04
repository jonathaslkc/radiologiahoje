<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.php"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li <?php if ($menusel == "inicio"){echo 'class="active"';}  ?>>    <a href="index.php">Início</a></li>
                        <li <?php if ($menusel == "sobre"){echo 'class="active"';}  ?>>     <a href="about-us.php">Sobre</a></li>
                        <li <?php if ($menusel == "editaisps"){echo 'class="active"';}  ?>> <a href="services.php">Editais / PS</a></li>
                        <li <?php if ($menusel == "serviços"){echo 'class="active"';}  ?>>        <a href="service-us.php">Serviços</a></li>
                        
                        <li class="dropdown <?php if ($menusel == "artigoe"){echo ' active';}  ?>">
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Radiologia <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
<!--                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Introdução a ...</a>
                                    <ul class="dropdown-menu">
                                      <li><a href="pricing.html">Radiologia</a></li>
                                      <li><a href="404.html">Anatomia e Fisiologia</a></li>
                                      <li><a href="pricing.html">Física Radiológica</a></li>
                                    </ul>
                                </li>
                                <li><a href="pricing.html">Radiologia CR / DR</a></li>-->
                                <li><a href="introducao-radiologia.php">Introdução a Radiologia</a></li>
                                <li><a href="">Tomografia Computadorizada TC</a></li>
                                <li><a href="introducao-rmn.php">Ressonância Magnética Nuclear RMN</a></li>
                                <li><a href="">Mamografia</a></li>
                                <li class="divider"></li>
<!--                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Radiologia...</a>
                                    <ul class="dropdown-menu">
                                      <li><a href="pricing.html">Industrial</a></li>
                                      <li><a href="404.html">Veterinária</a></li>
                                      <li><a href="pricing.html">Odontológica</a></li>
                                      <li><a href="404.html">Intervencionista</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="privacy.html">Radioterapia</a></li>
                                <li><a href="radioprotecao.php">Radioproteção</a></li>
                                <li><a href="legislacao-e-etica.php">Legislação e Ética</a></li>
                            </ul>
                        </li>
                        
                        <li <?php if ($menusel == "forum"){echo 'class="active"';}     ?>><a href="forum.php">Fórum</a></li> 
                        <li <?php if ($menusel == "blog"){echo 'class="active"';}     ?>><a href="blog.php">Blog de Notícias</a></li> 
                        <li <?php if ($menusel == "contato"){echo 'class="active"';}  ?>><a href="contact-us.php">Contato</a></li>
                        <li class="login <?php if ($_SESSION['logado']){echo ' active';}  ?>">
                            <a data-toggle="modal" href="#loginForm2"><i class="icon-lock"></i></a>
                        </li>
                        <li <?php if (@$_SESSION['logado'] == 0):echo ' hidden'; endif; ?>>
                            <a class="text-error" href='index.php?logout=ok' onclick='return confirm("Você realmente deseja deslogar?")'>
                                <i class="icon-remove icon-large text-error"></i>
                                <strong class="text-error">SAIR</strong>
                            </a>
                        </li>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>

    </header>
    <!-- /header -->
<!--<a href="http://www.webcontadores.com" target="_Blank" title="contador para site"></a>
<script type="text/javascript" src="http://counter7.01counter.com/private/countertab.js?c=c58d24161a5d95f64c0ba4a11bba4756"></script>-->