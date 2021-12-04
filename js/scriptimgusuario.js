$(document).ready(function (e) {
	$("#file").on('exit',(function(e) {
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();
		$.ajax({
			url: "ajax_php_file_usu2.php", // URL do arquivo PHP de envio Ajax
			type: "POST",             // Tipo de envio
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // Função de retorno quando clicar em enviar
			{
				$('#loading').hide();
				$("#message").html(data);
			}
		});
	}));

	// Função de visualizar a imagem e validar
	$(function() {
		$("#file").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
				$('#previewing').attr('src','noimage.png');
				$("#message").html("Selecione um arquivo de imagem válida! <br><b>PS: </b> Arquivos suportados (.png .jpg .jpeg)");
				$('#loading').hide();
				return false;
			}
			else
			{
				var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
			}
		});
	});
	function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '250px');
		$('#previewing').attr('height', '230px');
	};
});
