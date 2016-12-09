<?php
session_start();
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    $rol =  $_SESSION['Rol'];
    if($rol != 'Administrador' && $rol != 'Mascotas'){
        header('Location: /admin/index.php');
    }
}
else{
    header('Location: /index.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Panel admin - Mascotas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
<script type="text/javascript" src="/admin/js/cota.js"></script>
<script type="text/javascript" src="/admin/js/roles.js"></script>
<script type="text/javascript" src="/admin/js/razas.js"></script>
<script type="text/javascript" src="/admin/js/alimento.js"></script>
<script type="text/javascript" src="/admin/js/info.js"></script>

</head>
<body>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
                                
							</div>
						 </div>
						 <div class="header-right">
							<div class="profile_details">
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img" id="datos">

											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-user"></i> Perfil</a> </li>
											<li> <a href="#" onclick="salir()"><i class="fa fa-sign-out"></i> Salir</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!-- Modal agregar raza -->
  <div class="modal fade" id="m-raza" role="dialog">
    <div class="modal-dialog">

        <div class="form-group" id="cma" style="display:none">
            <center><label id="ma"></label></center>
        </div>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Aviso</p>
        </div>
        <div class="modal-body" id="mb-raza">
            <form id="formularioRaza" role="form" style="display: block; width: 450px;">
                <div class="form-group" id="cmv" style="display:none">
                    <center><label id="mv"></label></center>
                </div>
                <label class="label-responsive">Raza &nbsp;</label>
                <div>
                    <label class="label-normal">Raza &nbsp;</label>
                    <input type="text" id="Nraza" name="Nraza" required/>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="agregar-raza">Añadir</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" id="cerraraviso2">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal agregar alimento -->
  <div class="modal fade" id="m-alimento" role="dialog">
    <div class="modal-dialog">

        <div class="form-group" id="cma" style="display:none">
            <center><label id="ma"></label></center>
        </div>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Aviso</p>
        </div>
        <div class="modal-body" id="mb-alimento">
            <form id="formularioAlimento" role="form" style="display: block; width: 450px;">
                <div class="form-group" id="cmv" style="display:none">
                    <center><label id="mv"></label></center>
                </div>
                <label class="label-responsive">Alimento &nbsp;</label>
                <div>
                    <label class="label-normal">Alimento &nbsp;</label>
                    <input type="text" id="Nalimento" name="Nalimento" required/>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="agregar-alimento">Añadir</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" id="cerraraviso2">Cancelar</button>
        </div>
      </div>
    </div>
    </div>
    
    <h2>Añadir nueva mascota</h2>
    <br>
        <p>Agrega una nueva mascota a este sitio.</p>
    <div class="col-md-4" id="new-user">
            <div id="cmr">
                <center><label id="mr"></label></center>
            </div>
                <div id="cmr">
                    <center><label id="mr"></label></center>
                </div>

                <!-- Formulario de mascotas -->

    <form  id="formularioMascotas" name="formularioMascotas" enctype="multipart/form-data" method="post" class="agregar-usuario">

    <label class="label-responsive"><div class="requerido">*</div>Nombre &nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Nombre &nbsp;</label>
        <input type="text" id="nombre" name="nombre" required/>
    </div>
    <label class="label-responsive"><div class="requerido">*</div>Edad (años) &nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Edad (años)&nbsp;</label>
        <input type="number" id="edad"  min="1" max="20" name="edad" required />
    </div>


    <label class="label-responsive"><div class="requerido">*</div>Estirilizado &nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Estirilizado &nbsp;</label>
        <select id="estil" name="estil">
          <option value="Si">Sí</option>
          <option value="No">No</option>
        </select>
    </div>



    <label class="label-responsive"><div class="requerido">*</div>Raza &nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Raza &nbsp;</label>
        <select  id="raza" name="raza" onchange="cambiar()" required>
            <option value="noasignado"></option>
     </select><input type="button" style="margin-left:5px;" id="btn-agregar-raza" value="+" onclick="nuevaraza()">
        <!--<input type="button" style="margin-left:5px;" id="btn-eliminar-raza" value="-" onclick="eliminaraza()">-->
    </div>
    <label class="label-responsive"><div class="requerido">*</div>Peso (libras)&nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Peso (libras) &nbsp;</label>
        <input type="number" id="peso" name="peso" required/>
    </div>
    <label class="label-responsive"><div class="requerido">*</div>Altura (centimetros)&nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Altura (centimetros)&nbsp;</label>
        <input type="number" id="altura"  name="altura" required />
    </div>
    <label class="label-responsive"><div class="requerido">*</div>Alimento &nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Alimento &nbsp;</label>
        <select  id="idalimento" name="idalimento"onchange="cambiar2()">
            <option value="noasignado"></option>
     </select><input type="button" style="margin-left:5px;" id="btn-agregar-alimento" value="+" onclick="nuevoalimento()">
        <!--<input type="button" style="margin-left:5px;" id="btn-eliminar-alimento" value="-" onclick="eliminaralimento()">-->
    </div>
    <label class="label-responsive"><div class="requerido">*</div>Género &nbsp;</label>
    <div>
        <label class="label-normal"><div class="requerido">*</div>Género&nbsp;</label>
        <select  id="genero" name="genero" onchange="cambiar1()" >
        </select>
    </div>
        <div>
            <label class="label-normal"><div class="requerido">*</div>Descripción de la foto&nbsp;</label>
            <input type="text" id="des" name="des"  required/>
        </div>

     	<br>
        <div>
            <label><div class="requerido">*</div>Seleccionar archivo:</label>
            <input type="file" name="imagen" required>
        </div>

       <!--</form>-->
       <div id="resultado"></div>
       <br>
        <!--<input type="submit" class="btn btn-1 btn-warning"  name="Enviar" value="Registrar nueva mascota">-->
        <div class="button">
            <input type="submit" class="btn btn-1 btn-warning"  name="Enviar" value="Registrar nueva mascota">
        </div>
     </form>
</div>
         <div class="clearfix"> </div>
  </div>
  <!--inner block end here-->
  <!--copy rights start here-->
  <div class="copyrights">
	 <p>© 2016 Mi Voz Por La Tuya. Todos los derechos reservados. </p>
  </div>
  </div>
  </div>
  <!--slider menu-->
      <div class="sidebar-menu">
  		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
  			      <!--<img id="logo" src="" alt="Logo"/>-->
  			  </a> </div>
  		    <div class="menu" id="roles">

  		    </div>
  	 </div>
  	<div class="clearfix"> </div>
  </div>
  <!--slide bar menu end here-->
  <script>
  var toggle = true;

  $(".sidebar-icon").click(function() {
    if (toggle)
    {
      $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
      $("#menu span").css({"position":"absolute"});
    }
    else
    {
      $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
      setTimeout(function() {
        $("#menu span").css({"position":"relative"});
      }, 400);
    }
                  toggle = !toggle;
              });
  </script>
  <!--scrolling js-->
  		<script src="js/jquery.nicescroll.js"></script>
  		<script src="js/scripts.js"></script>
  		<!--//scrolling js-->
  <script src="js/bootstrap.js"> </script>
  <!-- mother grid end here-->
  </body>
  </html>
