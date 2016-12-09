<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Mascotas'){
        if($_POST['nombre'] && $_POST['edad']
        && $_POST['estil'] && $_POST['estado'] && $_POST['raza']
        && $_POST['peso'] && $_POST['altura'] && $_POST['idalimento']
        && $_POST['genero'] && $_POST['des']){
            $operacion = new Operacion();
          $r = $operacion -> IngresoMascotas($_POST['nombre']
            , $_POST['edad'], $_POST['estil'], $_POST['estado'],
          $_POST['raza'] ,$_POST['peso'],$_POST['altura']
        ,$_POST['idalimento'],$_POST['genero'],$_POST['des']);
        }
        else{$r=0;}
    }else{
        $r = 0;
        header('Location: /admin/index.php');
    }
}else{
    $r = 0;
    header('Location: /index.php');
}

echo $r;

?>
