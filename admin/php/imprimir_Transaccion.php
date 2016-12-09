<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
include_once $_SERVER['DOCUMENT_ROOT'].'/php/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
session_start();
$operacion = new Operacion();

if(isset($_SESSION['Codigo_Persona']) && isset($_GET['Fecha1'])&& isset($_GET['Fecha2'])){
	$balance= $operacion->ConsultaTransaccionesBalance($_GET['Fecha1'],$_GET['Fecha2']);
	$transa= $operacion->ConsultaTransaccionesListas($_GET['Fecha1'],$_GET['Fecha2']);
	$contador=0;
	$matriz="";
    $matriz1="";
    
    $matriz1=$matriz1."<tr><td>".$balance[0][1]."</td><td>".$balance[1][1]."</td><td>".($balance[0][1]-$balance[1][1])."</td></tr>";
    
foreach($transa as $fila)
{
    $matriz=$matriz."<tr><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td></tr>";
}
	
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
    <td width="220"><strong>MI VOZ POR LA TUYA</strong><br><strong>mivozporlatuya@info.com</strong><br><strong>5481-2962</strong></td>
    <td width="120" align="right"><strong>QUETZALTENANGO, GUATEMALA</strong><br><strong>'.$fecha['mday'].'/'.$fecha['mon'].'/'.$fecha['year'].'</strong><br><strong>'.$fecha['hours'].':'.$fecha['minutes'].':'.$fecha['seconds'].'</strong></td>
  </tr>

</tbody></table>
	  <center><strong>Transacciones </strong>
	
      <center><p>
	  
	  De: '.$_GET['Fecha1'].'
	  Hasta: '.$_GET['Fecha2'].'
	  
	  </p></center>
      <table width="580" class="table table-hover" id="cargar-balance">
      
                                  <thead>                                  
                                     <tr>
                                      <th>Ingresos</th>
                                      <th>Gastos</th>                                     
                                      <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                 '.$matriz1.'
                          </tbody>
                      </table>
	  <table width="580" class="table table-hover" id="cargar-tranacciones">
      
                                  <thead>                                  
                                     <tr>
                                    
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                    <th>Descripcion</th>
                                    <th>Usuario</th>       
                                    <th>Transaccion</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                 '.$matriz.'
                          </tbody>
                      </table>
      
	  </body>
	  </html>');
	  $dompdf->render();
	  $dompdf->stream('Transacciones.pdf');
	
}

 ?>
