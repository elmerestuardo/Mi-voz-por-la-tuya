<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Habilitar Usuario</title>
<style type="text/css">
	img{
		display: block;
	}
	h1{
		color: #d35400;
		display: block;
	}
</style>
</head>
<body>
<center>
<img class="img-responsive" src="/img/logo-negro.jpg">
</center>
	<!-- Modal -->
<div class="modal fade" id="aviso" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<p>Aviso</p>
	</div>
	<div class="modal-body">
		<p id="mens"><?php
		include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

		if(isset($_POST['contraseña']) && isset($_POST['vcontraseña']) && !empty($_POST['identificador'])){
			if(!empty($_POST['contraseña']) && !empty($_POST['vcontraseña'])){
				$operacion = new Operacion();
				if($_POST['contraseña'] == $_POST['vcontraseña']){
					if($operacion->SustituirClave($_POST['identificador'],$_POST['contraseña'])==1){
						echo "La contraseña ha sido cambiada, ahora puedes iniciar sesion con tu nombre de usuario o direccion de correo, y tu nueva contraseña";
					}else{
						echo "La contraseña no ha sido cambiada debido a un error interno";
					}
				}else{
					echo "La contraseña de verificacion no coincide, vuelve a intentarlo";
				}
			}else{
				echo "No debes dejar en blanco los campos para la contraseña, vuelve a intentarlo";
			}
		}
		else{
			echo "La contraseña no ha sido cambiada debido a un error interno";
		}
		?></p>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</div>

</div>
</div>
<script type="text/javascript">
$('#aviso').modal();
$('#aviso').on('hide.bs.modal', function () {
	setTimeout(function(){window.location.assign("http://www.mivozporlatuya.org");}, 1000);
});
</script>
</body>

</html>
