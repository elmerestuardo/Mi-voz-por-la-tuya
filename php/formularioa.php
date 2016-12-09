<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

if(isset($_POST['Codigo_Mascota'])){
$operacion = new Operacion();
$preguntas =$operacion->ConsultaPreguntas();

$contador =1;
$slide ='<h3 class="text-center">Formulario de Adopcion</h3>
<p class="text-center">Responde las siguientes preguntas para poder continuar con la adopcion</p>';
foreach ($preguntas as $pregunta) {
  if($pregunta[2]=="Abierta"){
    $slide=$slide.'<div class="form-group">
      <div style="color:red; display:inline">*</div><label id="pregunta'.$contador.'" for="respuesta'.$contador.'">'.$pregunta[1].'</label>
      <input type="text" class="form-control" id="respuesta'.$contador.'"
             placeholder="Escribe tu respuesta">
    </div>';
}
  else{
    $slide=$slide.'<div class="form-group">
      <div style="color:red; display:inline">*</div><label id="pregunta'.$contador.'" for="respuesta'.$contador.'">'.$pregunta[1].'</label>
      <div id="respuesta'.$contador.'">
    <label class="radio-inline">
      <input name="respuesta'.$contador.'" id="respuesta'.$contador.'1" type="radio" name="optradio">Si
    </label>
    <label class="radio-inline">
      <input name="respuesta'.$contador.'" id="respuesta'.$contador.'2" type="radio" name="optradio">No
    </label>
</div>
    </div>';
  }
  $contador++;
}
$slide=$slide.'<div class="page-scroll text-center">
  <a href="#" class="cd-close btn btn-default" onclick="Adoptar('.$_POST['Codigo_Mascota'].','.count($preguntas).')" id="continuar">Continuar</a>  <a class="cd-close btn btn-danger m-left"><i class="fa fa-times"></i>Cancelar</a>
</div>';

echo $slide;
}
}else{
header("Location: /");
}
?>
