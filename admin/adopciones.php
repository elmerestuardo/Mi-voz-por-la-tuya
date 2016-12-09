<?php
session_start();
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] != 'Administrador' && $_SESSION['Rol'] != 'Adopciones'){
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
<title>Panel admin - Adopciones</title>
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
<script src="js/jquery-2.1.1.min.js"></script>

<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<script type="text/javascript" src="/admin/js/roles.js"></script>
<script type="text/javascript" src="/admin/js/adopciones.js"></script>
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
  <h2>Añadir nueva adopción</h2>
    <br>
  <p> Agregar una nueva adopción a este sitio.</p>
    <br>
       <div class="col-md-4" id="new-user">
          <div id="cmr">
              <center><label id="mr"></label></center>
          </div>
              <form  id="formularioAdopciones" name="formularioAdopciones" enctype="multipart/form-data" method="post" class="agregar-usuario">


                <label class="label-responsive"><div class="requerido">*</div>Persona &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Persona &nbsp;</label>
                   <input type="number" id="idPer" name="idPer"required />
                </div>

                <label class="label-responsive"><div class="requerido">*</div>Mascota &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Mascota &nbsp;</label>
                    <input type="number" id="idMascota" name="idMascota" required/>
                </div>


                  <label class="label-responsive"><div class="requerido">*</div>Formulario &nbsp;</label>
                  <div>
                      <label class="label-normal"><div class="requerido">*</div>Formulario &nbsp;</label>
                      <input type="number" id="idFormulario" name="idFormulario" required/>
                  </div>


                  <label class="label-responsive"><div class="requerido">*</div>Lugar &nbsp;</label>
                  <div>
                      <label class="label-normal"><div class="requerido">*</div>Lugar &nbsp;</label>
                      <input type="text" id="lugar" name="lugar" required/>
                  </div>
                  <label class="label-responsive"><div class="requerido">*</div>Fecha de adopción &nbsp;</label>
                  <div>
                      <label class="label-normal"><div class="requerido">*</div>Fecha de adopción&nbsp;</label>
                      <input type="date" id="fecha" name="fecha" required/>
                  </div>

                  <label class="label-responsive"><div class="requerido">*</div>Fecha nacimiento &nbsp;</label>
                  <div>
                      <label class="label-normal"><div class="requerido">*</div>Fecha nacimiento &nbsp;</label>
                      <input type="date" id="fechanac" name="fechanac"required />
                  </div>
                  <label class="label-responsive"><div class="requerido">*</div>DPI &nbsp;</label>
                  <div>
                      <label class="label-normal"><div class="requerido">*</div>DPI &nbsp;</label>
                      <input type="number" id="dpi" name="dpi"required/>
                  </div>




                  <div class="button">
                        <input type="submit" class="btn btn-1 btn-warning"  name="Enviar" value="Registrar nueva adopcion">
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
