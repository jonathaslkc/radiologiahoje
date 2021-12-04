<?php
$titulohead = "Contato";
$menusel = "contato";
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

    <section class="no-margin">
        <iframe style="width:100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31335.473761666304!2d-37.0832522185427!3d-10.968337800243162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71ab16961ab7ca5%3A0x2f40633818f9d01b!2sFarol%C3%A2ndia%2C+Aracaju+-+SE!5e0!3m2!1spt-BR!2sbr!4v1466617608543"></iframe>
    </section>

    <section id="contact-page" class="container">
        <div class="row-fluid">
        <div class="span8">
            <h4>Formulário de Contato</h4>
            <div class="status alert alert-success" style="display: none"><?php echo $msgerro2; ?></div>
            <form name="form_contato" id="form_contato" method="POST" action="sendemail.php">
                <div class="row-fluid">
                    <div class="span5">
                        <label>Nome</label>
                        <input type="text" class="input-block-level" name="nomeC" required="required" placeholder="Seu nome">
                        <label>Email de Contato</label>
                        <input type="email" class="input-block-level" name="emailC" required="required" placeholder="Seu email de contato">
                        <label>Motivo do Contato:</label>
                        <select name="motivoC" class="input-block-level">
                            <option value="Parceria">Parceria</option>
                            <option value="Duvida" selected>Dúvida</option>
                            <option value="Elogio">Elogio</option>
                            <option value="Reclamação">Reclamação</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <div class="span7">
                        <label>Messagem</label>
                        <textarea name="mensagemC" maxlength="255" id="message" required="required" class="input-block-level" rows="8"></textarea>
                    </div>

                </div>
                <input type="submit" name="enviarMsg" class="btn btn-primary btn-large pull-right" value="Enviar Mensagem">
            </form>
        </div>
<!--            <div class="span8">
                <h4>Formulário de Contato</h4>
                <div class="status alert alert-success" style="display: none"></div>

                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                  <div class="row-fluid">
                    <div class="span5">
                        <label>Primeiro Nome</label>
                        <input type="text" class="input-block-level" name="nameContact" required="required" placeholder="Seu primeiro nome">
                        <label>Último Nome</label>
                        <input type="text" class="input-block-level" name="sobrenomeContact" required="required" placeholder="Seu último nome">
                        <label>Email de Contato</label>
                        <input type="text" class="input-block-level" name="emailContact" required="required" placeholder="Seu email de contato">
                    </div>
                    <div class="span7">
                        <label>Messagem</label>
                        <textarea name="messageContact" id="message" required="required" class="input-block-level" rows="8"></textarea>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-large pull-right">Enviar Mensagem</button>
                <p> </p>

            </form>
        </div>-->

        <div class="span3">
            <h4>Nossa Localização</h4>
            <p>Para contato, além de email, possuimos número telefônico (whatsapp).</p>
            <p>
                <i class="icon-map-marker pull-left"></i> Aracaju, Sergipe<br>
<!--                Lafayette, 1212,  United States-->
            </p>
            <p>
                <i class="icon-envelope"></i> &nbsp; radiologiahoje@radiologiahoje.com
            </p>
            <p>
                <i class="icon-phone"></i> &nbsp;+55 79 9 8848-5231
            </p>
            <p>
                <i class="icon-globe"></i> &nbsp;http://www.radiologiahoje.com.br
            </p>
        </div>

    </div>

</section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>   

</body>
</html>
