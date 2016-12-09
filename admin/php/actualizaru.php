<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if(isset($_POST['Estado']) && isset($_POST['Rol']) && isset($_POST['idus'])){
            $operacion = new Operacion();
            $r= $operacion->ModCredUsuario($_POST['idus'], $_POST['Rol'], $_POST['Estado']);
        }
        else{
            $r = 2;
        }
    }else{
        $r=1;
        header('Location: /admin/index.php');
    }
}
else{
    $r=3;
    header('Location: /index.php');
}
echo $r;
?>