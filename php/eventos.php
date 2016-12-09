<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
$operacion= new Operacion();
$eventos =$operacion->ConsultaEventos();
echo json_encode($eventos);
?>
