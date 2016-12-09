<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

$operacion = new Operacion();
session_start();
$r=0;

if($_SESSION['Codigo_Usuario']){
	$r= 0;
}else if($_POST['Usuario'] && $_POST['Clave']){
	$codigo=$operacion->VerificarUsuario($_POST['Usuario'],$_POST['Clave']);
	if(!is_null($codigo)){
		$datos = $operacion->DatosUsuario($codigo);
		if(count($datos)==1){
			$_SESSION['Codigo_Usuario']=$codigo;
			$_SESSION['Nombre_Usuario']=$datos[0][0];
			$_SESSION['Apellido_Usuario']=$datos[0][1];
			$_SESSION['Telefono_Usuario']=$datos[0][2];
			$_SESSION['Direccion_Usuario']=$datos[0][3];
			$_SESSION['Usuario']=$datos[0][4];
			$_SESSION['Correo']=$datos[0][5];
			$_SESSION['Rol']=$datos[0][6];
			$_SESSION['Codigo_Persona']=$datos[0][7];
			$r=1;
		}else{
			if($operacion->ExisteUsuario($_POST['Usuario'])==1||$operacion->ExisteCorreo($_POST['Usuario'])==1){
			if($operacion->EstadoUsuario($_POST['Usuario'])==1){
				session_unset();
				$r=0;
			}else{
				session_unset();
				$r=2;
			}
		}else{
			session_unset();
			$r=0;
		}
		}
	}else{
		if($operacion->ExisteUsuario($_POST['Usuario'])==1||$operacion->ExisteCorreo($_POST['Usuario'])==1){
			if($operacion->EstadoUsuario($_POST['Usuario'])==1){
				session_unset();
				$r=0;
			}else{
				session_unset();
				$r=2;
			}
		}else{
			session_unset();
			$r=0;
		}

	}
}

echo json_encode(array("resultado"=>$r));
}else{
header("Location: /");
}
?>
