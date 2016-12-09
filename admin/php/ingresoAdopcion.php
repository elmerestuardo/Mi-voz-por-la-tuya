<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$r=0;
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $rol = $_SESSION['Rol'];
    $id = $_SESSION['Codigo_Usuario'];

    if($rol == 'Administrador' || $rol == 'Adopciones'){
        if($_POST['lugar'] && $_POST['fecha']
        && $_POST['idPer'] && $_POST['fechanac']
        && $_POST['dpi'] && $_POST['idMascota'] && $_POST['idFormulario']
         ){

            $operacion = new Operacion();
          $r = $operacion -> IngresoAdopciones(
            $_POST['lugar']	, $_POST['fecha'], $_POST['idPer'],
            $_POST['fechanac'], $_POST['dpi'], $_POST['idMascota'],
            $_POST['idFormulario'],$id
        );
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
