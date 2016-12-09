<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
session_start();
//Datos de procedimiento
$nombre ="";
$estil="";
$alimento="";
$altura="";
$peso="";
$raza = "";
//

if(isset($_SESSION['Codigo_Usuario']) && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if($_POST['Codigou']){
                if($_POST['Peticion']==2){
                    $operacion = new Operacion();
                    $datos=$operacion->ConsultaMascotaPr($_POST['Codigou']);
                    $alimentos=$operacion->ConsultaAlimento();
                    foreach ($datos as $fila) {

                      //Datos Mascotas
                      $nombre = $fila[1];
                      $raza = $fila[4];
                      $alimento = $fila[6];
                      $altura = $fila[7];
                      $peso = $fila[8];


                    }
                    if($activo == 1){
                        $check = "checked";
                    }
                    else{
                        $check = "";
                    }
                    foreach ($alimentos as $r) {
                        if($r[1] == $alimento){
                            $alimentoss.='<option value="'.$r[0].'" selected>'.$r[1].'</option>';
                        }else{
                            $alimentoss.='<option value="'.$r[0].'">'.$r[1].'</option>';
                        }
                    }

                    if($fila[2] == "Si"){
                      echo '<form id="actualizarM" role="form" style="display: block; width: 450px;">
                                      <div class="form-group" id="cmv" style="display:none">
                                          <center><label id="mv"></label></center>
                                      </div>
                                      <p><span class="glyphicon glyphicon-user"></span> Nombre Mascota: '.$nombre.'</p>
                                      <p><span class="glyphicon glyphicon-user"></span> Raza: '.$raza.'</p>


                                      <p><span class="glyphicon glyphicon-user"></span> Esterilizado</p>
                                      <select id="estil" name="estil">
                                      <option value="Si">Si</option>
                                      <option value="No">No</option>

                                      </select>



                                      <p><span class="glyphicon glyphicon-info-sign"></span>Altura:   <input type="number" id="altura" name="altura"  value="'.$altura.'"></p>
                                      <p><span class="glyphicon glyphicon-info-sign"></span>Peso:   <input type="number" id="peso" name="peso"  value="'.$peso.'"></p>
                                      <p><span class="glyphicon glyphicon-info-sign"></span>Alimentacion:
                                          <select id="idalimento" name="idalimento">
                                          '.$alimentoss.'
                                          </select>
                                      </p>


                                  </form>';
                    }else{
                      echo '<form id="actualizarM" role="form" style="display: block; width: 450px;">
                                      <div class="form-group" id="cmv" style="display:none">
                                          <center><label id="mv"></label></center>
                                      </div>
                                      <p><span class="glyphicon glyphicon-user"></span> Nombre Mascota: '.$nombre.'</p>
                                      <p><span class="glyphicon glyphicon-user"></span> Raza: '.$raza.'</p>


                                      <p><span class="glyphicon glyphicon-user"></span> Esterilizado</p>
                                      <select id="estil" name="estil">
                                      <option value="No">No</option>
                                      <option value="Si">Si</option>

                                      </select>



                                      <p><span class="glyphicon glyphicon-info-sign"></span>Altura:   <input type="number" id="altura" name="altura"  value="'.$altura.'"></p>
                                      <p><span class="glyphicon glyphicon-info-sign"></span>Peso:   <input type="number" id="peso" name="peso"  value="'.$peso.'"></p>
                                      <p><span class="glyphicon glyphicon-info-sign"></span>Alimentacion:
                                          <select id="idalimento" name="idalimento">
                                          '.$alimentoss.'
                                          </select>
                                      </p>


                                  </form>';
                    }

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
