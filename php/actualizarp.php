<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_POST['Nombre'] && $_POST['Apellido'] && $_POST['Telefono'] && $_POST['Direccion']){
	$operacion = new Operacion();
	$r= $operacion->ModPersonas($_SESSION['Codigo_Usuario'],$_POST['Nombre'], $_POST['Apellido'], $_POST['Telefono'], $_POST['Direccion']);
	if ($r==1) {
		$datos = $operacion->DatosUsuario($_SESSION['Codigo_Usuario']);
		if(count($datos)==1){
			$_SESSION['Nombre_Usuario']=$datos[0][0];
			$_SESSION['Apellido_Usuario']=$datos[0][1];
			$_SESSION['Telefono_Usuario']=$datos[0][2];
			$_SESSION['Direccion_Usuario']=$datos[0][3];
			$_SESSION['Usuario']=$datos[0][4];
			$_SESSION['Correo']=$datos[0][5];
			$_SESSION['Rol']=$datos[0][6];
		}
	}
}else{
	$r= 0;
}
echo $r;
}else{
header("Location: /");
}
?>
