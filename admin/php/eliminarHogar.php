<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && isset($_SESSION['Rol'])){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Hogares'){
        if($_POST['FechaIn'] && $_POST['FechaFin']){
            $operacion = new Operacion(); 
            $r=$operacion->BorrarHogaresTemporales($_POST['FechaIn'],$_POST['FechaFin']);
        }else {
            $r= 0;
        }
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