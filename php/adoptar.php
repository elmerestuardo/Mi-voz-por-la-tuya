<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
include_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
session_start();
$operacion = new Operacion();
$encabezados = $operacion->ConsultaEncabezados();
$terminos=$operacion->ConsultaTerminos();
$preguntas=$operacion->ConsultaPreguntas();
if(count($encabezados)>0 && count($terminos)>0 && count($preguntas)>0 && isset($_SESSION['Codigo_Persona']) && isset($_GET['Codigo_Mascota'])){
	$idformulario= $operacion->IngresoFormulario($encabezados[0][0],$terminos[0][0]);
	$datosmascota= $operacion->DatosMascota($_GET['Codigo_Mascota']);
	$contador=0;
	$pyr="";
	foreach ($preguntas as $pregunta) {
		if($operacion->IngresoRespuesta($idformulario,$pregunta[0],$_GET[$contador])==1){
			$pyr=$pyr.''.$pregunta[1].'<br>'.$_GET['r'.$contador].'<br><br>';
		}
		$contador++;
	}
	if($idformulario!=0 && count($datosmascota)==1){
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
	  <center><strong>FORMULARIO DE ADOPCIÓN</strong>
	  <br>
	  <div>Persona: '.$_SESSION['Codigo_Persona'].' Mascota: '.$_GET['Codigo_Mascota'].' Formulario: '.$idformulario.'</div>
	  </center>
	   <center>
	  <center><strong>INTRODUCCIÓN</strong></center>
	  <p align="justify">'.$encabezados[0][1].'</p>
	   <center><strong>DATOS DEL ADOPTANTE</strong></center>
	  <p align="justify">
	  Nombre: '.$_SESSION['Nombre_Usuario'].' '.$_SESSION['Apellido_Usuario'].'
	  <br>
	  Número telefónico: '.$_SESSION['Telefono_Usuario'].'
	  <br>
	  Dirección: '.$_SESSION['Direccion_Usuario'].'
	  <br>
	  Correo electrónico: '.$_SESSION['Correo'].'
	  </p>
	  <center><strong>DATOS DEL ADOPTADO</strong></center>
	  <p align="justify">
	  Nombre: '.$datosmascota[0][0].'
	  <br>
	  Edad: '.$datosmascota[0][1].'
	  <br>
	  Raza: '.$datosmascota[0][2].'
	  <br>
	  Sexo: '.$datosmascota[0][3].'
	  </p>
	  <center><strong>CUESTIONARIO</strong></center>
	  <p align="justify">'.$pyr.'</p>
	  <center><strong>TOMAR EN CUENTA</strong></center>
	  <p align="justify">'.$terminos[0][1].'</p>
	  </body>
	  </html>');
	  $dompdf->render();
	  $dompdf->stream('Formulario de adopcion');
	}
}

 ?>
