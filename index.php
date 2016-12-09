<?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
$operacion = new Operacion();
session_start();
if(isset($_SESSION['Codigo_Usuario']) && isset($_SESSION['Rol'])){
  if($_SESSION['Rol']!="Adoptante"){
    header('Location: /admin');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Page title -->
      <title>Mi Voz Por La Tuya</title>

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.js"></script>
      <![endif]-->
      <!-- jQuery-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

      <!-- Icon fonts -->
      <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="fonts/flaticons/flaticon.css" rel="stylesheet" type="text/css">

      <!-- Google fonts -->
      <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>
	  <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

      <!-- Css Animations -->
      <link href="css/animate.css" rel="stylesheet" />

      <!-- Theme CSS -->
      <link href="css/style.css" rel="stylesheet">

	  <!-- Color Style CSS -->
      <link href="styles/yellowpaws.css" rel="stylesheet">

	  <!-- Prefix free CSS -->
	  <script src="js/prefixfree.js"></script>

      <!-- Owl Slider & Prettyphoto -->
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/prettyPhoto.css">

      <!-- Favicons-->
      <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <script type="text/javascript" src="/js/script.js"></script>
   </head>

   <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
		<div class="spinner">
			<div class="rect1"></div>
			<div class="rect2"></div>
			<div class="rect3"></div>
			<div class="rect4"></div>
			<div class="rect5"></div>
		</div>
	</div>
       <!-- Modal -->
  <div class="modal fade" id="recuperar" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Recuperar Contraseña</p>
        </div>
        <form id="formulario-recuperacion">
            <div class="modal-body">
                <div class="form-group" id="cmrr" style="display:none">
                    <center><label id="mrr"></label></center>
                </div>
                <div class="form-group">
                    <label for="emailr">¿Cual es tu correo electronico?</label>
                    <input type="email" class="form-control" id="emailr" required>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id="recuperar-boton">Recuperar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
	<!-- Navbar -->
      <nav class="navbar navbar-custom navbar-fixed-top">
	  		<!-- Start Top Bar -->
			<div class="top-bar hidden-xs hidden-sm">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<!-- Start Contact Info -->
							<ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i>Quetzaltenango, Guatemala</li>
                                <li><i class="fa fa-envelope"></i>info@mivozporlatuya.org</li>
                                <li><i class="fa fa-phone"></i>5481-2962</li>
                            </ul><!-- End Contact Info -->
						</div>
						<div class="col-md-4">
							<!-- Start Social Links -->
							<ul class="social-list">
								<li><a title="Facebook" href="https://www.facebook.com/Proyectomivozporlatuya/?fref=ts"><i class="fa fa-facebook"></i></a></li>
								<!--
                                <li><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a  title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a  title="Flickr" href="#"><i class="fa fa-flickr"></i></a></li>
								<li><a  title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
								-->
                                <li><a  title="Instagram" href="https://www.instagram.com/mivozporlatuya/"><i class="fa fa-instagram"></i></a></li>
							</ul>
							<!-- End Social Links -->
						</div>
					</div>
				</div>
			</div><!-- End Top bar -->
         <div class="container">
         <!-- navbar -->
            <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
               <i class="fa fa-bars"></i>
               </button>
               <!-- Logo -->
               <div class="page-scroll">
                  <a class="navbar-brand" href="#page-top">
				  <!--Font Icon logo and text -->
                     <span class="flaticon-animals-allowed"></span>Mi Voz Por La Tuya
                  </a>
               </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse page-scroll">
               <ul class="nav navbar-nav page-scroll">
                  <li><a href="#page-top">Inicio</a></li>
                  <li><a href="#services">Eventos</a></li>
                  <li><a href="#about">Quiénes somos</a></li>

                  <li ><a href="#donaciones">Donaciones</a></li>
				          <li ><a href="#adoption">Adopción</a></li>
                  <li ><a href="#historias">Historias</a></li>
              <!--    <li><a href="#contact">Contacto</a></li>-->
          <?php
          if(isset($_SESSION['Codigo_Usuario'])){
            echo '<li><a href="#" onclick="mostrar()"><div>
								<img src="img/usuario.png">
								'.$_SESSION['Usuario'].'
							</div></a></li>';
          }else{
            echo '<li><a href="#" onclick="mostrar()"><img src="img/usuario.png"> Iniciar</a></li>';
          }
           ?>

               </ul>
            </div>

         </div>
      </nav><!-- Navbar ends -->
	<!-- Full Page Image Background Slider -->
	<div class="slider-container">
	<!-- Controls -->
	   <div class="slider-control left inactive"></div>
	   <div class="slider-control right"></div>
		   <ul class="slider-pagi"></ul>
	   <!--Slider -->
	   <div class="slider">
	   <!-- Slide 1 -->
		  <div class="slide slide-0 active">
			 <div class="slide__bg"></div>
			 <div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
				   <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
				</svg>
				<div class="slide__text">
				   <h1 class="slide__text-heading">Bienvenidos a Mi Voz Por La Tuya</h1>
				   <div class="hidden-sm hidden-xs">
					  <p class="lead">Consulta nuestra sección de eventos para ver el calendario de actividades de la asociación.</p>
					  <div class="page-scroll">
						 <a href="#services" class="btn btn-default">Eventos</a>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
		 <!-- Slide 2 -->
		  <div class="slide slide-1">
			 <div class="slide__bg"></div>
			 <div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
				   <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
				</svg>
				<div class="slide__text">
				   <h1 class="slide__text-heading">¿Deseas unirte a nuestra lucha?</h1>
				   <div class="hidden-sm hidden-xs">
					  <p class="lead">¡Cualquier aporte económico es bienvenido!</p>
					  <div class="page-scroll">
						 <a href="#donaciones" class="btn btn-default">Donar</a>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
		  <!-- Slide 3-->
		  <div class="slide slide-2">
			 <div class="slide__bg"></div>
			 <div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
				   <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
				</svg>
				<div class="slide__text">
				   <h1 class="slide__text-heading">Somos una asociación que da vida</h1>
				   <div class="hidden-sm hidden-xs">
					  <p class="lead">Nos dedicamos al rescate de perros y gatos abandonados, los curamos y les cambiamos la vida.</p>
					  <div class="page-scroll">
						 <a href="#about" class="btn btn-default">Más acerca de nosotros</a>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
		  <!-- Slide 4-->
		  <div class="slide slide-3">
			 <div class="slide__bg"></div>
			 <div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
				   <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
				</svg>
				<div class="slide__text">
				   <h1 class="slide__text-heading">Adopta una mascota</h1>
				   <div class="hidden-sm hidden-xs">
					  <p class="lead">Tenemos muchas mascotas adorables que necesitan un hogar. Comparte el amor, Adopta!</p>
					  <div class="page-scroll">
						 <a href="#adoption" class="btn btn-default">Adoptar</a>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
	<!--/ Slider ends -->

    <!-- Section services -->
	<section id="services" class="home-section">
	   <div class="col-lg-8 col-lg-offset-2">
		 <!-- Section heading -->
		  <div class="section-heading">
			 <h2>Nuestros Eventos</h2>
			 <div class="hr"></div>
		  </div>
	   </div>
	   <div class="container">
		  <div class="row">
              <!-- item 1-->
                 <!--<div class="col-md-4 col-sm-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="img-wrapper">
                       <img src="'.$imagen.'" alt="" class="img-responsive"/>
                    </div>
                    <h4>sdafd</h4>
                    <p class="margin">dfad
                    </p>
                     <div class="caption-adoption">
                                      <ul class="list-unstyled">
                                         <li><strong>Lugar:</strong>dfas</li>
                                         <li><strong>Fecha: </strong>dsafasd</li>
                                         <li><strong>Hora:</strong>dfasdfa</li>
                                      </ul>
                                      <!-- Buttons -->
                                      <!--<div class="toggle-btn page-scroll text-center">
                                         <a href="#1" class=" btn btn-default">Más información</a>
                                      </div>
                                   </div>
                 </div><!-- /col-md-4-->
              <?php
              include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
              $operacion = new Operacion();
              $datos = $operacion->ConsultaEventos();

              foreach ($datos as $fila) {
                  $fotos = $operacion->FotosEvento($fila[6]);
                  if(count($fotos)>0){
                      $imagen=$fotos[0][0];
                  }else{
                      $imagen='';
                  }

                  echo '<!-- item 1-->
                         <div class="col-md-4 col-sm-12 wow fadeInLeft pull-left" data-wow-delay="0.2s">
                            <div class="img-wrapper">
                               <img src="'.$imagen.'" alt="" class="img-responsive"/>
                            </div>
                            <h4>'.$fila[1].'</h4>
                            <p class="margin">'.$fila[2].'
                            </p>
                             <div class="caption-adoption">
                                              <ul class="list-unstyled">
                                                 <li><strong>Lugar:</strong> '.$fila[3].'</li>
                                                 <li><strong>Fecha: </strong> '.$fila[4].'</li>
                                                 <li><strong>Hora:</strong> '.$fila[5].'</li>
                                              </ul>

                                           </div>
                         </div><!-- /col-md-4-->';
              }
              ?>
		  </div>
	   </div>
	</section>
	<!-- /Section ends -->

	<div id="ventana-flotante" class="col-md-5 col-md-offset-3">

    </div>
    <!-- Section About -->
		<section id="about" class="home-section" style="background-color:white">
	   <div class="col-lg-8 col-lg-offset-2">
	   	<!-- Section Heading -->
		  <div class="section-heading">
			 <h2>Quiénes somos</h2>
			 <div class="hr"></div>
		  </div>
	   </div>
		  <div class="col-md-12 col-sm-12 col-centered">
			 <div class="centered-pills">
				<!-- Navigation -->
				<ul class="nav nav-pills">
				   <li class="active"><a href="#pane1" data-toggle="tab">Nuestra filosofía</a></li>

				   <li><a href="#pane3" data-toggle="tab">Nuestro equipo</a></li>
				</ul>
			 </div>
		  </div>
		 <div class="container">
		  <!-- Panels start -->
		  <div class="tabbable">
			 <div class="tab-content">
				<!-- Panel  1 -->
				<div id="pane1" class="paneltab tab-pane fade active in">
				        <div class="row">
				   <div class="col-xs-12 col-sm-6 res-margin">
                       <h4>Misión</h4>
                       <p class="text-justify"><span class="glyphicon glyphicon-heart-empty"></span>&nbsp;Rescatar mascotas que han sido abandonadas, brindándoles atención médica para la curación parcial y total de heridas, desnutrición y demás problemas de salud que tengan, así como la responsable entrega adoptantes que cumplan con los requisitos que la asociación necesita para corroborar que el adoptado tenga un lugar digno. </p>
                       <h4>Visión</h4>
                       <p  class="text-justify"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Ser una asociación que reduzca el número de animales abandonados en la calle para evitar enfermedades en la sociedad, brindar servicio de salud a personas particulares.</p>

				   </div>

				  <div class="col-xs-12 col-sm-6">
				   	<!-- Responsive video -->
					  <!--<div class="embed-responsive embed-responsive-16by9">
						 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/deN3nt3Sdhc"></iframe>
					  </div>-->
                      <h4>Objetivos</h4>

                       <div>


                                <p  class="text-justify"><span class="glyphicon glyphicon-flag"></span>&nbsp;Rescatar animales en peligro de las calles de la ciudad de Quetzaltenango.</p>
                                <p  class="text-justify"><span class="glyphicon glyphicon-flag"></span>&nbsp;Concientizar a la población sobre el cuidado de mascotas domésticas.</p>
                       </div>
				   </div>
				  </div>
				 </div>
				<!-- Panel 1 ends -->

				<!-- Panel 2 -->


				<!-- Panel  3 -->
				<div id="pane3" class="paneltab tab-pane fade text-center">
				 <div class="row">
				   <h3>Conoce nuestro equipo</h3>
				   <!-- Item 1 -->
				   <div class="team">
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team1.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>Rubí Rodríguez </h5>
							<span>Presidente</span>
							<p>Descripción pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media margin">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
					  </div>
					  <!-- Item 2 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team2.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>Saraí Rodríguez</h5>
							<span>Vice-Presidente</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media margin">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
					  </div>
					  <!-- item 3 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team3.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>Adrian de León</h5>
							<span>Secretario</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media margin">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
					  </div>
					  <!-- Item 4 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team4.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5> Oscar Chaclán </h5>
							<span>Tesorero</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
                          <br><br>
					  </div>
                       <!-- Item 5 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team1.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>Rocío Chaclán </h5>
							<span>Vocal I</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media margin">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
					  </div>
					  <!-- Item 6 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team2.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>José André Guzmán</h5>
							<span>Vocal II</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media margin">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
					  </div>
					  <!-- item 7 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team3.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>Claudia</h5>
							<span>Vocal III</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media margin">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
					  </div>
					  <!-- Item 8 -->
					  <div class="col-md-3 col-sm-6">
						 <div class="img-wrapper">
							<img src="img/team4.jpg" alt="" class="img-responsive"/>
						 </div>
						 <!-- Caption -->
						 <div class="caption-team">
							<h5>Pendiente</h5>
							<span>Voluntario</span>
							<p>Descripción Pendiente.</p>
						 </div>
						 <!-- Social icons
						 <div class="social-media">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
							<a href="#" title=""><i class="fa fa-pinterest"></i></a>
							<a href="#" title=""><i class="fa fa-instagram"></i></a>
						 </div> -->
                       </div>
				   </div>
				 </div><!-- /container-->
			   </div><!-- /panel 3 ends -->
			</div><!-- /.tab-content -->
		  </div><!-- /.tabbable -->
	   </div><!-- /container-->
	</section>
	<!-- Section ends-->

	<!-- Section Gallery -->
<section id="donaciones" class="home-section">
    <div class="container">
        <div class="row">
	   <div class="col-lg-8 col-lg-offset-2">
	   	<!-- Section heading -->
		  <div class="section-heading">
			 <h2>Donaciones</h2>
			 <div class="hr"></div>
		  </div>
	   </div>
            </div>

          <center>
            <div class="row">
          	   <div class="container wow fadeInDown" data-wow-delay="0.2s">
          <table style="margin: 0 auto;">

            <tr>
              <td>
                <img alt="Logo no disponible" src="/img/bi.png" style="margin:10px" height="66" width="232"/>
              </td>
              <td>
                 <h5>Número de cuenta:</h5>
                         <span>039-59-35352</span>
                         <p>Cuenta a nombre de: Rubí Rodríguez</p>
              </td>
            </tr>
            <tr>
              <td><br></td>
              <td><br></td>
            </tr>
            <tr>
              <td><img alt="Logo no disponible" src="/img/banrural.png" style="margin:10px" height="122" width="232"/></td>
              <td><h5>Número de cuenta:</h5>
        							<span>4165178015</span>
        							<p>Cuenta a nombre de: Rubí Rodríguez</p></td>
            </tr>

          </table>
        </div>
    </div>
        </center>

        </div>
	</section>

	<!-- Section Adoption -->
	<section id="adoption" class="home-section">
	   <div class="col-lg-8 col-lg-offset-2">
		  <!-- Section Heading -->
		  <div class="section-heading">
			 <h2>Adopción</h2>
			 <div class="hr"></div>
		  </div>
	   </div>
	   <div class="container">
		  <div class="row wow fadeInDown" data-wow-delay="0.2s">
		  <!-- Image -->

			 <div class="col-md-12">
				<!-- Text -->
			   <h3>¿Quiéres adoptar una mascota?</h3>
			   <p class="text-justify">Por qué comprar una mascota si puedes adoptar, estos animalitos necesitan tanto amor como cualquier otro. Lo mejor de todo es que nuestros amiguitos cuentan con vacunas y esterilización. Además se encuentran en un excelente estado de salud gracias a los tratamientos que reciben por parte de profesionales.
			   </p>
			  </div>
			 </div><!--/row-->

			 <div class="row">
				<div class="col-md-5 col-sm-6">
				<!-- Toggle -->
				   <h4 class="text-center">Preguntas frecuentes</h4>
				   <div class="panel-group" id="accordion">
				   	<!-- Question 1 -->
					  <div class="panel panel-default">
						 <div class="panel-heading">
							<h5 class="panel-title">
							   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">¿Es necesario registrarse en la plataforma?</a>
							</h5>
						 </div>
						 <div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
							   <p class="text-justify">Puedes hacerlo, de esta forma se mantienen los datos personales actualizados y organizados, para las adopciones, o si tienes alguna dificultad para hacerlo puedes comunicarte con la asociación para recibir ayuda.
							   </p>
							</div>
						 </div>
					  </div>
					  <!-- Question 2 -->
					  <div class="panel panel-default">
						 <div class="panel-heading">
							<h5 class="panel-title">
							   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">¿Qué se necesita para adoptar?</a>
							</h5>
						 </div>
						 <div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
							   <p class="text-justify">Solamente debes completar un formulario con algunas preguntas y presentar una copia de DPI.
							   </p>
							</div>
						 </div>
					  </div>
					  <!-- Question 4 -->
					  <div class="panel panel-default">
						 <div class="panel-heading">
							<h5 class="panel-title">
							   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">¿Cómo elegir a una mascota?</a>
							</h5>
						 </div>
						 <div id="collapseFour" class="panel-collapse collapse">
							<div class="panel-body">
							   <p class="text-justify">Las mascotas que se encuentran disponibles para ser adoptadas son visibles en el deslizante, solo debes elegir la que más te convenza.
							   </p>
							</div>
						 </div>
					  </div>
					  <!-- Question 5 -->
					  <div class="panel panel-default">
						 <div class="panel-heading">
							<h5 class="panel-title">
							   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">¿Los animales están esterilizados?</a>
							</h5>
						 </div>
						 <div id="collapseFive" class="panel-collapse collapse">
							<div class="panel-body">
							   <p class="text-justify">En el recuadro de datos de cada mascota puedes observar si ya ha sido esterilizado o si aún no.
							   </p>
							</div>
						 </div>
					  </div>
				   </div>
				</div><!--/col-md-5 -->
				<!-- Modal -->
  <div class="modal fade" id="aviso" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerraraviso1">&times;</button>
          <p>Aviso</p>
        </div>
        <div class="modal-body">
          <p id="mens"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="cerraraviso2">Cerrar</button><!-- XELA1 -->
        </div>
      </div>

    </div>
  </div>
				<!-- Adopt a pet -->
				<div class="col-md-7 col-sm-6" id="mascotas">

				  <?php
include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";
$operacion = new Operacion();
$datos = $operacion->ConsultaMascotas();
$animales='';
$slides ='';

foreach ($datos as $fila) {
	if($fila[2]==1){
		$esterilizado ='Si';
	}else{
		$esterilizado ='No';
	}
	$fotos = $operacion->FotosMascota($fila[0]);
	if(count($fotos)>0){
		$imagen=$fotos[0][0];
	}else{
		$imagen='';
	}
	$animales=$animales.'<div>		 <div class="col-md-12">
							<div class="thumbnail text-center">
							<!-- Image -->
							   <img src="'.$imagen.'" class="img-circle img-responsive" alt="Sin Foto">
							   <!-- Name -->
							   <div class="caption-adoption">
								  <h6>'.$fila[1].'</h6>
								  <!-- List -->
								  <ul class="list-unstyled">
									 <li><strong>Genero: </strong>'.$fila[3].'</li>
									 <li><strong>Esterilizado: </strong>'.$esterilizado.'</li>
									 <li><strong>Edad: </strong>'.$fila[5].'</li>
									 <li><strong>Raza: </strong>'.$fila[4].'</li>
								  </ul>
								  <!-- Buttons -->
								  <div class="toggle-btn page-scroll text-center">
									 <a href="#" onclick="ComprobarDatos('.$fila[0].')" class=" btn btn-default">Adoptar</a>
								  </div>
							   </div>
							</div><!-- /thumbnail -->
						 </div><!-- /col-md-12 -->
					  </div><!-- /div -->';
}
$slides='  <div class="cd-panel from-right" id="formulario-adoptar">
          <div class="cd-panel-container">
           <div class="cd-panel-content" id="preguntas">

           </div><!-- /cd-panel-content -->
          </div><!-- /cd-panel-container -->
         </div><!-- /cd-panel -->';
echo '<h4 class="text-center">Buscar un nuevo amigo</h4>
				   <div id="owl-adopt" class="owl-carousel owl-theme">'.$animales.'</div><!-- /owl-adopt -->'.$slides;

				   ?>

			  </div><!-- /col-md-7 -->
			</div><!-- /row -->
	     </div><!-- /container -->
	 </section>
	<!-- Section ends -->

    <!-- Section stories -->
    <section id="historias" class="home-section">
        <div class="col-lg-8 col-lg-offset-2">
	   	<!-- Section Heading -->
		  <div class="section-heading">
			 <h2>Historias</h2>
			 <div class="hr"></div>
		  </div>
	   </div>
		 <div class="container">
		  <!-- Panels start -->
		  <div class="tabbable">
			 <div class="tab-content">
				<!-- Panel  1 -->
				<div id="pane1" class="paneltab tab-pane fade active in">
				   <div class="row">
					  <div class="col-md-12 col-sm-12">
						 <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-8 col-xs-12 res-margin wow fadeInRight" data-wow-delay="0.2s">
							<h3>Sakura y su papa adoptivo</h3>
							<p class="text-justify">Final feliz!
                 Gracias David por darle un hogar tan bello a "Sakura" y por
                 cambiarle la vida a este ángel peludo. La pequeña emprendió viaje
                 a Guatemala junto a su nuevo papá adoptivo, ¡muchas gracias por adoptar!</p>
						 </div>
						 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft" data-wow-delay="0.2s">
							<img src="img/sakura.jpg" alt="" class="img-responsive"/>
						 </div>
                       </div>
				   </div>
				 </div>
                 <br />
                 <br />
                 <!-- Panel  2 -->
				<div id="pane1" class="paneltab tab-pane fade active in">
				   <div class="row">
					  <div class="col-md-12 col-sm-12">
						 <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-8 col-xs-12 res-margin wow fadeInRight" data-wow-delay="0.2s">
							<h3>La peque! </h3>
							<p class="text-justify">Esta perrita fue localizada por vecinos de la Nueva Ciudad de los Altos Xela,
                  es una hembra mezcla de Husky con Pastor Alemán,
                   es joven y se encuentra en buenas condiciones.
                   </p>
						 </div>
						 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft" data-wow-delay="0.2s">
							<img src="img/peque.jpg" alt="" class="img-responsive"/>
						 </div>
                       </div>
				   </div>
				 </div>
                 <br />
                 <br />
                 <!-- Panel  3 -->
				<div id="pane1" class="paneltab tab-pane fade active in">
				   <div class="row">
					  <div class="col-md-12 col-sm-12">
						 <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-8 col-xs-12 res-margin wow fadeInRight" data-wow-delay="0.2s">
							<h3>Amigo!</h3>
							<p class="text-justify">Hemos rescatado a este lindo doberman, pues se encontraba
                en malas condiciones y descuidado, andaba deambulando
                 por las calles.</p>
						 </div>
						 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft" data-wow-delay="0.2s">
							<img src="img/amigo.jpg" alt="" class="img-responsive"/>
						 </div>
                       </div>
				   </div>
				 </div>
              </div>
             </div>
        </div>
       </section>

	<!-- Section Contact -->


	<!--Map
	<div class="wow fadeInTop" data-wow-delay="0.2s">
	    <div id="map-canvas"></div>
	</div>
 	Section ends -->

    <!-- Footer -->
	<footer>
	   <div class="container">
		  <div class="row wow fadeInUp" data-wow-delay="0.2s">
			 <div class="col-sm-6 col-md-4">
			 <!-- Social Media icons -->
				<ul class="social-media">
				    <li><a title="Facebook" href="https://www.facebook.com/Proyectomivozporlatuya"><i class="fa fa-facebook"></i></a></li>
				    <!--
				   <li><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
				   <li><a title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></li>
				   <li><a  title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
				   <li><a  title="Flickr" href="#"><i class="fa fa-flickr"></i></a></li>
				   <li><a  title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
                     -->
				   <li><a  title="Instagram" href="https://www.instagram.com/mivozporlatuya/"><i class="fa fa-instagram"></i></a></li>
				</ul>
			 </div>
			 <!-- Bottom Credits -->
			 <div class="col-sm-6 col-md-offset-5 col-md-3 text-center">
				<p>COPYRIGHT © 2015 Ingrid Kuhn</p>
			 </div>
		  </div><!-- /row-->
	   </div><!-- /container -->
	   <!-- Go To Top Link -->
	   <div class="page-scroll hidden-sm hidden-xs">
		  <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
	   </div>
	</footer>
	<!-- /footer ends -->

	<!-- Core JavaScript Files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

	<!-- Counter -->
	<script src="js/numscroller.js"></script>

	<!-- WOW animations -->
	<script src="js/wow.min.js"></script>

	<!-- Prettyphoto Lightbox -->
	<script src="js/jquery.prettyPhoto.js"></script>

	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>

	<!-- Contact form -->
	<script src="js/contact.js"></script>

	<!-- Isotope -->
	<script src="js/jquery.isotope.js"></script>

	<!-- Google maps -->
	<script src="https://maps.googleapis.com/maps/api/js"></script>

   </body>
</html>
