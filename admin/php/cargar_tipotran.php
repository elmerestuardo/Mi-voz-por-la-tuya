<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=null;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
 if($rol == 'Administrador' || $rol == 'Gastos'){
        $operacion = new Operacion();
        $r=$operacion->ConsultaTipoTransa();
    }else{
        $r=0;
        header('Location: /admin/index.php');
    }
}else{
    $r= null;
    header('Location: /index.php');
}
echo json_encode($r);
?>