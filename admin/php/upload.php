<?php 
session_start();
$hoy = getdate();
   
$extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
$nuevonombre=$hoy['mday']."-".$hoy['month']."-".$hoy['year']."-".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']."-".$_SESSION['Codigo_Usuario'].".".$extension;
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/admin/uploads/".$nuevonombre)) {
    //echo "El fichero es válido y se subió con éxito";
    $ruta='/admin/uploads/'.$nuevonombre;
    echo $ruta;
} else {
    echo "Ha ocurrido un error intentelo de nuevo";
}

//La ruta seria:
   // $ruta='/admin/uploads/'.$nuevonombre;
//    echo $ruta;
//Ahora aqui pueden hacer la insercion. Ejemplo
//operacion.IngresoMascota('nombre',$_POST['edad'],$ruta);
?>