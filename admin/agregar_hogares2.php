<?php
session_start();
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] != 'Administrador' && $_SESSION['Rol'] != 'Hogares'){
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
<title>Panel admin - Hogares temporales</title>
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
<script type="text/javascript" src="/admin/js/Hogar.js"></script>
<script type="text/javascript" src="/admin/js/roles.js"></script>

</head>
                            
    
<body>	
     <div class="modal fade" id="ventana-imagen" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Imagen</p>
        </div>
        <div class="modal-body">
                   
            
         <center><img id="imagen-tran" alt="Sin imagen" src=""></center> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="cerraraviso2">Cerrar</button>
        </div>
      </div>

    </div>
  </div>
       				<!-- Modal -->
  <div class="modal fade" id="ventana-hogar" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Actualizar</p>
        </div>
        <div class="modal-body" id="us">  
         
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default"id="ActualizarHogar" value="Actualizar Hogar">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="cerraraviso2">Cerrar</button>
        </div>
      </div>

    </div>
  </div>
    	<!-- Modal -->
  <div class="modal fade" id="ventana-hogareliminar" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Borrar</p>
        </div>
          
         
          
        <div class="modal-body">
            <p id="mensaj">¿Desea eliminar el hogar temporal?</p> 
            <input class="form-control" type="hidden" value="" id="hogar" name="hogar">
            <input class="form-control" type="hidden" value="" id="masco" name="masco">
            <input class="form-control" type="hidden" value="" id="ÑAÑA" name="ÑAÑA">
         
        </div>
        <div class="modal-footer">
            
            <input type="button" class="btn btn-default"id="EliminarHogar" value="Eliminar Hogar">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="cerraraviso2">Cerrar</button>
        </div>
      </div>

    </div>
  </div>
    
    <div class="modal fade" id="aviso" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p>Aviso</p>
        </div>
        <div class="modal-body">
          <p id="mens"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
        </div>
      </div>

    </div>
  </div>
    
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
                                <a href="index.php">
                                    <h2 id="logo1"><p><img id="logo" src="/img/logo.jpg" alt="Logo"/>Mi Voz Por La Tuya</p></h2>
                                    <h3 id="logo2"><p><img id="logo" src="/img/logo.jpg" alt="Logo"/>Mi Voz Por La Tuya</p></h3>
                                    <h4 id="logo3"><p><img id="logo" src="/img/logo.jpg" alt="Logo"/>Mi Voz Por La Tuya</p></h4>
                                    <h5 id="logo4"><p><img id="logo" src="/img/logo.jpg" alt="Logo"/>Mi Voz Por La Tuya</p></h5>
                                    <img id="logo-r" src="/img/logo.jpg" alt="Logo"/ >
                                </a>
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
           
<div class="inner-block" >
   
  <h2>Listado de hogares temporales</h2>
<br>
    <p>Lista de detallada de los hogares temporales.</p>
    <button type="button"class="btn btn-1 btn-warning" id="imprimirhogar" onclick="Adoptar()">Imprimir</button>
<br> 
    <div class="chit-chat-layer1">
        <div class="col-md-12 chit-chat-layer1-left">
            <div class="work-progres">
                <div class="chit-chat-heading">
                    hogares temporales
                </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="cargar-hogares">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Persona</th>
                                      <th>Mascota</th>                                   
                                                                        
                                      <th>Dirección</th>
                                      <th>Teléfono</th>
                                        <th>Fecha inicio</th>
                                      <th>Fecha fin</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>
         
    <div class="clearfix"> </div>
    </div>    
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
