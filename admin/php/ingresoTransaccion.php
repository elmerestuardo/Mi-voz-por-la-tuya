<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
//IngresoTransacciones($fecha,$cantidad,$descripcion,$idusuario,$idtipotran,$ruta,$estadofoto,$estado
session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Gastos'){
        if($_POST['Fecha'] && $_POST['Cantidad'] && $_POST['Descripcion'] && $_SESSION['Codigo_Usuario'] && $_POST['TipoT'] && $_POST['Foto']){
            $operacion = new Operacion(); 
            $r=$operacion->IngresoTransacciones($_POST['Fecha'],$_POST['Cantidad'],$_POST['Descripcion'],$_SESSION['Codigo_Usuario'],$_POST['TipoT'],$_POST['Foto'],1,1);
        }
        else {
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
//echo json_encode(array("resultado"=>$r));
echo $r;
?>