<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
$usuario="";
$personas="";
$check="";
$activo="";
if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if($_POST['Codigou']){
                if($_POST['Peticion']==2){
                    $operacion = new Operacion();
                    $datos=$operacion->ConsultaHogar2($_POST['Codigou']);
                    $personas=$operacion->ConsultaPersona();
                    foreach ($datos as $fila) {
                        $id=$fila[0];
                        $nombre = $fila[1];
                        $fecai = $fila[4];
                        $fecaf = $fila[5];
                    }
                    foreach ($personas as $p) {
                        if($p[1] == $nombre){
                            $person.='<option value="'.$p[0].'" selected>'.$p[1].'</option>';
                        }else{
                            $person.='<option value="'.$p[0].'">'.$p[1].'</option>';
                        }
                    }
                    echo '<form id="form-actualizaru" role="form" style="display: block; width: 450px;">
                                    <div class="form-group" id="cmv" style="display:none">
                                        <center><label id="mv"></label></center>
                                    </div>
                                    
                                    <p><span class="glyphicon glyphicon-info-sign"></span> Fecha de Inicio: <input type="date" id="FechaIn" value="'.$fecai.'" /></p>
                                    <p><span class="glyphicon glyphicon-info-sign"></span> Fecha Final: <input type="date" id="FechaFin" value="'.$fecaf.'" /></p>
                                    
                                    <p><span class="glyphicon glyphicon-info-sign"></span>Persona:
                                        <select id="per">
                                        '.$person.'
                                        </select>
                                    </p>
                                    <p> <input type="hidden" id="idhogar" value="'.$id.'" /></p>
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