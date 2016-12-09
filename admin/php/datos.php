<?php
session_start();
if(isset($_SESSION['Codigo_Usuario'])){
    $user = $_SESSION['Usuario'];
    $rol = $_SESSION['Rol'];
    //images/p1.png
    echo '<span class="prfil-img"><img src="" alt=""> </span>
        <div class="user-name" id="datos">
            <p>'.$user.'</p>
            <span>'.$rol.'</span>
        </div>
        <i class="fa fa-angle-down lnr"></i>
        <i class="fa fa-angle-up lnr"></i>
        <div class="clearfix"></div>';
}else{
    header('Location: /index.php');
}
?>