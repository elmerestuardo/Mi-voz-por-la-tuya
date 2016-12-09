<?php
session_start();
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if(!empty($_SESSION['Usuario'])){
            $usuario = $_SESSION['Usuario'];
        }else{
            $usuario = "Sin Asignar";
        }
        if(!empty($_SESSION['Rol'])){
            $rol = $_SESSION['Rol'];
        }else{
            $rol = "Sin Asignar";
        }
        if($_POST['Peticion']==2){
            if($usuario=="Sin Asignar"){
                $usuario = "";
            }
            if($rol=="Sin Asignar"){
                $rol = "";
            }
            echo '<div class="panel panel-login">
                <a class="cerrar" href="#" onclick="ocultar()">x</a>
                <div class="panel-heading">
                    <div class="row">    
                    </div>
                </div>
                <div class="panel-body" style="padding-left: 15px; padding-right: 15px">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="datos-form" role="form" style="display: block;">
                                <div class="form-group" id="cma" style="display:none">
                                    <center><label id="ma"></label></center>
                                </div>
                                <div class="form-group text-center">
                                    <label>holajajaj</label>
                                    <br>
                                    <label>Nombre</label>
                                </div>
                                

                                <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="button" name="terminar" id="terminar" tabindex="4" class="form-control btn btn-login" value="Actualizar">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="button" name="cancelar" id="cancelar" tabindex="4" class="form-control btn btn-login" value="Cancelar">
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>';   
        }else{
            echo '<div class="panel panel-login" onload="ocultar()">
            </div>';        
        }
    }else{
        echo '<div class="panel panel-login" onload="ocultar()">
            </div>';
        header('Location: /admin/index.php');
    }
}else{
    header('Location: /index.php');
}
?>