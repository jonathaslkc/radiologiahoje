<!--Body Lateral Blog-->
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
            <?php foreach($postagensob->buscarmaispop() as $key => $valPos2): ?>
                <div class="widget-blog-item media">
                    <div class="pull-left">
                        <div class="date">
                            <span class="month">
                                <?php 
                                    echo date('M', strtotime($valPos2->datapublicacao));
                                    $valPos2->datapublicacao;
                                ?>
                            </span>
                            <span class="day">
                                <?php 
                                    echo date('d', strtotime($valPos2->datapublicacao));
                                    $valPos2->datapublicacao;
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="media-body">
                        <a href="noticiaview.php?acao=open&id=<?php echo $valPos2->titulo; ?>"><h5><?php echo $valPos2->titulo; ?></h5></a>
                    </div>
                </div> 
            <?php endforeach; ?>
            </div>                        
        </div>
        <!-- End Popular Posts -->        

        <div class="widget widget-popular">
            <h3>Postagens Recentes</h3>
            <div class="widget-blog-items">
            <?php foreach($postagensob->buscapostrec() as $key => $valPos3): ?>
                <div class="widget-blog-item media">
                    <div class="pull-left">
                        <div class="date">
                            <span class="month">
                                <?php 
                                    echo date('M', strtotime($valPos3->datapublicacao));
                                    $valPos3->datapublicacao;
                                ?>
                            </span>
                            <span class="day">
                                <?php 
                                    echo date('d', strtotime($valPos3->datapublicacao));
                                    $valPos3->datapublicacao;
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="media-body">
                        <a href="noticiaview.php?acao=open&id=<?php echo $valPos3->titulo; ?>"><h5><?php echo $valPos3->titulo; ?></h5></a>
                    </div>
                </div> 
            <?php endforeach; ?>
            </div>                        
        </div>
        <!-- End New Posts -->
        
        <div class="widget">
            <h3>Categorias</h3>
            <div>
                <div class="row-fluid">
                    <div class="span6">
                        <ul class="unstyled">
                            <?php foreach($categoriaob->findAll() as $key => $valCat): ?>
                            <?php
                                $contcat = $contcat + 1;
                                if ($contcat < 6):
                                    echo '<li><a href="#">'.$valCat->nome.'</a></li>';
                                else:
                                    echo '
                            </ul>
                        </div>
                        <div class="span6">
                            <ul class="unstyled">
                                    <li><a href="#">'.$valCat->nome.'</a></li>';
                                endif;
                            ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>                       
        </div>
        <!-- End Category Widget -->

        <div class="widget">
            <h3>Todas as Tags</h3>
            <ul class="tag-cloud unstyled">
                <?php foreach($tagob->findAll() as $key => $valTag): ?>
                <?php
                    echo'
                        <li><a class="btn btn-mini btn-primary" href="#">'.$valTag->nome.'</a></li>
                    '
                ?>
                <?php endforeach; ?>
            </ul>
        </div> 
        <!-- End Tag Cloud Widget -->

<!--        <div class="widget">
            <h3>Arquivos</h3>
            <ul class="archive arrow">
                <li><a href="#">Junho 2016</a></li>
                <li><a href="#">Julho 2016</a></li>
                <li><a href="#">March 2013</a></li>
                <li><a href="#">February 2013</a></li>
            </ul>
        </div> -->
        <!-- End Archive Widget -->   

    </aside>
    <!-- /Body Lateral Blog -->