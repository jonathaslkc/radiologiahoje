<?php
$titulohead = "Painel Administrativo";
$menusel = "inicio";
include_once ("elements/header.php"); 


?>

<body>
    
<!--Header-->
    <?php include_once ("elements/menu.php"); 
    
    
    
    if(isset($_SESSION['logado'])  && (($_SESSION['tipoacesso'] == '2') || ($_SESSION['tipoacesso'] == '3'))):  //TESTAR SE ESTÁ LOGADO
    ?>
<!-- /header -->


    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <h1>Painel Administrativo <br> Postagem</h1>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    
    <!-- -------------### LISTAGEM DE USUÁRIOS  ###----------------- -->
    
<section id="registration-page" class="container center">
        <h3>Inserção de Editais/PS</h3>
    <?php if(isset($_GET['acaoedips']) && $_GET['acaoedips'] == 'editar'){
            $id = (int)$_GET['id'];
            $resultado = $editalps->find($id);
    ?>
        <form class="form-inline" action="" method="post">
            <hr>            
              <fieldset class="registration-form">
                <?php echo '<h4>'.$msgerro2.'</h4>' ?>
                <div class="control-group">
                    <!-- Tipo -->  
                    <div class="controls">
                        Edital <input type="radio" name="tipo" value="E" <?php if ($resultado->tipo == "E"){echo ' checked';} ?>>  
                        PS <input type="radio" name="tipo" value="P" <?php if ($resultado->tipo == "P"){echo ' checked';} ?>>
                    </div>
                </div>
                <div class="control-group">
                    <!-- Estado -->
                    <div class="controls">
                        <select class="" name="estado">
                            <optgroup label="Selecione">
                                <option value="AC" <?php if($resultado->estado=="AC"):echo'selected';endif;?>>Acre</option><option value="AL" <?php if($resultado->estado=="AL"):echo'selected';endif;?>>Alagoas</option><option <?php if($resultado->estado=="AP"):echo'selected';endif;?> value="AP">Amapá</option>
                                <option value="AM" <?php if($resultado->estado=="AM"):echo'selected';endif;?>>Amazonas</option><option <?php if($resultado->estado=="BA"):echo'selected';endif;?> value="BA">Bahia</option><option <?php if($resultado->estado=="CE"):echo'selected';endif;?> value="CE">Ceará</option>
                                <option value="DF" <?php if($resultado->estado=="DF"):echo'selected';endif;?>>Distrito Federal</option><option value="ES" <?php if($resultado->estado=="ES"):echo'selected';endif;?>>Espirito Santo</option>
                                <option value="GO" <?php if($resultado->estado=="GO"):echo'selected';endif;?>>Goiás</option><option value="MA" <?php if($resultado->estado=="MA"):echo'selected';endif;?>>Maranhão</option>
                                <option value="MS" <?php if($resultado->estado=="MS"):echo'selected';endif;?>>Mato Grosso do Sul</option><option value="MT" <?php if($resultado->estado=="MT"):echo'selected';endif;?>>Mato Grosso</option>
                                <option value="MG" <?php if($resultado->estado=="MG"):echo'selected';endif;?>>Minas Gerais</option><option value="PA" <?php if($resultado->estado=="PA"):echo'selected';endif;?>>Pará</option><option value="PB" <?php if($resultado->estado=="PB"):echo'selected';endif;?>>Paraíba</option>
                                <option value="PR" <?php if($resultado->estado=="PR"):echo'selected';endif;?>>Paraná</option><option value="PE" <?php if($resultado->estado=="PE"):echo'selected';endif;?>>Pernambuco</option><option value="PI" <?php if($resultado->estado=="PI"):echo'selected';endif;?>>Piauí</option>
                                <option value="RJ" <?php if($resultado->estado=="RJ"):echo'selected';endif;?>>Rio de Janeiro</option><option value="RN" <?php if($resultado->estado=="RN"):echo'selected';endif;?>>Rio Grande do Norte</option>
                                <option value="RS" <?php if($resultado->estado=="RS"):echo'selected';endif;?>>Rio Grande do Sul</option><option value="RO" <?php if($resultado->estado=="RO"):echo'selected';endif;?>>Rondônia</option>
                                <option value="RR" <?php if($resultado->estado=="RR"):echo'selected';endif;?>>Roraima</option><option value="SC" <?php if($resultado->estado=="SC"):echo'selected';endif;?>>Santa Catarina</option>
                                <option value="SP" <?php if($resultado->estado=="SP"):echo'selected';endif;?>>São Paulo</option><option value="SE" <?php if($resultado->estado=="SE"):echo'selected';endif;?>>Sergipe</option>
                                <option value="TO" <?php if($resultado->estado=="TO"):echo'selected';endif;?>>Tocantins</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <!-- Descricao -->
                    <div class="controls">
                        <textarea name="descricao"><?php echo $resultado->descricao; ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <!-- Data Início -->
                    <div class="controls">
                        <input type="text" id="dataini" value="<?php echo utf8_encode(strftime( '%d/%m/%Y', strtotime($resultado->dataini))); ?>" name="dataini" placeholder="Data Abertura" class="input-small">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Data Final -->
                    <div class="controls">
                        <input type="text" id="datafin" value="<?php echo utf8_encode(strftime( '%d/%m/%Y', strtotime($resultado->datafin))); ?>" name="datafin" placeholder="Data Final" class="input-small">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Fonte -->
                    <div class="controls">
                        <input type="url" name="fonte" value="<?php echo $resultado->fonte; ?>" placeholder="Fonte" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Buttons -->
                    <div class="controls">
                        <button class="btn btn-info btn-large btn-block" type="submit" name="atualizaEdiPs">Atualizar</button>
                        <?php echo "<a class='btn btn-danger btn-medium btn-block' href='usuarios.php?acaoedips=deletar&id=" . $resultado->id . "' onclick='return confirm(\"Deseja realmente deletar o registro do estado da(o) " . $resultado->estado . " ?\")'>Deletar</a>" ?>
                    </div>
                </div>
              </fieldset>
        </form>
    <?php } ?>
    </section>
    
<?php


else:
    echo('
            <section id="registration-page" class="container center">
                <fieldset class="registration-form">
                    <div class="control-group center">
                        <h3 class="text-error">Você não possui Permissão para continuar!</h3>
                        <a href="index.php" class="text-info"><h4>Voltar</h4></a>
                    </div>
                </fieldset>
            </section>
        ');
endif;


include_once ("elements/footer.php"); 
?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(function() {
    $( "#dataini,#datafin" ).datepicker({
        language: 'pt_BR',
        format: 'yy/mm/dd'
    });
  });
</script>

</body>
</html>
