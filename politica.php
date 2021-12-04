<?php
$titulohead = "Política de Privacidade";
$menusel = "inicio";
include_once ("elements/header.php"); 

?>

<body>

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
                    <h1>Política de Privacidade</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Política de Privacidade</li>
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
                        <h4 class="center">POLÍTICA DE PRIVACIDADE</h4>
                        <div class="accordion" id="accordion2">
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                        Da Navegação, Extração de Informações e Uso do Portal
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        O portal Radiologia Hoje tem o compromisso com a privacidade e a segurança de seus usuários durante todo o processo de navegação. Os dados cadastrais dos usuários e visitantes não são vendidos, trocados ou divulgados para terceiros. Ao acessar o site são extraídos dados quantitativos através da navegação de usuários e visitantes. As mensagens enviadas via formulário de contato são armazenadas em banco de dados e e-mail alvo. Estas são guardadas e asseguradas para visualização de pessoas envolvidas autorizadas. Para os visitantes que desejam ingressar ao portal para interações nos fóruns, é obrigatório o envio das seguintes informações pessoais através do formulário de cadastro: nome, CPF, data de nascimento, endereço, telefone, e-mail.  Para os parceiros/colaboradores, fazem uso do mesmo processo de envio de dados ‘formulário de cadastro’ de usuários com o acréscimo do campo CNPJ.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                        Do uso das informações
                                    </a>
                                </div>
                                <div id="collapseTwo" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        As informações colhidas nos formulários de cadastro são usadas para criar uma melhor performance de navegação para os usuários, no caso de parceiros/colaboradores, informações de adicionais são disponibilizadas para os visitantes a fim de manter a proposta do contrato de divulgação do  parceiro/colaborador.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                        Da privacidade dos dados fornecidos
                                    </a>
                                </div>
                                <div id="collapseThree" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        Todas as informações são transferidas, através de formulários, para o nosso banco de dados de forma segura por meio de mecanismos de segurança tecnológicos avançados.
                                    </div>
                                </div>
                            </div>
                        </div>
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
