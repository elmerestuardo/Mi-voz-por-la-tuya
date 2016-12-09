<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=null;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador'){
        $operacion = new Operacion();
        $r=$operacion->ConsultaHistorialEventos();
    }
    else{
        $r = null;
        header('Location: /admin/index.php');
    }
}else{
    header('Location: /index.php');
    $r= null;
}

echo json_encode($r);
?>