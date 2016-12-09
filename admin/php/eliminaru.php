<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r = 0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol'] && $_POST['idus']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador'){
        $operacion = new Operacion();
        $r=$operacion->EliminarUsuario($_POST['idus']);
    }else{
        $r=0;
        header('Location: /admin/index.php');
    }
}else{
    $r= 0;
    header('Location: /index.php');
}

echo $r;
?>