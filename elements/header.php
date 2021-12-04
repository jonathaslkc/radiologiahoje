<?php
//$dir = dirname(__FILE__);
//echo "<p>Caminho absoluto da sua pasta: " . $dir . "</p>";
//echo "<p>Caminho absoluto da sua pasta aonde estara o seu .htpasswd: " . $dir . "/.htpasswd" . "</p>";
    if(!isset($_SESSION)) { session_start(); }                                      // -------------------------------- INÍCIAR SESSÃO
    
    
    function __autoload($class_name){                                               // -------------------------------- CARREGAR CLASSE USADA
        require_once 'class/' . $class_name . '.php';
    }
    function clearId($id){
        $LetraProibi = Array(" ",",","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%");
        $special = Array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
           'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„');
        $clearspc = Array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
           'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','');
        $newId = str_replace($special, $clearspc, $id);
        $newId = str_replace($LetraProibi, "", trim($newId));
        return strtolower($newId);
    }

    function paginacao( 
        $total_artigos = 0, 
        $artigos_por_pagina = 3, 
        $offset = 5
    ) {    
        // Obtém o número total de página
        $numero_de_paginas = floor( $total_artigos / $artigos_por_pagina );

        // Obtém a página atual
        $pagina_atual = 1;

        // Atualiza a página atual se tiver o parâmetro pagina=n
        if ( ! empty( $_GET['pagina'] ) ) :
            $pagina_atual = (int) $_GET['pagina'];
        endif;

        // Vamos preencher essa variável com a paginação
        $paginas = null;

        // Primeira página
        $paginas .= " <li><a href='?pagina=0'>Home</a></li> ";

        // Faz o loop da paginação
        // $pagina_atual - 1 da a possibilidade do usuário voltar
        for ( $i = ( $pagina_atual - 1 ); $i < ( $pagina_atual - 1 ) + $offset; $i++ ):

            // Eliminamos a primeira página (que seria a home do site)
            if ( $i < $numero_de_paginas && $i > 0 ) :
                // A página atual
                $página = $i;

                // O estilo da página atual
                $estilo = null;

                // Verifica qual dos números é a página atual
                // E cria um estilo extremamente simples para diferenciar
                
                if ((@$_GET['pagina'])):
                    if (( $i == $pagina_atual)):
                        #if (( $i == $pagina_atual ) & ($i != 0)):
                        $estilo = ' class="active" ';
                    endif;
                endif;

                // Inclui os links na variável $paginas
                $paginas .= " <li $estilo ><a href='?pagina=$página'>$página</a></li> ";
            endif;

        endfor; // for

        $paginas .= " <li><a href='?pagina=".($numero_de_paginas - 1)."'>Última</a></li> ";  #VERIFICAR EM FUTURAS ATUALIZAÇÕES SE O CÓDIGO ESTÁ SATISFEITO COM O -1

        // Retorna o que foi criado
        return $paginas;

    }
    
    
    $msg              = '';
    $msgerro          = '';
    $msgerro2         = '';
    $msgerrousuedit   = '';
    $msgerromemedit   = '';
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.UTF-8', 'pt_BR.charset=ISO-8859-1', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    $logar      = new usuario();                                                         // -------------------------------- CRIANDO O OBJETO USUARIO
    $membroob   = new membro();
    $categoriaob= new categorias();
    $tagob      = new tags();
    $postagensob= new postagens();
    $comentob   = new comentarios();
    $imagem     = new imagem();
    $editalps   = new editalps();
    $topico     = new topico();
    $subtopico  = new subtopico();
    $resposta   = new replysubtopico();
    $artigoe    = new artigoe();
    $submenu    = new submenus();
    $submenufil = new submenufilho();
    $evento     = new evento();

///////////////////////////////////MODAL PARA LOGAR USUARIO//////////////////////////////////////////////////
    if(isset($_POST['entrar'])):                                                    // -------------------------------- PEGAR DADOS POST NO CLIQUE 'ENTRAR'
        $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha   = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
        $logar->setUsuario($usuario);
        $logar->setSenha($senha);

        if (($_POST['usuario'] == '') AND ($_POST['senha'] == '')):
            $msgerro = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos!</fieldset>';
        else:
            if($logar->selectestado($usuario) != NULL):
                $msgerro= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Usuário aguardando aprovação do Administrador!</fieldset>';
            else:
                if($logar->logar($usuario, $senha)):                                      // -------------------------------- CHAMADA DO MÉTODO LOGAR
                    #$_SESSION['nomeusuario'] = $_POST['login'];
                    #header("location: logaremp.php");
                else:
                    $msgerro= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">Erro<br> Login/Senha incorreto!</fieldset>';
                endif;
            endif;
        endif;
    endif;
    //configuração para botão deslogar//
    if(isset($_GET['logout'])):
        if($_GET['logout'] == 'ok'):
            usuario::deslogar();
        endif;
    endif;

