<?php 

    if(isset($_SESSION['logado'])  && (($_SESSION['tipoacesso'] == '2') || ($_SESSION['tipoacesso'] == '3'))):
?>

<!-- Administrativo -->
<section id="clients" class="main" style="line-height: 15px; padding-top:15px;padding-bottom: 10px;margin-bottom: 5px; background: #e8f4e8">
    <div class="container">
        <div class="row-fluid">
            <div class="span2">
                <div class="clearfix">
                    <h4 class="pull-left">Painel Administrativo</h4>
                    <div class="pull-right">
                        <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                    </div>
                </div>
                <p>Bem Vindo, 
                    <strong> <a href="usuariosedit.php?acao=editar&id=<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['usuario'] ?>!</a></strong>
                </p>
                <p>Último Acesso: <br>
                    <?php echo $_SESSION['ultacesso'] ?>
                </p>
                <div class="pull-left">
                    <i class="icon-remove icon-large text-error"></i>
                </div>
                <a class="text-error" href='index.php?logout=ok' onclick='return confirm("Você realmente deseja deslogar?")'>
                    <strong class="">SAIR</strong>
                </a>
            </div>
            <div class="span10">
                <div id="myCarousel" class="carousel slide clients">
                  <div class="carousel-inner">
                    <div class="active item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3">
                                    <a href="usuarios.php"><img style="" src="images/ico/list-usuario.png"><br>>>> 
                                        <i class="icon-th-list icon-large"></i>
                                        <strong>USUÁRIOS / MEMBROS </strong><<<
                                    </a>
                                </li>
                                <li class="span3">
                                    <a href="notificacao.php"><img style="" src="images/ico/notificacao.png"><br>>>> 
                                        <i class="icon-exclamation-sign icon-large"></i>
                                        <strong>NOTIFICAÇÕES </strong><<<
                                    </a>
                                </li>
                                <li class="span3">
                                    <a href="cadastro_itens.php"><img style="" src="images/ico/cadastrar.png"><br>>>> 
                                        <i class="icon-plus-sign icon-large"></i>
                                        <strong>CADASTRAR </strong><<<
                                    </a>
                                </li>
                                <li class="span3">
                                    <a href="http://webmail1.hostinger.com.br/roundcube/?_task=logout" target="_blank"><img style="" src="images/ico/webmail.png"><br>>>> 
                                        <i class="icon-envelope icon-large"></i>
                                        <strong>WEBMAIL </strong><<<
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

<!--                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>

            </div>
        </div>
    </div>
</div>
</section>
<!-- /Administrativo -->

<?php
    else:
    #    header("location: logar");
    ?>
<?php    
    endif;
?>