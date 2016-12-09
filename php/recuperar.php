<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
include_once $_SERVER['DOCUMENT_ROOT']."/php/PHPMailer/PHPMailerAutoload.php";
session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario'])){
	$r=0;
}else if(isset($_POST['Correo'])){
	$operacion= new Operacion();
	if($operacion->ExisteCorreo($_POST['Correo'])==1){
		$r = $operacion->IdentificadorUsuario($_POST['Correo']);
		$mensage = '
		<html>
		<head>
		<title>Recuperar Contraseña</title>
	  <meta charset="UTF-8">
		</head>
		<body>
		<center>
		<div style="padding:10px;">
		<h1>Recuperar Contraseña</h1>
		<p></p><br>

		<p>Para continuar con la recuperacion de tu contraseña oprime el boton:</p>
		<form action="http://www.mivozporlatuya.org/php/cambiar.php" method="post">
					<input type="hidden" name="Codigo" value="'.$r.'">
					<input type="submit" name="Continuar" value="Continuar">
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

		$mail->Subject = 'Restablecer Cuenta';
		$mail->Body    = $mensage;
		$mail->AltBody = 'Su proveedor de correo no soporta el formulario para recuperar la contraseña. Envie un correo a esta misma direccion explicando el inconveniente.';

		$enviado =false;
		while(!$enviado){
			$enviado=$mail->send();
		}
		if($enviado){
			$r=1;
		}else{
			$r=0;
		}
	}else{
		$r=2;
	}
}
echo json_encode(array("resultado"=>$r));
}else{
header("Location: /");
}
?>
