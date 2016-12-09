<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$nombre = "";
$apellido = "";
$usuario = "";
$rol = "";
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $operacion = new Operacion();
    $datos=$operacion->DatosUsuarioA($_SESSION['Codigo_Usuario']);
    foreach ($datos as $fila) {
        $nombre = $fila[0];
        $apellido = $fila[1];
        $usuario = $fila[4];
        $rol = $fila[7];
        $estado = $fila[6];
    }
    echo '<div class="fotop">
                    <a href="#"><img id="fotop" src="/img/logo.jpg" alt="foto"/></a>
                </div>
                <br/>
                <br/>
				 <h2>'.$usuario.'</h2>
				<p>'.$rol.'</p>
                <p>'.$nombre.'</p>
                <p>'.$apellido.'</p>';
}else{
    header('Location: /index.php');
}
?>