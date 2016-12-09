<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
include_once $_SERVER['DOCUMENT_ROOT'].'/php/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
session_start();
$operacion = new Operacion();
 $r=$operacion->ConsultaHogar();
$matriz="";

foreach($r as $fila)
{
    $matriz=$matriz."<tr><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[6]."</td><td>".$fila[7]."</td></tr>";
}

/*
$encabezados = $operacion->ConsultaEncabezados();
$terminos=$operacion->ConsultaTerminos();
$preguntas=$operacion->ConsultaPreguntas();

	$idformulario= $operacion->IngresoFormulario($encabezados[0][0],$terminos[0][0]);
	$datosmascota= $operacion->DatosMascota($_GET['Codigo_Mascota']);
	$contador=0;
	$pyr="";
	foreach ($preguntas as $pregunta) {
		if($operacion->IngresoRespuesta($idformulario,$pregunta[0],$_GET[$contador])==1){
			$pyr=$pyr.''.$pregunta[1].'<br>'.$_GET['r'.$contador].'<br><br>';
		}
		$contador++;
	}*/
	
	  $dompdf = new Dompdf();
	  $dompdf->set_option('isHtml5ParserEnabled', true);
		$fecha = getdate();
	  $dompdf->loadHtml('<html><header><style type="text/css">

table {
	padding:0px;
	margin:0px;
}
th,td {
  padding: 0px;
	margin:0px;
}

table.separate {

}

table.separate td {

}
      </style></header><body>
			<table class="separate">
<thead>
</thead>
  <tbody><tr>
    <td width="80"><img width="150" height="150" src="'.$_SERVER['DOCUMENT_ROOT']
											.'/img/logo.jpg" alt="Imagen no encontrada"></td>
    <td width="220"><strong>MI VOZ POR LA TUYA</strong><br><strong>info@mivozporlatuya.org</strong><br><strong>5481-2962</strong></td>
    <td width="120" align="right"><strong>QUETZALTENANGO, GUATEMALA</strong><br><strong>'.$fecha['mday'].'/'.$fecha['mon'].'/'.$fecha['year'].'</strong><br><strong>'.$fecha['hours'].':'.$fecha['minutes'].':'.$fecha['seconds'].'</strong></td>
  </tr>

</tbody></table>
	  <center><strong>Hogares temporales activos</strong></center>
	  <br>
	  <table width="580" class="table table-hover" id="cargar-hogares">
      
                                  <thead>                                  
                                    <tr>
                                      <th>Persona</th>
                                      <th>Mascota</th>                                   
                                                                        
                                      <th>Fecha Inicio</th>
                                      <th>Fecha Fin</th>
                                      <th>Direccion</th>
                                      <th>Numero</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 '.$matriz.'
                          </tbody>
                      </table>
                    
	  
	  </body>
	  </html>');
	  $dompdf->render();
	  $dompdf->stream('ConsultaHogarTemporal.pdf');
	


 ?>
