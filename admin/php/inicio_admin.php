<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

$operacion = new Operacion();
session_start();
$r=0;

if($_SESSION['Codigo_Usuario']){
	$r= 0;
}else if($_POST['Usuario'] && $_POST['Clave']){
    $_SESSION['usuario'] = $_POST['Usuario'];
	$r =$operacion->VerificarUsuario($_POST['Usuario'],$_POST['Clave']);
} 

echo json_encode(array("resultado"=>$r));
?>