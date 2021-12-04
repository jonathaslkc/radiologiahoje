<?php

$titulohead = "Radioproteção";
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
                    <h1>Radioproteção</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Radioproteção</li>
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
                        <h3 class="center">Radioproteção</h3>
                        <p>
                            <br>Segundo a “Comissão Nacional de Energia Nuclear – CNEN”, Proteção Radiológica ou Radioproteção é o conjunto de medidas que visa proteger os indivíduos contra possíveis efeitos indesejáveis originados pela radiação ionizante. Estas medidas  de proteção radiológica estão fundamentadas em três princípios básicos fundamentais:
                        </p>
                        <ul>
                            <li>JUSTIFICAÇÃO</li>
                            <li>OTIMIZAÇÃO</li>
                            <li>LIMITAÇÃO DE DOSES INDIVIDUAIS</li>
                        </ul>
                        <p>
                            <b>Justificação da Prática:</b> princípio básico de proteção radiológica que estabelece que nenhuma prática ou fonte ligada a uma prática deve ser autorizada a menos que produza suficiente benefício para o individuo exposto ou para a sociedade, de modo a compensar o detrimento que possa ser causado.<br>
                            <b>Otimização da Proteção:</b> estabelece que as instalações e as práticas devem ser planejadas, implantadas e executadas de modo que a magnitude das doses individuais, o número de pessoas expostas e a probabilidade de exposições acidentais sejam tão baixos quanto razoavelmente executável, levando-se em conta os fatores sociais e econômicos, além das restrições de dose aplicáveis.<br>
                            <b>Limitação de Dose Individual:</b> as doses individuais de trabalhadores (técnicos ou tecnólogos em radiologia), e de indivíduos não devem exceder os limites anuais de dose efetiva ou de dose equivalente estabelecidos na Norma da CNEN 3.01.
                        </p>
                        <h4>PROCESSOS DE REDUÇÃO DE EXPOSIÇÕES AS RADIAÇÕES IONIZANTES</h4>
                        <p>
                            <b>Tempo, blindagem e distância:</b> a diminuição do tempo de exposição do paciente ao mínimo necessário, para uma determinada técnica de exames é o modo mais prático para se reduzir a exposição as radiações, e quanto mais afastado da fonte de radiação, menor a energia do feixe; <br>
                            <b>Rotinas de Trabalho:</b> utilizar sempre técnicas radiológicas adequadas para evitar a necessidade de repetição, reduzindo o efeito da radiação espalhada sobre o profissional;
                            É preciso que o Tecnólogo ou Técnico em radiologia use sempre o seu dosímetro individual em sua jornada de trabalho; 
                            Estar sempre na cabine de comando ou biombo durante a realização do exame; 
                            Utilizar sempre os acessórios plumbíferos quando houver necessidade permanecer próximo ao paciente durante a realização do exame; 
                            As portas da sala devem ser mantidas sempre fechadas durante os procedimentos.<br>
                            <b>Sinalização de Aviso:</b>
                        </p>
                        <img src="images/sample/uploadpost/sinaliza_radioprotecao.png">
                        <p>
                            <br><b>Monitoração:</b> o dosímetro individual é de uso exclusivo do profissional da radiologia na sua área de trabalho, o dosímetro deve ser usado na altura do tórax durante sua jornada de trabalho, sendo monitorado mensalmente para quantificar a exposição de dose absorvida pelo profissional.
                        </p>
                        <img src="images/sample/uploadpost/dosimetro_radioprotecao.png">
                        <p>
                            <br><b>Equipamentos de Proteção dos Indivíduos:</b> os equipamentos de Proteção Radiológica destinam-se à proteção de trabalhadores, pacientes e indivíduos do público, em todas as ocasiões que estes estiverem expostos as radiações ionizantes, desde de que seu uso não influencie os resultados do procedimento. Utilizar avental plumbífero, luva plumbífera, óculos plumbífero, protetor de órgãos genitais e protetor de tireóide.
                        </p>
                        <img src="images/sample/uploadpost/epi_radioprotecao.png">
                        <p>
                            <br><b>Prevenção de Acidentes:</b> deve-se desenvolver os meios e implementar as ações necessárias para minimizar a contribuição de erros humanos que levem à ocorrência de exposições acidentais.
                        </p>
                        <p>
                        <br>
                            <b>Por:</b> Wildson Santos<br>
                            <b>Publicado em: 08/08/2016</b>
                        </p>
                        <p>
                            <br><br>
                            <b>Fontes:</b>
                            <br>http://appasp.cnen.gov.br/seguranca/normas/pdf/Nrm301.pdf <br>
                            Google Imagens 
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
