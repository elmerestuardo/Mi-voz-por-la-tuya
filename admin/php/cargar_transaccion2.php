<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=null;
if(isset($_SESSION['Codigo_Usuario'])){
    $r= null;
}else{
    $operacion = new Operacion();
    $r=$operacion->ConsultaTransaccion2();
}
echo json_encode($r);
?>