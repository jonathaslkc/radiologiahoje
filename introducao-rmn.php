<?php
$titulohead = "Introdução à RMN";
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
                    <h1>Introdução à Ressonância Magnética Nuclear (RMN)</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Introdução à RMN</li>
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
                        <h3 class="center">Ressonância Magnética </h3>
                        <p>
                            A ressonância magnética consiste na utilização do campo magnético e ondas de radiofrequência para obtenção de imagem.
                        </p>
                        <p>
                            Há mais de 5.000 anos, de acordo com a lenda, um imperador chinês, chamado Hoang-ti, tinha uma estatueta preta, em forma de mulher, montada sobre um pivô na frente da sua carruagem. Não importava para a direção que a carruagem ia, a estatueta apontava sempre para o sul. 
                        </p>
                        <p>
                            Essa foi a primeira citação feita a respeito do imã ou magneto.
                        <p>
                        <p>
                            Um marco na história do imã ocorreu em 1267, quando Petrus Peregrinus de Maricout, um engenheiro do exército francês, descobriu que a força do imã varia, e deu o nome para essa variação de polo norte e sul. Hoje nós entendemos que essas correntes, sejam atômicas ou elétricas em fios metálicos, são fontes básicas de campos magnético. A física moderna diz que o giro dos elétrons em volta do núcleo e em torno do seu próprio eixo na direção horaria e anti-horária provocam o spin que é a causa do magnetismo.
                        </p>
                        <p>
                            Existem três tipos de imãs que podem ser utilizados na RM: permanentes, resistido, supercondutor.
                        </p>
                        <p>
                            Para que haja a interação do corpo com o campo era necessário algo que promovesse essa interação, como sabemos nosso corpo é formado por ≅ 80% de água e  cada molécula de água possui 2H, conclui-se que dois terços do corpo humano são formados por hidrogênio.
                        </p>
                        <p>
                            O núcleo de hidrogênio tem um próton com carga elétrica positiva e em rotação, ou seja, com movimento. Portanto o núcleo do hidrogênio tem um campo magnético induzido em torno dele e atua como um pequeno magneto.
                        </p>
                        <p>
                            Para entendermos a ressonância magnética é necessário que conheçamos alguns conceitos que serão descritos posteriormente.
                        </p>
                        <p>
                        <br>
                            <b>Por:</b> Viviane Evangelista de Farias<br>
                            <b>Publicado em: 13/09/2016</b>
                        </p>
                        <p>
                            <br><br>
                            <b>Fontes:</b>
                            <br>Ressonância Magnética: Aplicações Práticas - Catherine Westbrook, Carolyn Kaut Roth e John Talbot. Guanabara Koogan. Ed. 4ª - 2013<br>
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
