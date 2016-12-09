<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && isset($_SESSION['Rol'])){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Adopciones'){
        if($_POST['idm'] && $_POST['estil'] && $_POST['peso']
         && $_POST['altura'] && $_POST['idalimento']){
            $operacion = new Operacion();
            $r=$operacion->ActualizarMascotas($_POST['idm'],$_POST['estil']
            ,$_POST['peso'],$_POST['altura'],$_POST['idalimento']);
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
