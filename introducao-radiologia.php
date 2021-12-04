<?php
$titulohead = "Introdução à Radiologia";
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
                    <h1>Introdução à Radiologia</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Introdução à Radiologia</li>
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
                        <h3 class="center">Radiologia</h3>
                        <p>
                            A radiologia é um complexo de conhecimentos multidisciplinar. Logo, para seu conhecimento inicial (introdutório), devemos compreender primeiramente sua física, sua formação e suas tecnologias, das convencionais até as mais atuais (Digital).
                        </p>
                        <p>
                            <b>Princípio Físico da Radiologia</b>
                        </p>
                        <p>
                            Para compreender a física da Radiologia, devemos iniciar entendendo o que é um átomo, sua estrutura e seus modelos.
                        <p>
                        <p>
                            A palavra “átomo” que vem do grego, significa “indivisível, sem divisão”. Quando estudado, acreditava-se ser a menor unidade da matéria, hoje (2016) pode-se dizer que o próprio átomo possui outras unidades ainda menores (quarks, léptons...).
                        </p>
                        <p>
                            O átomo constitui tudo na natureza.
                        </p>
                        <p>
                            Antes de sua estrutura final (chamada de Modelo de Bohr [atualmente já se contestam novos modelos mais enriquecidos]) houve uma série de modelos:
                        </p>
                        <p>
                            Em 1903, Hantaro Nagaoka (1865-1950) apresentou para a comunidade científica no Japão seu modelo atômico, fazendo uma analogia ao modelo planetário de Saturno. Assim, o modelo proposto por ele consistia em um núcleo com uma massa muito grande, e elétrons ligados eletrostaticamente ao núcleo, orbitando ao seu redor.
                        </p>
                        <img src="images/sample/uploadpost/atomo1.jpg">
                        <p>
                            No ano seguinte, o famoso modelo atômico do “pudim de ameixas” foi proposto por J. J. Thomson. Os elétrons carregados negativamente (ameixas) estariam distribuídos no interior de uma matéria carregada positivamente (pudim), assim garantia-se a condição de neutralidade do átomo.
                        </p>
                        <img src="images/sample/uploadpost/atomo2.jpg">
                        <p>
                            Ernest Rutherford, um ex-aluno de Thomson, realizou muitas experiências com a finalidade de verificar se o modelo de seu antigo professor era verdade.
                        </p>
                        <p>
                            Assim, Rutherford, auxiliado por seus discípulos (Geiger e Marsden) elaboraram um experimento onde lançaram partículas a (alpha: átomos de Hélio sem dois elétrons) sobre uma fina folha de ouro e mediram os ângulos de espalhamento após a colisão entre os átomos. Os resultados mostraram o que já esperavam, pois a maioria das partículas a espalhou em ângulos pequenos (entre 1º e 3º); porém uma quantidade significativa delas dispersou em ângulos maiores que 90º o que não podia ser explicado pelo modelo de Thomson.
                        </p>
                        <p>
                            O modelo de Rutherford resgata o conceito introduzido por Nagaoka.
                        </p>
                        <p>
                            Em 1911, Niels Bohr, foi trabalhar com J. J. Thomson e depois se mudou para Manchester (Inglaterra) e para o grupo de Rutherford onde formulou seu modelo atômico a partir do átomo de hidrogênio (constituído de um próton e um elétron), o chamado modelo orbital. Uma das primeiras adequações do modelo de Rutherford foi definir que os elétrons não giravam em qualquer órbita, mas existiam posições permitidas para o elétron em vários níveis orbitais. Normalmente, o elétron fica a órbita de menor raio, mais perto do núcleo atômico, chamado de estado fundamental. Bohr descreveu, também, que quando o átomo de hidrogênio recebia algum tipo de energia (diz-se excitado), seu elétron migrava para outra órbita de raio maior (nível mais energético); porém, ele não ficava muito tempo neste nível mais energético e voltava para o estado fundamental, emitindo o excesso de energia na forma de um fóton (quantum ou pacote de energia).
                        </p>
                        <img src="images/sample/uploadpost/atomo3.jpg">
                        <p>
                            As órbitas onde estão os elétrons estão organizadas em camadas que, para fins de identificação, estão classificadas como K, L, M, N...
                        </p>
                        <p>
                            O átomo é constituído de elétrons (carga negativa), pósitrons (carga positiva) e nêutrons (carga neutra).
                        </p>
                        <p>
                            <b>Descoberta dos Raios X</b>
                        </p>
                        <p>
                            No ano de 1895, quando Wilhelm Conrad Roentgen realizou um experimento utilizando um tubo de Crookes (antecessor do tubo de raios X moderno).
                        </p>
                        <p>
                            Ele observou que uma tela fluorescente (antecessora dos atuais écrans) brilhava fracamente enquanto o tubo permanecia ligado, este fenômeno acontecia em distâncias de até 2 m entre o tubo e esta tela fluorescente.
                        </p>
                        <p>
                            Aqueles raios eram muito penetrantes, pois atravessavam livros, madeiras, placas metálicas, líquidos entre outros que Roentgen, incansavelmente aplicava-se em estudar. Em um destes experimentos ele observou que conseguia ver o contorno dos ossos de sua própria mão, enquanto colocava um dos materiais na frente dos tais raios. Então convenceu sua esposa Bertha a colocar a mão dela sob a influência destes raios por cerca de 15 minutos sem se mexer e assim obteve-se a primeira radiografia de extremidade da história. Esta tão famosa radiografia está exposta no Deutsches Museum.
                        </p>
                        <p>
                            A capacidade de atravessar alguns materiais, incluindo o corpo humano, gerou um reboliço na medicina, pois os médicos poderiam ver o interior do corpo sem abri-lo cirurgicamente. Isto se tornou uma tremenda ferramenta de diagnóstico médico, que hoje conhecemos por radiodiagnóstico e abrange várias modalidades como radiologia convencional, fluoroscopia, mamografia e tomografia entre outras.
                        </p>
                        <p>
                            <b>
                                Evolução Tecnológica
                            </b>
                        </p>
                        <p>
                            Os raios X evoluíram de tal maneira que a tecnologia digital está quase que integralmente implantada.
                        </p>
                        <ul>
                            <li>
                                Raios X convencionais<br>
                                Uso de chapas e filmes e auxílio de processadoras para revelação (automática) ou manual (barris com químicos para mergulho do filme).
                            </li>
                            <li>
                                Raios X Computadorizado (CR)<br>
                                Uso de computadores modernos (para visualização e edição), equipamentos de digitalização e impressão.
                            </li>
                            <li>
                                Raios X Digital (DR)<br>
                                Automatizado e digital. Não necessitando de placas digitais (usadas na CR) ou chassis com écrans. Toda a mesa e placa ‘móvel’ (ligada com fio condutor limitante), estão conectadas com computador para posterior visualização (assim que disparado os Raios X) e edição.
                            </li>
                        </ul>
                        <p>
                            Para mais aprofundamento nos itens destacados, referenciamos o material da UTFPR (Universidade Tecnológica Federal do Paraná). <a href="http://rle.dainf.ct.utfpr.edu.br/hipermidia/images/documentos/Principios_fisicos_em_radiologia.pdf" target="_blank">Princípio Físico em Radiologia</a>.
                        </p>
                        <p>
                        <br>
                            <b>Por:</b> Jonathas Farias de Carvalho<br>
                            <b>Publicado em: 13/09/2016</b>
                        </p>
                        <p>
                            <br><br>
                            <b>Fontes:</b>
                            <br>http://rle.dainf.ct.utfpr.edu.br/hipermidia/index.php/radiologia-convencional<br>
                            <br>http://rle.dainf.ct.utfpr.edu.br/hipermidia/images/documentos/Principios_fisicos_em_radiologia.pdf<br>
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
