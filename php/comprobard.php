<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
session_start();
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']=='Adoptante'){
	if(!empty($_SESSION['Nombre_Usuario']) && !empty($_SESSION['Apellido_Usuario']) && !empty($_SESSION['Telefono_Usuario']) && !empty($_SESSION['Direccion_Usuario'])){
		$r=2;
	}else{
		$r=1;
	}
}else{
	$r=0;
}
echo json_encode(array("resultado"=>$r));
}else{
header("Location: /");
}
?>