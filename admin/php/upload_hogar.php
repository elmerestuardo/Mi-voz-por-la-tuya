<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$hoy = getdate();

$r=0;
  
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
       echo $_POST['FechaIn'].$_POST['FechaFin'].$_POST['uno'].$_POST['dos'];
        //// echo $_POST['Fecha'].$_POST['Cantidad'].$_POST['Descripcion'].$_POST['TipoT'];
        if($_POST['FechaIn'] && $_POST['FechaFin']){
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nuevonombre=$hoy['mday']."-".$hoy['month']."-".$hoy['year']."-".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']."-".$_SESSION['Codigo_Usuario'].".".$extension;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/uploads/".$nuevonombre)) {
               echo "El fichero es válido y se subió con éxito";
                $ruta='/admin/uploads/'.$nuevonombre;
                //echo $ruta;

                echo $_POST['FechaIn'].$_POST['FechaFin'].$_POST['uno'].$_POST['dos'].$ruta;
                $operacion = new Operacion(); 
                $r=$operacion->IngresoHogaresTemporales2($_POST['FechaIn'],$_POST['FechaFin'],$_POST['Persona'],$_POST['Mascota'],$ruta,1);
            }else {
                $r=0;
                //echo "Ha ocurrido un error intentelo de nuevo";
            }
        }else{
            $r=1;
        }
    }else{
        $r=2;
        header('Location: /admin/index.php');
    }
}else{
    $r=3;
    header('Location: index.php');
}

////////////////////////////////////////echo $r;
//La ruta seria:
   // $ruta='/admin/uploads/'.$nuevonombre;
//    echo $ruta;
//Ahora aqui pueden hacer la insercion. Ejemplo
//operacion.IngresoMascota('nombre',$_POST['edad'],$ruta);
?>