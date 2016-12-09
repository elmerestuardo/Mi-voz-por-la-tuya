<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$hoy = getdate();

$r=0;
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if($_POST['titulo'] && $_POST['descripcion'] && $_POST['lugar'] && $_POST['fecha'] && $_POST['hora']){
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nuevonombre=$hoy['mday']."-".$hoy['month']."-".$hoy['year']."-".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']."-".$_SESSION['Codigo_Usuario'].".".$extension;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/uploads/".$nuevonombre)) {
                $ruta='/admin/uploads/'.$nuevonombre;
                
                $operacion = new Operacion();
                $r=$operacion->IngresoEvento($_POST['titulo'], $_POST['descripcion'], $_POST['lugar'], $_POST['fecha'], $_POST['hora'], $ruta, $_SESSION['Codigo_Usuario']);
            }else {
                $r=2;
            }
        }else{
            $r=3;
        }
    }else{
        $r=4;
        header('Location: /admin/index.php');
    }
}else{
    $r=5;
    header('Location: /index.php');
}

echo $r;
?>