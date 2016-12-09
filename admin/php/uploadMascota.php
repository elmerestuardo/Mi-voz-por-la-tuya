<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$hoy = getdate();

$r=0;
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if($_POST['nombre'] && $_POST['edad'] && $_POST['estil'] && $_POST['raza'] && $_POST['peso']
        && $_POST['altura']&& $_POST['idalimento']&& $_POST['genero']&& $_POST['des']){
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nuevonombre=$hoy['mday']."-".$hoy['month']."-".$hoy['year']."-".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']."-".$_SESSION['Codigo_Usuario'].".".$extension;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/uploads/".$nuevonombre)) {
                $ruta='/admin/uploads/'.$nuevonombre;


                $operacion = new Operacion();
                $r = $operacion -> IngresoMascotas($_POST['nombre']
                    ,$_POST['edad'], $_POST['estil'],
                  $_POST['raza'] ,$_POST['peso'],$_POST['altura']
                ,$_POST['idalimento'],$_POST['genero'],$_POST['des'], $ruta);
            }
            else {
                $r='hola';
            }
        }else{
            $r='hola2';
        }
    }else{
        $r='hola3';
        header('Location: /admin/index.php');
    }
}else{
    $r='hola4';
    header('Location: /index.php');
}

echo $r;
?>
