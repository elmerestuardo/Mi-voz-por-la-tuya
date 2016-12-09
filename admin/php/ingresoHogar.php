<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && isset($_SESSION['Rol'])){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Hogares'){
        if($_POST['FechaIn'] && $_POST['FechaFin'] && $_POST['Persona'] && $_POST['Mascota']){
            $operacion = new Operacion(); 
            $r=$operacion->IngresoHogaresTemporales($_POST['FechaIn'],$_POST['FechaFin'],$_POST['Persona'],$_POST['Mascota'],1);
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