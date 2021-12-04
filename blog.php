<?php
$titulohead = "Blog de Notícias";
$menusel = "blog";
include_once ("elements/header.php"); 

$tamtxt = 250;
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
    <?php include_once ("elements/menu.php");?>
<!-- /header -->
<!-- Administrativo -->
    <?php include_once ("elements/admin.php"); ?>
<!-- /Administrativo -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Blog de Notícias</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Início</a> <span class="divider">/</span></li>
                        <li class="active">Blog de Notícias</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->         

    <section id="about-us" class="container main">
        <div class="row-fluid">
            <div class="span8">
                <div class="blog">
                    <?php foreach($postagensob->buscapostord() as $key => $valPos):
                        $resultfind = $membroob->findMembro($valPos->rel_post_membro);
                        foreach($comentob->buscacomentarios($valPos->titulo) as $key => $valComent): $contaComentarios = $key + 1;echo'sss'; endforeach;
                        echo
                        '<div class="blog-item well">
                            <a href="noticiaview.php?acao=editar&id=' . $valPos->titulo .'"><h2>'.$valPos->titulo.'</h2></a>
                            <div class="blog-meta clearfix">
                                <p class="pull-left">
                                    <i class="icon-user"></i> por <a href="#">'.$resultfind->nome.' '.$resultfind->sobrenome.'</a> | <i class="icon-folder-close"></i> Categoria <a href="#">'.$valPos->rel_categoria;
                            echo   '</a> | <i class="icon-calendar"></i> '.utf8_encode(strftime( '%A, %d de %B de %Y', strtotime($valPos->datapublicacao)));
                            echo   '</p>
                                <p class="pull-right"><i class="icon-comment pull"></i> <a href="noticiaview.php?acao=editar&id=' . $valPos->titulo . '#comments">'.$contaComentarios.' Comments</a></p>
                            </div>
                            <p><img src="images/sample/uploadpost/'.$valPos->img.'" style="width:100%;" alt="" /></p>
                            <p>';
                                $contaComentarios = 0;  // RESETANDO CONTADOR DE COMENTÁRIOS DAS POSTAGENS
                                if (strlen($valPos->texto) > $tamtxt):
                                    echo substr($valPos->texto, 0, $tamtxt).'...';
                                else:
                                    echo $valPos->texto;
                                endif;
                       echo '</p>
                            <a class="btn btn-link" href="">'; 
                       echo "<a href='noticiaview.php?acao=editar&id=" . $valPos->titulo . "' onclick=''>Leia Mais...";
                       echo '<i class="icon-angle-right"></i></a>
                        </div>';
                    endforeach;
                    
                        $artigos_por_pagina = 5;

                        // Página atual onde vamos começar a mostrar os valores
                        $pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
                        $pagina_atual = $pagina_atual * $artigos_por_pagina;

                        // Cria a consulta para o MySQL e executa
                        #$stmt = $conexao->prepare("SELECT * FROM $tabela LIMIT $pagina_atual,$artigos_por_pagina");
                        #$stmt->execute();

                        // Mostra os valores
                        #while( $f = $stmt->fetch() ) {
                        #   echo $f["{$prefixo}titulo"] . '<br>';
                        #}
                        
                    
                    foreach($postagensob->buscapostord2($pagina_atual,$artigos_por_pagina) as $key => $valPos):
                        
                    $resultfind = $membroob->findMembro($valPos->rel_post_membro); 
                    
                    foreach($comentob->buscacomentarios($valPos->titulo) as $key => $valComent): $contaComentarios = $key + 1; endforeach;

                    echo
                    '
                    <div class="blog-item well">
                        <a href="noticiaview.php?acao=open&id=' . $valPos->titulo .'"><h2>'.$valPos->titulo.'</h2></a>
                        <div class="blog-meta clearfix">
                            <p class="pull-left">
                                <i class="icon-user"></i> por <a href="about-us.php">'.$resultfind->nome.' '.$resultfind->sobrenome.'</a> | <i class="icon-folder-close"></i> Categoria <a href="#">'.$valPos->rel_categoria;
                        echo   '</a> | <i class="icon-calendar"></i> '.utf8_encode(strftime( '%A, %d de %B de %Y', strtotime($valPos->datapublicacao)));
                        echo   '</p>
                            <p class="pull-right"><i class="icon-comment pull"></i> <a href="noticiaview.php?acao=open&id=' . $valPos->titulo . '#comments">'.$contaComentarios.' Comentários</a></p>
                        </div>
                        <p><img src="images/sample/uploadpost/'.$valPos->img.'" style="width:100%;" alt="" /></p>
                        <p>';
                            $contaComentarios = 0;  // RESETANDO CONTADOR DE COMENTÁRIOS DAS POSTAGENS
                            if (strlen($valPos->texto) > $tamtxt):
                                echo substr($valPos->texto, 0, $tamtxt).'...';
                            else:
                                echo $valPos->texto;
                            endif;
                   echo '</p>
                        <a class="btn btn-link" href="">'; 
                   echo "<a href='noticiaview.php?acao=open&id=" . $valPos->titulo . "' onclick=''>Leia Mais...";
                   echo '<i class="icon-angle-right"></i></a>
                    </div>
                    ';
               endforeach;
                        

                        // Pegamos o valor total de artigos em uma consulta sem limite
                        $result = $postagensob->linhas();
                        $total_artigos = $result->NumLinhas;

                        // Exibimos a paginação
                        echo '<div class="pagination">
                                <ul>';
                        echo paginacao( $total_artigos, $artigos_por_pagina, 5 ); 
                        echo '</div>
                                </ul>';
                    ?>

              <div class="gap"></div>

        </div>
    </div>

    <!-- aside span4 -->
    <?php include_once ("elements/bodybloglat.php"); ?>
    <!-- /aside span4 -->
</div>

</section>

<?php include_once ("elements/footer.php"); ?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
