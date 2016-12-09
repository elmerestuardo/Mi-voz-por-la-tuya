<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#formulario").on("submit", function(e){
			e.preventDefault();
			datos = new FormData(document.getElementById("formulario"));
            $.ajax({
                url: "php/upload.php",
                type: "POST",
                dataType:"html",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    $("#resultado").html('Datos recibidos:<br>'+response);
                }
            });
		});
	});
	</script>
	<title>Prueba</title>
</head>
<body>

<form id="formulario" enctype="multipart/form-data" method="post">
	<label>Texto:</label><input type="text" name="texto">
	<br>
  <label>Seleccionar archivo:</label> <input type="file" name="imagen">
  <br>
  <input type="submit" name="Enviar" value="Enviar">
</form>
<div id="resultado"></div>
</body>
</html>

