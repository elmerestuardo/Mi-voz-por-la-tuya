<?php
session_start();
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] != 'Administrador'){
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
<title>Panel admin - Eventos</title>
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
<script type="text/javascript" src="/admin/js/admin.js"></script>
<script type="text/javascript" src="/admin/js/roles.js"></script>
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
<!--<div class="chit-chat-layer1">-->
    <h2>Añadir nuevo evento</h2>
        <br>
            <p>Crea un nuevo evento y añádelo a este sitio.</p>
        <br>
    <div class="col-md-4" id="new-evento">
        <div id="cmr">
            <center><label id="mr"></label></center>
        </div>
            <form class="agregar-evento" id="form-eventos" enctype="multipart/form-data" method="post">
                <label class="label-responsive"><div class="requerido">*</div>Título &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Título &nbsp;</label>
                    <br/>
                    <input type="text" name="titulo" id="titulo" required/>
                </div>
                <label class="label-responsive"><div class="requerido">*</div>Descripción &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Descripción &nbsp;</label>
                    <!--<input type="text" id="cuerpo" />-->
                    <br/>
                    <textarea rows="6" cols="50" name="descripcion" id="descripcion" required></textarea>
                </div>
                <label class="label-responsive"><div class="requerido">*</div>Lugar &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Lugar &nbsp;</label>
                    <br/>
                    <input type="text" id="lugar" name="lugar" required/>
                </div>
                <label class="label-responsive"><div class="requerido">*</div>Fecha &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Fecha &nbsp;</label>
                    <br/>
                    <input type="date" id="fecha" name="fecha" required/>
                </div>
                <label class="label-responsive"><div class="requerido">*</div>Hora &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Hora &nbsp;</label>
                    <br/>
                    <input type="time" id="hora" name="hora" required/>
                </div>
                <label class="label-responsive"><div class="requerido">*</div>Foto &nbsp;</label>
                <div>
                    <label class="label-normal"><div class="requerido">*</div>Foto &nbsp;</label>
                    <input type="file" name="imagen" id="imagen" required/>
                </div>
                <div class="button-evento">
                    <input type="submit" class="btn btn-1 btn-warning" id="btn-nuevo-evento" name="btn-nuevo-evento" value="Añadir nuevo evento">
                </div>
            </form>
      </div>
     <div class="clearfix"> </div>
<!--</div>-->
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Mi Voz Por La Tuya. Todos los derechos reservados. </p>
</div>	
<!--COPY rights end here-->
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