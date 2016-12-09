<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if(isset($_POST['CodigoUS']) && isset($_POST['estado'])){
            $operacion = new Operacion();
            $r=$operacion->Activacion_Usuario($_POST['CodigoUS'], $_POST['estado']);
        }else{
            $r=2;
        }
    }else{
        $r=3;
        header('Location: /admin/index.php');
    }
}else{
    $r=4;
    header('Location: /index.php');
}
echo $r;
?>