<?php
	if(isset($_FILES["file"]["type"])){
		$validextensions = array("jpeg", "jpg", "png");
		
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
		) && ($_FILES["file"]["size"] < 1000000)//Aprox. 1000kb (1mB) arquivo para upar.
		&& in_array($file_extension, $validextensions)) {
			
			//Renomear e encriptar imagem anexada
			//$extensao = pathinfo($_FILES['file']['name']);
			//$extensao = ".".$extensao['extension'];
			//$_FILES['file']['name'] = time().uniqid(md5()).$extensao;
			//Renomear para nome que desejo 'imgusuario'
			//$extensao = pathinfo($_FILES['file']['name']);
			//$extensao = ".".$extensao['extension'];
			//$_FILES['file']['name'] = 'imgusuario'.$extensao;
			
			
			if ($_FILES["file"]["error"] > 0){
				echo "Código Retornado: " . $_FILES["file"]["error"] . "<br/><br/>";
			}else{
				if (file_exists("upload/" . $_FILES["file"]["name"])) {
					echo $_FILES["file"]["name"] . " <span id='invalid'><b>Imagem Existente!</b></span> ";
				}else{
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored					
					move_uploaded_file($sourcePath,$targetPath) ; // Movendo o arquivo upado
					echo "<span id='success'>Imagem carregada com sucesso!</span><br/>";
					echo "<br/><b>Nome do Arquivo:</b> " . $_FILES["file"]["name"] . "<br>";
					echo "<b>Tipo:</b> " . $_FILES["file"]["type"] . "<br>";
					echo "<b>Tamanho:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
				}
			}
		}else{
			echo "<span id='invalid'>***Tamanho de arquivo inválido***<span>";
		}
		$_SESSION['imagemupada']=$_FILES['file']['name'];
	}
?>
