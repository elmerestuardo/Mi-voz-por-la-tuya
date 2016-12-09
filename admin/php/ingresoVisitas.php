<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Visitas'){
        if($_POST['fecha'] || $_POST['observaciones']
        && $_POST['idalimento']){
            $operacion = new Operacion();
          $r = $operacion -> IngresoVisitas($_POST['fecha']
            , $_POST['observaciones'], $_POST['idalimento']);
        }
        else{$r=0;}
    }else{
        $r=0;
        header('Location: /admin/index.php');
    }
}else{
    $r=0;
    header('Location: /index.php');
}

echo $r;

?>
