<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
include_once $_SERVER['DOCUMENT_ROOT']."/php/PHPMailer/PHPMailerAutoload.php";

session_start();
$r=0;

if($_SESSION['Codigo_Usuario']){
	$r= 0;
}else if($_POST['Usuario'] && $_POST['Correo'] && $_POST['Clave']){
	$operacion = new Operacion();
	if($operacion->ExisteUsuario($_POST['Usuario'])==0){
		if($operacion->ExisteCorreo($_POST['Correo'])==0){
			$r=$operacion->IngresoUsuarios($_POST['Usuario'],$_POST['Clave'],$_POST['Correo'],"Adoptante",0);
			if($r!=0)
			{
				$mensage = '
				<html>
				<head>
				<title>Confirmar Registro</title>
				</head>
				<body>
				<center>
				<div style="padding:10px;box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
				<h1>Confirmar Registro</h1>
				<p>Te damos la bienvenida a la familia Mi Voz Por La Tuya. </p><br>

				<p>Para habilitar tu nueva cuenta oprime el boton:</p>
				<form action="http://www.mivozporlatuya.org/php/habilitar.php" method="post">
					<input type="hidden" name="Codigo" value="'.$r.'">
					<input type="submit" name="Habilitar" value="Habilitar">
				</form>
				</div>
				</center>
				</body>
				</html>
				';
				$mail = new PHPMailer;

				$mail->isSMTP();
				$mail->Host = 'box688.bluehost.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'info@mivozporlatuya.org';
				$mail->Password = 'MXDhS!|gV8&';
				$mail->SMTPSecure = 'ssl';
				$mail->Port = 465;

				$mail->setFrom('info@mivozporlatuya.org', 'Mi Voz Por La Tuya');
				$mail->addReplyTo('info@mivozporlatuya.org', 'Mi Voz Por La Tuya');
				$mail->addAddress($_POST['Correo']);
				$mail->isHTML(true);

				$mail->Subject = 'Confirmar Registro';
				$mail->Body    = $mensage;
				$mail->AltBody = 'Su proveedor de correo no soporta el formulario para habilitar la cuenta. Envie un correo a esta misma direccion explicando el inconveniente.';

				$enviado =false;
				while(!$enviado){
					$enviado=$mail->send();
				}
				if($enviado){
					$r=1;
				}else{
					$r=0;
				}
			}
		}
		else{
			$r= 3;
		}
	}
	else{
		$r= 2;
	}
}
else{
	$r= 0;
}
echo json_encode(array("resultado"=>$r));
}else{
header("Location: /");
}
?>
