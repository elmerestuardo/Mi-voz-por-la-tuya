<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=null;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    if($rol == 'Administrador' || $rol == 'Gastos'){
        if($_POST['Fecha1'] && $_POST['Fecha2']){
            $operacion = new Operacion(); 
             $r=$operacion->ConsultaTransaccionesBalance($_POST['Fecha1'],$_POST['Fecha2']);
            ///echo "si entro";
        
        }
        else {
            ///echo "uno";
            $r= 1;
        }
    }else{
       $r=2;
       header('Location: /admin/index.php');
    }
}else{
    $r= null;
    header('Location: /index.php');
}
echo json_encode($r);
?>


