<?php
session_start();
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    $nombre='Mi Voz Por La Tuya';
    $ruta='/img/logo.jpg';
echo '<a href="index.php">
        <h2 id="logo1"><p><img id="logo" src="'.$ruta.'" alt="Logo"/>'.$nombre.'</p></h2>
        <h3 id="logo2"><p><img id="logo" src="'.$ruta.'" alt="Logo"/>'.$nombre.'</p></h3>
        <h4 id="logo3"><p><img id="logo" src="'.$ruta.'" alt="Logo"/>'.$nombre.'</p></h4>
        <h5 id="logo4"><p><img id="logo" src="'.$ruta.'" alt="Logo"/>'.$nombre.'</p></h5>
        <img id="logo-r" src="'.$ruta.'" alt="Logo"/ >
    </a>';
}else{
    header('Location: /index.php');
}
?>