<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Mascotas'){
        if($_POST['Nalimento']){
            $operacion = new Operacion();
            $r = $operacion -> IngresoAlimentos($_POST['Nalimento']);
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