///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($logar->delete($id)):
//            $msgerro2 = 'Exclusão Efetivada com Sucesso!';
            header('location: usuarios.php#list_membro');
        endif;
    endif;
    if(isset($_POST['cadastrarUsu'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $rel_usu_membro = $_POST['rel_usu_membro1'];
        $usuario        = $_POST['usuario1'];   
        $senha          = $_POST['senha1'];   
        $tipoacesso     = $_POST['tipoacesso1'];
        $ativo          = $_POST['ativo1'];
        
        $logar->setRel_usu_membro($rel_usu_membro);
        $logar->setUsuario($usuario);
        $logar->setSenha($senha);
        $logar->setTipoacesso($tipoacesso);
        $logar->setAtivo($ativo);

        if (($_POST['usuario1'] == '') OR ($_POST['senha1'] == '') OR ($_POST['rel_usu_membro1'] == '')):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos!</fieldset>';
        else:
            if($logar->selectexiste($usuario) != NULL):
                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este nome de usuário já existe!</fieldset>';
            else:
                if($logar->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                    #header("location: logaremp.php");
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso!</fieldset>';
                else:
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizarUsu'])):  //atualizar com condição de atualizar senha ou não
        if (!$_POST['senhaUsuedit']):
            $id             = $_GET['id'];
            $usuario        = $_POST['usuarioUsuedit'];   
            $tipoacesso     = $_POST['tipoacessoUsuedit'];   
            $ativo          = $_POST['ativoUsuedit'];   
            $logar->setUsuario($usuario);
            $logar->setTipoacesso($tipoacesso);
            $logar->setAtivo($ativo);
            if($logar->updateST($id)):
                $msgerrousuedit = 'Atualização Efetuada com Sucesso!';
            endif;
        else:
            $id             = $_GET['id'];
            $usuario        = $_POST['usuarioUsuedit'];
            $senha          = $_POST['senhaUsuedit'];
            $tipoacesso     = $_POST['tipoacessoUsuedit'];
            $ativo          = $_POST['ativoUsuedit'];   
            $logar->setUsuario($usuario);
            $logar->setSenha($senha);
            $logar->setTipoacesso($tipoacesso);
            $logar->setAtivo($ativo);
            if($logar->update($id)):
                $msgerrousuedit = 'Atualização Efetuada com Sucesso!';
            endif;
        endif;
    endif;
    
    if(isset($_POST['carregarImgUsu'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        
        if(isset($_FILES["img"]["type"])):
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["img"]["name"]);
            $file_extension = end($temporary);
            if ((($_FILES["img"]["type"] == "image/png") || ($_FILES["img"]["type"] == "image/jpg") || ($_FILES["img"]["type"] == "image/jpeg")
            ) && ($_FILES["img"]["size"] < 2000000)//Aprox. 1000kb (1mB) arquivo para upar.
            && in_array($file_extension, $validextensions)) :
                $extensao = pathinfo($_FILES['img']['name']);
                $extensao = ".".$extensao['extension'];
                $nomeedit = $_POST['usuarioUsuedit'].'-avatar'.$extensao;
                strtolower($nomeedit);
                clearId($nomeedit);
                if ($_FILES["img"]["error"] > 0):
                    $msg = "Código Retornado: " . $_FILES["img"]["error"] . "<br/><br/>";
                else:
                    $sourcePath = $_FILES['img']['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = "images/sample/".clearId($nomeedit); // Target path where file is to be stored					
                    move_uploaded_file($sourcePath,$targetPath) ; // Movendo o arquivo upado
                    
                    $img = clearId($nomeedit);
                    $id  = $_GET['id'];
                    $logar->setImg($img);
                    if ($logar->carregarimagem($id)):
                        $msg = "<h4 class='btn btn-success btn-block'>
                               Imagem carregada com sucesso!</h4><br/>";
//                            "<br/><b>Nome do Arquivo:</b> " . $_FILES["img"]["name"] . "<br>".
//                            "<b>Tipo:</b> " . $_FILES["img"]["type"] . " - ".
//                            "<b>Tamanho:</b> " . ($_FILES["img"]["size"] / 1024) . " kB".
//                            "<b>Temp file:</b> " . $_FILES["img"]["tmp_name"] . "<br>";
                    else:
                        $msg = 'Algum erro interno aconteceu. Contacte o Administrador!';
                    endif;
                endif;
            else:
                $msg = "<h4 class='btn btn-danger btn-block'>***Tipo / Tamanho de arquivo inválido***<br>
                            Permitido apenas imagem com extensão .jpg/.png/.jpeg e tamanho máximo de 2mB!</h4>";
            endif;
	endif;
    endif;
    
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR MEMBRO//////////////////////////////////////////////////    
    if(isset($_GET['acao2']) && $_GET['acao2'] == 'deletar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($membroob->delete($id)):
//            $msgerro2 = 'Exclusão Efetivada com Sucesso!';
            header('location: usuarios.php#list_membro');
        endif;
    endif;
    if(isset($_POST['cadastrarMem'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $nome       = $_POST['nome2'];
        $sobrenome  = $_POST['sobrenome2'];   
        $dtnasc     = $_POST['dtnasc2'];   
        $cpf        = $_POST['cpf2'];   
        $cep        = $_POST['cep2'];
        $logradouro = $_POST['logradouro2'];
        $complemento= $_POST['complemento2'];   
        $numero     = $_POST['numero2'];   
        $telefone   = $_POST['telefone2'];   
        $celular    = $_POST['celular2'];   
        $email      = $_POST['email2'];
        $ativo      = $_POST['ativo2'];
        
        $membroob->setNome($nome);
        $membroob->setSobrenome($sobrenome);
        $membroob->setDtnasc($dtnasc);
        $membroob->setCpf($cpf);
        $membroob->setCep($cep);
        $membroob->setLogradouro($logradouro);
        $membroob->setComplemento($complemento);
        $membroob->setNumero($numero);
        $membroob->setTelefone($telefone);
        $membroob->setCelular($celular);
        $membroob->setEmail($email);
        $membroob->setAtivo($ativo);

        if (($_POST['nome2'] == '') OR ($_POST['email2'] == '') OR ($_POST['cpf2'] = '')):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos obrigatórios!</fieldset>';
        else:
            if($membroob->verificarexistenciacpf($cpf) != NULL):
                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este CPF já existe!</fieldset>';
            else:
                if ($membroob->verificarexistenciaemail($email) != NULL):
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este Email já existe!</fieldset>';
                else:
                    if($membroob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        #header("location: logaremp.php");
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso!</fieldset>';
                    else:
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizarMem'])):
        $id         = $_GET['id'];
        $nome       = $_POST['nomeMemedit'];
        $sobrenome  = $_POST['sobrenomeMemedit'];   
        $dtnasc     = $_POST['dtnascMemedit'];   
        $cpf        = $_POST['cpfMemedit'];   
        $cep        = $_POST['cepMemedit'];
        $logradouro = $_POST['logradouroMemedit'];
        $complemento= $_POST['complementoMemedit'];   
        $numero     = $_POST['numeroMemedit'];   
        $telefone   = $_POST['telefoneMemedit'];   
        $celular    = $_POST['celularMemedit'];
        $ativo      = $_POST['ativoMemedit'];
        
        $membroob->setNome($nome);
        $membroob->setSobrenome($sobrenome);
        $membroob->setDtnasc($dtnasc);
        $membroob->setCpf($cpf);
        $membroob->setCep($cep);
        $membroob->setLogradouro($logradouro);
        $membroob->setComplemento($complemento);
        $membroob->setNumero($numero);
        $membroob->setTelefone($telefone);
        $membroob->setCelular($celular);
        $membroob->setAtivo($ativo);
        
        if($membroob->update($id)):
            $msgerromemedit = 'Atualização Efetuada com Sucesso!';
        endif;
    endif;

///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR CATEGORIA//////////////////////////////////////////////////    
    if(isset($_GET['acaoCat']) && $_GET['acaoCat'] == 'deletar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($categoriaob->delete($id)):
//            $msgerro2 = 'Exclusão Efetivada com Sucesso!';
            header('location: postagens-ferramentas.php');
        endif;
    endif;

    if(isset($_POST['cadastrarCat'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $nome           = $_POST['nomecategoria'];
        
        $categoriaob->setNome($nome);

        if (($_POST['nomecategoria'] == '')):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">O campo NOME não pode ser branco!</fieldset>';
        else:
            if($categoriaob->verificaexistencia($nome) != NULL):
                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este NOME já existe!</fieldset>';
            else:
                if($categoriaob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                    #header("location: logaremp.php");
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso!</fieldset>';
                else:
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizarCat'])):
        $id         = $_GET['id'];
        $nome       = $_POST['nome'];
        
        $categoriaob->setNome($nome);
        
        if($categoriaob->update($id)):
            $msgerromemedit = 'Atualização Efetuada com Sucesso!';
        endif;
    endif;

///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR TAGS//////////////////////////////////////////////////    
    if(isset($_GET['acaoTag']) && $_GET['acaoTag'] == 'deletar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($tagob->delete($id)):
//            $msgerro2 = 'Exclusão Efetivada com Sucesso!';
            header('location: postagens-ferramentas.php');
        endif;
    endif;
    if(isset($_POST['cadastrarTag'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $rel_tags_post  = $_POST['rel_tags_post'];
        $nome           = $_POST['nometag'];
        
        $tagob->setRel_tags_post($rel_tags_post);
        $tagob->setNome($nome);

        if (($_POST['nometag'] == '')):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">O campo NOME não pode ser branco!</fieldset>';
        else:
            if($tagob->verificaexistencia($nome) != NULL):
                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este NOME já existe!</fieldset>';
            else:
                if($tagob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                    #header("location: logaremp.php");
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso!</fieldset>';
                else:
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizarTag'])):
        $id             = $_GET['id'];
        $rel_tags_post  = $_POST['rel_tags_post'];
        $nome           = $_POST['nome'];
        
        $tagob->setRel_tags_post($rel_tags_post);
        $tagob->setNome($nome);
        
        if($tagob->update($id)):
            $msgerromemedit = 'Atualização Efetuada com Sucesso!';
        endif;
    endif;
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR POSTAGEM//////////////////////////////////////////////////    
    if(isset($_GET['acaoPos']) && $_GET['acaoPos'] == 'deletar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($postagensob->delete($id)):
//            $msgerro2 = 'Exclusão Efetivada com Sucesso!';
            header('location: postagens-ferramentas.php');
        endif;
    endif;
    if(isset($_POST['cadastrarPos'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $rel_post_membro    = $_SESSION['usuariomembro'];
        $rel_categoria      = $_POST['passaValor'];
        $titulo             = $_POST['titulo'];   
        $texto              = $_POST['texto'];   
        $ativo              = $_POST['ativo'];
        
        $postagensob->setRel_post_membro($rel_post_membro);
        $postagensob->setRel_categoria($rel_categoria);
        $postagensob->setTitulo($titulo);
        $postagensob->setTexto($texto);
        $postagensob->setAtivo($ativo);
        
        $_SESSION['titulopub'] = $titulo;

        if (($_POST['titulo'] == '') OR ($_POST['passaValor'] == '0') OR ($_POST['texto'] == '') OR ($_POST['texto'] == '<p>Digite aqui...</p>')):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos obrigatórios!</fieldset>';
            $sucessSend = FALSE;
        else:
            if($postagensob->verificaexistencia($titulo) != NULL):
                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este TÍTULO já existe!</fieldset>';
                $sucessSend = FALSE;
            else:
                if(isset($_FILES["imgpost"]["type"]) AND ($_FILES['imgpost']['type'] != '')):
                    $validextensions = array("jpeg", "jpg", "png");
                    $temporary = explode(".", $_FILES["imgpost"]["name"]);
                    $file_extension = end($temporary);
                    if ((($_FILES["imgpost"]["type"] == "image/png") || ($_FILES["imgpost"]["type"] == "image/jpg") || ($_FILES["imgpost"]["type"] == "image/jpeg")
                    ) && ($_FILES["imgpost"]["size"] < 1000000)//Aprox. 1000kb (1mB) arquivo para upar.
                    && in_array($file_extension, $validextensions)) :
                        $extensao = pathinfo($_FILES['imgpost']['name']);
                        $extensao = ".".$extensao['extension'];
                        $nomeedit = $_POST['titulo'].$extensao;
                        strtolower($nomeedit);
                        clearId($nomeedit);
                        if ($_FILES["imgpost"]["error"] > 0):
                            $msgerro2 = "Código Retornado: " . $_FILES["imgpost"]["error"] . "<br/><br/>";
                            $sucessSend = FALSE;
                        else:
                            $sourcePath = $_FILES['imgpost']['tmp_name']; // Storing source path of the file in a variable
                            $targetPath = "images/sample/uploadpost/".clearId($nomeedit); // Target path where file is to be stored					
                            move_uploaded_file($sourcePath,$targetPath) ; // Movendo o arquivo upado

                            $img = clearId($nomeedit);
                            $postagensob->setImg($img);

                            if($postagensob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                                #header("location: logaremp.php");
                                $msgerro2 = "<h4 class='btn btn-success btn-block'>
                                       Cadastro Efetivado com Sucesso!!</h4><br/>";
//                                    "<br/><b>Nome do Arquivo:</b> " . $_FILES["imgpost"]["name"] . "<br>".
//                                    "<b>Tipo:</b> " . $_FILES["imgpost"]["type"] . " - ".
//                                    "<b>Tamanho:</b> " . ($_FILES["imgpost"]["size"] / 1024) . " kB".
//                                    "<b>Temp file:</b> " . $_FILES["imgpost"]["tmp_name"] . "<br>";
                            else:
                                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                            endif;
                        endif;
                    else:
                        $msgerro2 = "<h4 class='btn btn-danger btn-block'>***Tipo / Tamanho de arquivo inválido***<br>
                                    Permitido apenas imagem com extensão .jpg/.png/.jpeg e tamanho máximo de 2mB!</h4>";
                        $sucessSend = FALSE;
                    endif;
                else:
                    $img = 'publicacao-padrao.png';
                    $postagensob->setImg($img);
                    if($postagensob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        $msgerro2 = "<h4 class='btn btn-success btn-block'>Cadastro Efetivado com Sucesso!!</h4><br/>";
                    else:
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizarPos'])):
        $id                 = $_GET['id'];
        $rel_categoria      = $_POST['passaValor'];
        $titulo             = $_POST['titulo'];   
        $texto              = $_POST['texto'];   
        $datapublicacao     = utf8_encode(strftime( '%Y/%d/%m', strtotime($_POST["datapublicacao"])));
        $ativo              = $_POST['ativo'];
        
        $postagensob->setRel_categoria($rel_categoria);
        $postagensob->setTitulo($titulo);
        $postagensob->setTexto($texto);
        $postagensob->setDatapublicacao($datapublicacao);
        $postagensob->setAtivo($ativo);
        
        
        if (($_POST['titulo'] == '') OR ($_POST['texto'] == '') OR ($_POST['datapublicacao'] == '')):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos obrigatórios!</fieldset>';
        else:
            if ($_POST['edittit']):
                if($postagensob->verificaexistencia($titulo) != NULL):
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este TÍTULO já existe!</fieldset>';
                else:                    
                    if(isset($_FILES["imgpost"]["type"])):
                        if ($_FILES["imgpost"]["size"]):
                            $validextensions = array("jpeg", "jpg", "png");
                            $temporary = explode(".", $_FILES["imgpost"]["name"]);
                            $file_extension = end($temporary);
                            if ((($_FILES["imgpost"]["type"] == "image/png") || ($_FILES["imgpost"]["type"] == "image/jpg") || ($_FILES["imgpost"]["type"] == "image/jpeg")
                            ) && ($_FILES["imgpost"]["size"] < 1000000) && in_array($file_extension, $validextensions)) :
                                $extensao = pathinfo($_FILES['imgpost']['name']);
                                $extensao = ".".$extensao['extension'];
                                $nomeedit = $_POST['titulo'].$extensao;
                                strtolower($nomeedit);
                                clearId($nomeedit);
                                if ($_FILES["imgpost"]["error"] > 0):
                                    $msgerro2 = "Código Retornado: " . $_FILES["imgpost"]["error"] . "<br/><br/>";
                                else:
                                    $sourcePath = $_FILES['imgpost']['tmp_name']; // Storing source path of the file in a variable
                                    $targetPath = "images/sample/uploadpost/".clearId($nomeedit); // Target path where file is to be stored					
                                    move_uploaded_file($sourcePath,$targetPath) ; // Movendo o arquivo upado
                                    $img = clearId($nomeedit);
                                    $postagensob->setImg($img);
                                    if($postagensob->update($id)):
                                        $msgerromemedit = 'Atualização Efetuada com Sucesso!';
                                    else:
                                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                                    endif;
                                endif;
                            else:
                                $msgerro2 = "<h4 class='btn btn-danger btn-block'>***Tipo / Tamanho de arquivo inválido***<br>Permitido apenas imagem com extensão .jpg/.png/.jpeg e tamanho máximo de 2mB!</h4>";
                            endif;
                        else:
                            if($postagensob->updatesimg($id)):    
                                $msgerromemedit = 'Atualização Efetuada com Sucesso!';
                            else:
                                $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                            endif;
                        endif;
                    endif;
                endif;
            else:
                if(isset($_FILES["imgpost"]["type"])):
                    if ($_FILES['imgpost']['size']):
                        $validextensions = array("jpeg", "jpg", "png");
                        $temporary = explode(".", $_FILES["imgpost"]["name"]);
                        $file_extension = end($temporary);
                        if ((($_FILES["imgpost"]["type"] == "image/png") || ($_FILES["imgpost"]["type"] == "image/jpg") || ($_FILES["imgpost"]["type"] == "image/jpeg")
                        ) && ($_FILES["imgpost"]["size"] < 1000000)//Aprox. 1000kb (1mB) arquivo para upar.
                        && in_array($file_extension, $validextensions)) :
                            $extensao = pathinfo($_FILES['imgpost']['name']);
                            $extensao = ".".$extensao['extension'];
                            $nomeedit = $_POST['titulo'].$extensao;
                            strtolower($nomeedit);
                            if ($_FILES["imgpost"]["error"] > 0):
                                $msgerro2 = "Código Retornado: " . $_FILES["imgpost"]["error"] . "<br/><br/>";
                            else:
                                $sourcePath = $_FILES['imgpost']['tmp_name']; // Storing source path of the file in a variable
                                $targetPath = "images/sample/uploadpost/".clearId($nomeedit); // Target path where file is to be stored					
                                move_uploaded_file($sourcePath,$targetPath) ; // Movendo o arquivo upado
                                $img = clearId($nomeedit);
                                $postagensob->setImg($img);
                                if($postagensob->update2($id)):
                                    $msgerromemedit = 'Atualização Efetuada com Sucesso!';
                                else:
                                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                                endif;
                            endif;
                        else:
                            $msgerro2 = "<h4 class='btn btn-danger btn-block'>***Tipo / Tamanho de arquivo inválido***<br>Permitido apenas imagem com extensão .jpg/.png/.jpeg e tamanho máximo de 2mB!</h4>";
                        endif;
                    else:
                        if($postagensob->update2simg($id)):
                            $msgerromemedit = 'Atualização Efetuada com Sucesso!';
                        else:
                            $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                        endif;
                    endif;
                endif;
            endif;
        endif;
    endif;    
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR CTA//////////////////////////////////////////////////
//    if(isset($_GET['acaoCTA']) && $_GET['acaoCTA'] == 'deletar'){ //Ação de deletar
//        $id = (int)$_GET['id'];
//        if($ctaob->delete($id)){
////            $msgerro2 = 'Exclusão Efetivada com Sucesso!';
//            header('location: index.php');
//        }
//    }
//    if(isset($_POST['cadastrarCTA'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
//        $nometitulo    = $_SESSION['titulopub'];
//        $rel_cta_cat   = $_POST['passaValor'];
//        $rel_cta_tag   = $_POST['recebeValor'];
//        
//        $cattagadd     = $_SESSION['titulopub'];
//        
//        $ctaob->setNometitulo($nometitulo);
//        $ctaob->setRel_cta_cat($rel_cta_cat);
//        $ctaob->setRel_cta_tag($rel_cta_tag);
//        
//        $postagensob->setCattagadd($cattagadd);
//
//
//        if ($_SESSION['titulopub'] == ''):
//            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Atenção<br> Título em inexistente!</fieldset>';
//        else:
//            if (($_POST['passaValor'] == '') OR ($_POST['passaValor'] == '0')):
//                $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, selecione os campos desejados [Categoria]!</fieldset>';
//            else:
//                if (($_POST['recebeValor'] == '') OR ($_POST['recebeValor'] == '0')):
//                    $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, selecione os campos desejados [Tag]!</fieldset>';
//                else:
//                    if($ctaob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
//                        #header("location: logaremp.php");
//                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso1!</fieldset>';
//                        if ($postagensob->updatecta($nometitulo)):
//                            $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso!</fieldset>';
//                        endif;
//                    else:
//                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
//                    endif;
//                endif;
//            endif;    
//        endif;
//    endif;
//    
//    if(isset($_POST['atualizarUsu'])):  //atualizar com condição de atualizar senha ou não
//        if ($_POST['senhaUsuedit'] == ''):
//            $id             = $_GET['id'];
//            $usuario        = $_POST['usuarioUsuedit'];   
//            $tipoacesso     = $_POST['tipoacessoUsuedit'];   
//            $ativo          = $_POST['ativoUsuedit'];   
//            $logar->setUsuario($usuario);
//            $logar->setTipoacesso($tipoacesso);
//            $logar->setAtivo($ativo);
//            if($logar->update($id)):
//                $msgerrousuedit = 'Atualização Efetuada com Sucesso!';
//            endif;
//        else:
//            $id             = $_GET['id'];
//            $usuario        = $_POST['usuarioUsuedit'];   
//            $senha          = $_POST['senhaUsuedit'];   
//            $tipoacesso     = $_POST['tipoacessoUsuedit'];   
//            $ativo          = $_POST['ativoUsuedit'];   
//            $logar->setUsuario($usuario);
//            $logar->setSenha($senha);
//            $logar->setTipoacesso($tipoacesso);
//            $logar->setAtivo($ativo);
//            if($logar->update($id)):
//                $msgerrousuedit = 'Atualização Efetuada com Sucesso!';
//            endif;
//        endif;
//    endif;


///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR COMENTÁRIO//////////////////////////////////////////////////
    if(isset($_GET['acaoCom']) && $_GET['acaoCom'] == 'deletar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($comentob->delete($id)):
            $msgerro2 = 'Exclusão efetuada com Sucesso!';
            header('location: postagens-ferramentas.php#list_comments');
        endif;
    endif;
    if(isset($_GET['acaoCom']) && $_GET['acaoCom'] == 'aceitar'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($comentob->upaceite($id)):
            $msgerro2 = 'Comentário aceito!';
            header('location: postagens-ferramentas.php#list_comments');
        endif;
    endif;
    if(isset($_GET['acaoCom']) && $_GET['acaoCom'] == 'indeferir'): //Ação de deletar
        $id = (int)$_GET['id'];
        if($comentob->upindeferir($id)):
            $msgerro2 = 'Comentário indeferido!';
            header('location: postagens-ferramentas.php#list_comments');
        endif;
    endif;
    
    
    if( $_SERVER['REQUEST_METHOD']=='POST' ):
        $request = md5( implode( $_POST ) );
        if( isset( $_SESSION['last_request'] ) && $_SESSION['last_request']== $request ):
            header('location:'.$_SERVER["REQUEST_URI"]);
        else:
            $_SESSION['last_request']  = $request;
            if(isset($_POST['cadastrarCom'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
                $titulo = $_GET['id'];
                $rel_com_post = $titulo;
                $texto        = $_POST['mensagem'];
                $nome         = $_POST['nome'];
                $email        = $_POST['email'];
                $website      = $_POST['website'];

                $comentob->setRel_com_post($rel_com_post);
                $comentob->setTexto($texto);
                $comentob->setNome($nome);
                $comentob->setEmail($email);
                $comentob->setWebsite($website);

                if (($_POST['mensagem'] == '') OR ($_POST['nome'] == '') OR ($_POST['email'] == '')):
                    $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencher todos os campos obrigatórios corretamente!</fieldset>';
                else:
                    if($comentob->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
        //                echo '<script>alert("Obrigado por comentar! Aguarde aprovação do ADM!")</script>';
        //                header("location: noticiaview.php?acao=editar&id=$titulo");
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:green;">Obrigado por comentar! Em instantes seu comentário será inserido!</fieldset>';
                    else:
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR EDITAL E PROCESSO SELETIVO//////////////////////////////////////////////////
    if(isset($_GET['acaoedips']) && $_GET['acaoedips'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        if($editalps->delete($id)):
            $msgerro = 'Exclusão efetuada com Sucesso!';
            header('location: editalps-ferramentas.php');
        endif;
    endif;
    
    if(isset($_POST['cadastrarEdiPs'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        
        $rel_edi_mem    = $_SESSION['usuariomembro'];
        $descricao      = $_POST['descricao'];
        $tipo           = $_POST['tipo'];   
        $estado         = $_POST['estado'];   
        $dataini        = $_POST['dataini'];
        $datafin        = $_POST['datafin'];
        $fonte          = $_POST['fonte'];
        
        $editalps->setRel_edi_mem($rel_edi_mem);
        $editalps->setDescricao($descricao);
        $editalps->setTipo($tipo);
        $editalps->setEstado($estado);
        $editalps->setDataini($dataini);
        $editalps->setDatafin($datafin);
        $editalps->setFonte($fonte);
        
        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
            $sucessSend = FALSE;
        else:
            if ($fonte == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Fonte~</fieldset>';
                $sucessSend = FALSE;
            else:
                if ($datafin == ''):
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Data Final~</fieldset>';
                    $sucessSend = FALSE;
                else:
                    if($editalps->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        $msgerro2 = '<fieldset class="btn btn-success btn-block">Cadastro efetuado com Sucesso!</fieldset>';
                    else:
                        $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                    endif;                    
                endif;   
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizaEdiPs'])):  //atualizar com condição de atualizar senha ou não
            
            $id             = $_GET['id'];
            $descricao      = $_POST['descricao'];
            $tipo           = $_POST['tipo'];   
            $estado         = $_POST['estado'];   
            $dataini        = $_POST['dataini'];
            $datafin        = $_POST['datafin'];
            $fonte          = $_POST['fonte'];

            $editalps->setDescricao($descricao);
            $editalps->setTipo($tipo);
            $editalps->setEstado($estado);
            $editalps->setDataini($dataini);
            $editalps->setDatafin($datafin);
            $editalps->setFonte($fonte);
            
        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
        else:
            if ($fonte == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Fonte~</fieldset>';
            else:
                if ($datafin == ''):
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Data Final~</fieldset>';
                else:
                    if($editalps->update($id)):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        $msgerro2 = '<fieldset class="btn btn-success btn-block">Atualização efetuada com sucesso!</fieldset>';
                    else:
                        $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                    endif;                    
                endif;   
            endif;
        endif;
    endif;

    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR TÓPICO//////////////////////////////////////////////////
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        if($topico->delete($id)):
            $msgerro = 'Exclusão efetuada com Sucesso!';
            header('location: topicos-ferramentas.php#list_topics');
        endif;
    endif;
    
    if(isset($_POST['cadastrarTop'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        
        $titulo       = $_POST['titulo'];
        $descricao    = $_POST['descricao'];   
        
        $topico->setTitulo($titulo);
        $topico->setDescricao($descricao);
        
        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
            $sucessSend = FALSE;
        else:
            if ($titulo == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Título~</fieldset>';
                $sucessSend = FALSE;
            else:
                if ($topico->selectexiste($titulo)):
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">Nome de Título existente!</fieldset>';
                    $sucessSend = FALSE;
                else:
                    if($topico->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        $msgerro2 = '<fieldset class="btn btn-success btn-block">Cadastro efetuado com Sucesso!</fieldset>';
                    else:
                        $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                        $sucessSend = FALSE;
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizaTop'])):  //atualizar com condição de atualizar senha ou não
            
            $id             = $_GET['id'];
            $titulo         = $_POST['titulo'];
            $descricao      = $_POST['descricao'];

            $topico->setTitulo($titulo);
            $topico->setDescricao($descricao);

        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
            $sucessSend = FALSE;
        else:
            if ($titulo == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Título~</fieldset>';
                $sucessSend = FALSE;
            else:
                if (!$topico->selectexiste($titulo)):
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">Nome de Título existente!</fieldset>';
                    $sucessSend = FALSE;
                else:
                    if($topico->update($id)):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        $msgerro2 = '<fieldset class="btn btn-success btn-block">Atualização efetuada com sucesso!</fieldset>';
                    else:
                        $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                        $sucessSend = FALSE;
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR SUB-TÓPICO//////////////////////////////////////////////////
    if(isset($_GET['acaoStop']) && $_GET['acaoStop'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        if($subtopico->delete($id)):
            $msgerro = 'Exclusão efetuada com Sucesso!';
            header('location: topicos-ferramentas.php#list_subtopics');
        endif;
    endif;
    
    if(isset($_POST['cadastrarSTop'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        
        $rel_usu_stopico    = $_SESSION['usuario'];
        $rel_stopico_topico = $_POST['rel_stopico_topico'];
        $titulo             = $_POST['titulo'];
        $descricao          = $_POST['descricao'];
        
        
        $subtopico->setRel_usu_stopico($rel_usu_stopico);
        $subtopico->setRel_stopico_topico($rel_stopico_topico);
        $subtopico->setTitulo($titulo);
        $subtopico->setDescricao($descricao);
        
        
        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
        else:
            if ($titulo == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Título~</fieldset>';
            else:
                if($subtopico->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                    $msgerro2 = '<fieldset class="btn btn-success btn-block">Seu tópico foi criado com Sucesso!</fieldset>'.'<br><a href="topicos.php?titulo='.$_POST['rel_stopico_topico'].'" class="btn btn-info">Retornar para Tópicos</a>';
                else:
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizaSTop'])):  //atualizar com condição de atualizar senha ou não
            
        $id                 = $_GET['id'];
        $rel_stopico_topico = $_POST['rel_stopico_topico'];
        $titulo             = $_POST['titulo'];
        $descricao          = $_POST['descricao'];
        $ativo              = $_POST['ativo'];
        
        $subtopico->setRel_stopico_topico($rel_stopico_topico);
        $subtopico->setTitulo($titulo);
        $subtopico->setDescricao($descricao);
        $subtopico->setAtivo($ativo);

        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
        else:
            if ($titulo == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Título~</fieldset>';
            else:
                if($subtopico->update($id)):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                    $msgerro2 = '<fieldset class="btn btn-success btn-block">Atualização efetuada com sucesso!</fieldset>';
                else:
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                endif;
            endif;
        endif;
    endif;

///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR SUB-TÓPICO//////////////////////////////////////////////////
//    if(isset($_GET['acaoStop']) && $_GET['acaoStop'] == 'deletar'){ //Ação de deletar
//        $id = $_GET['id'];
//        if($subtopico->delete($id)){
//            $msgerro = 'Exclusão efetuada com Sucesso!';
//            header('location: topicos-ferramentas.php#list_subtopics');
//        }
//    }
    
    if(isset($_POST['responderSTop'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        
        $rel_usu_reply  = $_SESSION['usuario'];
        $rel_stop_reply = $_GET['num'];
        $texto          = $_POST['texto'];
        
        $resposta->setRel_usu_reply($rel_usu_reply);
        $resposta->setRel_stop_reply($rel_stop_reply);
        $resposta->setTexto($texto);
        
        if (!$_SESSION['logado']):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Para inserir resposta, você precisa está logado!</fieldset>';
        else:
            if ($texto == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Texto~</fieldset>';
            else:
                if($resposta->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                    #$msgerro2 = '<script>alert("Tópico respondido com sucesso! Você será redirecionado...")</script>';
                    #header('location: '.$_SERVER["REQUEST_URI"].'s',5);
                    header('refresh: 0; url = '.$_SERVER["REQUEST_URI"]);
                    echo '<script>alert("Tópico respondido com sucesso!")</script>';
                else:
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                endif;
            endif;
        endif;
    endif;
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR SUB-TÓPICO//////////////////////////////////////////////////
//    if(isset($_GET['acaoStop']) && $_GET['acaoStop'] == 'deletar'){ //Ação de deletar
//        $id = $_GET['id'];
//        if($subtopico->delete($id)){
//            $msgerro = 'Exclusão efetuada com Sucesso!';
//            header('location: topicos-ferramentas.php#list_subtopics');
//        }
//    }
    
    if(isset($_POST['cadastrarMemUsu'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $rel_usu_membro = $_POST['emailtop'];
        $usuario        = $_POST['emailtop'];   
        $senha          = $_POST['senhatop'];   
        $tipoacesso     = '1';
        $ativousu       = '1';
        $nome       = $_POST['nometop'];
        $sobrenome  = $_POST['sobrenometop'];   
        $dtnasc     = $_POST['dtnasctop'];   
        $cpf        = '';
        $cep        = '';
        $logradouro = '';
        $complemento= '';
        $numero     = '';
        $telefone   = $_POST['numcontatotop'];
        $celular    = $_POST['numcontatotop'];
        $email      = $_POST['emailtop'];
        $ativomem   = '1';
        
        $logar->setRel_usu_membro($rel_usu_membro);
        $logar->setUsuario($usuario);
        $logar->setSenha($senha);
        $logar->setTipoacesso($tipoacesso);
        $logar->setAtivo($ativousu);
        $membroob->setNome($nome);
        $membroob->setSobrenome($sobrenome);
        $membroob->setDtnasc($dtnasc);
        $membroob->setCpf($cpf);
        $membroob->setCep($cep);
        $membroob->setLogradouro($logradouro);
        $membroob->setComplemento($complemento);
        $membroob->setNumero($numero);
        $membroob->setTelefone($telefone);
        $membroob->setCelular($celular);
        $membroob->setEmail($email);
        $membroob->setAtivo($ativomem);

        if ((($_POST['senhatop'] == '') OR ($_POST['nometop'] == '') OR ($_POST['emailtop'] == ''))):
            $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">Favor, preencha todos os campos!</fieldset>';
        else:
            if ($_POST['senhatop'] > 6):
                $msgerro2 = '<fieldset style="border: 2px solid; border-radius:5px;  color:brown;">A senha deve possuir 6 dígitos ou mais!</fieldset>';
            else:
                if ($membroob->verificarexistenciaemail($email) != NULL):
                    $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Este Email já existe!</fieldset>';
                else:
                    if($membroob->insert() && $logar->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                        #header("location: logaremp.php");
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:#006600;">Cadastro Efetivado com Sucesso!</fieldset>';
                    else:
                        $msgerro2= '<fieldset style="border: 2px solid; border-radius:5px; color:brown;">ATENÇÃO<br>Erro desconhecido. Contacte o ADM!</fieldset>';
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR EVENTO//////////////////////////////////////////////////
    if(isset($_GET['acaoEve']) && $_GET['acaoEve'] == 'deletar'){ //Ação de deletar
        $id = $_GET['id'];
        if($evento->delete($id)){
            $msgerro = 'Exclusão efetuada com Sucesso!';
            header('location: eventos-ferramentas.php');
        }
    }
    
    if(isset($_POST['cadastrarEve'])):                                                    // -------------------------------- CADASTRAR USUÁRIO    
        $titulo         = $_POST['titulo'];
        $descricao      = $_POST['descricao'];   
        $fonte          = $_POST['fonte'];   
        $icon           = $_POST['icon'];   
        $dtexpirar      = $_POST['dtexpirar'];
        $ativo          = $_POST['ativo'];   
        
        $evento->setTitulo($titulo);
        $evento->setDescricao($descricao);
        $evento->setFonte($fonte);
        $evento->setIcon($icon);
        $evento->setDtexpirar($dtexpirar);
        $evento->setAtivo($ativo);

        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
            $sucessSend = FALSE;
        else:
            if ($titulo == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Título~</fieldset>';
                $sucessSend = FALSE;
            else:
                if ($fonte == ''):
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Fonte~</fieldset>';
                    $sucessSend = FALSE;
                else:
                    if ($dtexpirar == ''):
                        $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Data~</fieldset>';
                        $sucessSend = FALSE;
                    else:
                        if($evento->insert()):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                            $msgerro2 = '<fieldset class="btn btn-success btn-block">Cadastro efetuado com Sucesso!</fieldset>';
                            $sucessSend = TRUE;
                        else:
                            $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                            $sucessSend = FALSE;
                        endif;
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    if(isset($_POST['atualizarEve'])):  //atualizar com condição de atualizar senha ou não
            
        $id                 = $_GET['id'];
        $titulo         = $_POST['titulo'];
        $descricao      = $_POST['descricao'];   
        $fonte          = $_POST['fonte'];   
        $icon           = $_POST['icon'];   
        $dtexpirar      = $_POST['dtexpirar'];
        $ativo          = $_POST['ativo'];   
        
        $evento->setTitulo($titulo);
        $evento->setDescricao($descricao);
        $evento->setFonte($fonte);
        $evento->setIcon($icon);
        $evento->setDtexpirar($dtexpirar);
        $evento->setAtivo($ativo);

        if ($descricao == ''):
            $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Descrição~</fieldset>';
        else:
            if ($titulo == ''):
                $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Título~</fieldset>';
            else:
                if ($fonte == ''):
                    $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Fonte~</fieldset>';
                else:
                    if ($dtexpirar == ''):
                        $msgerro2 = '<fieldset class="btn btn-danger btn-block">Favor, Preencher o campo ~Data~</fieldset>';
                    else:
                        if($evento->update($id)):                                      // -------------------------------- CHAMADA DO MÉTODO DE INSERÇÃO
                            $msgerro2 = '<fieldset class="btn btn-success btn-block">Atualização efetuada com sucesso!</fieldset>';
                        else:
                            $msgerro2 = '<fieldset class="btn btn-danger btn-block">ERRO! <br> Erro interno. Comunicar ao Administrador!</fieldset>';
                        endif;
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    
?>


<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $titulohead ?></title>
    <meta name="description" content="Portal web desenvolvido com o objetivo de manter a classe e sociedade (local e regiões) informatizada sobre a radiologia e suas tecnologias">
    <meta name="keywords" content="Radiologia,radiologiahoje,hoje,educação,Jonathas Farias de Carvalho,informação,tecnólogo,tecnologia,radiação,radioativo,sergipe,aracaju,medicina">
    <meta name="author" content="Jonathas Farias de Carvalho">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width">
    
    <meta property="og:url"           content="www.radiologiahoje.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Radiologia Hoje - Seu portal de Notícias e Educação" />
    <meta property="og:description"   content="Portal Web criado com o objetivo de manter a classe e sociedade (local e regiões) informatizada sobre a radiologia e seus avanços tecnológicos." />
    <meta property="og:image"         content="images/sample/slider/img1.png" />
    <meta property="og:image:type"    content="image/png" />
    <meta property="og:image:width"   content="800" />
    <meta property="og:image:height"  content="600" />
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css"> 
<!--    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
    <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>-->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style>table tbody tr:nth-child(odd){background-color:#ccff99;}</style>
    <link rel="shortcut icon" href="images/ico/favicon.ico" />
    <link rel="icon" href="images/ico/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/datepicker.css">

</head>