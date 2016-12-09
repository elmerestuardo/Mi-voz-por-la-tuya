<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$usuario="";
$rol="";
$check="";
$activo="";
$evento="";
$descripcion="";
$lugar="";
$fecha="";
$hora="";
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if($_POST['Codigou']){
                if($_POST['Peticion']==2){
                    $operacion = new Operacion();
                    $datos=$operacion->DatosUsuarioA($_POST['Codigou']);
                    $roles=$operacion->ConsultaRoles();
                    foreach ($datos as $fila) {
                        $usuario = $fila[4];
                        $rol = $fila[7];
                        $activo = $fila[6];
                    }
                    if($activo == 1){
                        $check = "checked";
                    }
                    else{
                        $check = "";
                    }
                    foreach ($roles as $r) {
                        if($r[1] == $rol){
                            $roless.='<option value="'.$r[0].'" selected>'.$r[1].'</option>';
                        }else{
                            $roless.='<option value="'.$r[0].'">'.$r[1].'</option>';
                        }
                    }
                    echo '<form id="form-actualizaru" role="form" style="display: block; width: 450px;">
                                    <div class="form-group" id="cmv" style="display:none">
                                        <center><label id="mv"></label></center>
                                    </div>
                                    <p><span class="glyphicon glyphicon-user"></span> Usuario: '.$usuario.'</p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span> Rol: '.$rol.'</p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span>Activo: <input type="checkbox" id="activo" '.$check.'/></p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span>Rol:
                                        <select id="rol">
                                        '.$roless.'
                                        </select>
                                    </p>
                                </form>';
                }else if($_POST['Peticion']==1){
                    $datose=$operacion->DatosEvento($_POST['Codigou']);
                    foreach ($datose as $fila) {
                        $evento = $fila[1];
                        $descripcion = $fila[2];
                        $lugar = $fila[3];
                        $fecha = $fila[4];
                        $hora = $fila[5];
                    }
                    echo '<form id="form-actualizaru" role="form" style="display: block; width: 450px;">
                                    <div class="form-group" id="cmv" style="display:none">
                                        <center><label id="mv"></label></center>
                                    </div>
                                    <p><span class="glyphicon glyphicon-user"></span> Evento: <input type="text" id="evento" value="'.$evento.'"/></p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span> Descripción: <textarea id="descripcion">'.$descripcion.'</textarea></p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span>Lugar: <input type="text" id="lugar" value="'.$lugar.'"/></p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span>Fecha: <input type="date" id="fecha" value="'.$fecha.'"/></p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span>Hora: <input type="time" id="hora" value="'.$hora.'"/></p>
                                </form>';
                }else{
                    echo '1';
                }
        }else{
            echo '2';
        }
    }else{
        header('Location: /admin/index.php');
    }
}else{
    header('Location: /index.php');
}
//echo $r;
?>