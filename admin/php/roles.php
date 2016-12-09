<?php
session_start();
if(isset($_SESSION['Codigo_Usuario'])){
    if($_SESSION['Rol'] == 'Administrador'){

        echo '<ul id="menu" >
		        <li id="menu-home" ><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i><span>Perfil</span></a></li>
		        <li><a href="#"><i class="glyphicon glyphicon-user" aria-hidden="true"></i><span>Usuarios</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="users.php">Listado de usuarios</a></li>
			            <li id="menu-academico-boletim" ><a href="agregar_usuario.php">Añadir nuevo usuario</a></li>
		             </ul>
                  </li>
                  <li><a href="#"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i><span>Eventos</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="eventos.php">Eventos activos</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="historial_eventos.php">Historial de eventos</a></li>
			            <li id="menu-academico-boletim" ><a href="agregar_evento.php">Añadir nuevo evento</a></li>
		             </ul>
                  </li>
                  <li><a href="#"><i class="glyphicon glyphicon-heart" aria-hidden="true"></i><span>Mascotas</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="consultaMascotas.php">Listado de mascotas</a></li>
			            <li id="menu-academico-boletim" ><a href="mascotas.php">Añadir nueva mascota</a></li>
                        <!--<li id="menu-academico-boletim" ><a href=" ingresoAlimentos.php">Alimentación</a></li>
                        <li id="menu-academico-boletim" ><a href=" ingresoRaza.php">Raza</a></li>-->
		             </ul>
                  </li>
                  <li><a href="#"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i><span>Adopciones</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="consultaAdopcion.php">Listado de adopciones</a></li>
			            <li id="menu-academico-boletim" ><a href="adopciones.php">Añadir nueva adopción</a></li>
		             </ul>
                  </li>
                  <li><a href="#"><i class="glyphicon glyphicon-usd" aria-hidden="true"></i><span>Transacciones</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="agregar_transacciones2.php">Listado de transacciones</a></li>
			            <li id="menu-academico-boletim" ><a href="agregar_transacciones.php">Añadir nueva transacción</a></li>
                        </li>
		             </ul>
                  </li>
                  <li><a href="#"><i class="glyphicon glyphicon-home" aria-hidden="true"></i><span>Hogares</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="agregar_hogares2.php">Listado de hogares temporales</a></li>
			            <li id="menu-academico-boletim" ><a href="agregar_hogares.php">Añadir hogar temporal</a></li>
		             </ul>
                  </li>
                  <li><a href="#"><i class="glyphicon glyphicon-pushpin" aria-hidden="true"></i><span>Visitas</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="consultaVisita.php">Listado de visitas</a></li>
			            <li id="menu-academico-boletim" ><a href="visitas.php">Añadir nueva visita</a></li>
		             </ul>
                  </li>
		      </ul>';
    }
    if($_SESSION['Rol'] == 'Gastos'){
        echo '<ul id="menu" >
                <li id="menu-home" ><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i><span>Perfil</span></a></li>
		        <li><a href="#"><i class="glyphicon glyphicon-usd" aria-hidden="true"></i><span>Transacciones</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="agregar_transacciones2.php">Listado de transacciones</a></li>
			            <li id="menu-academico-boletim" ><a href="agregar_transacciones.php">Añadir nueva transacción</a></li>
                        <li id="menu-academico-boletim" ><a href="agregar_transacciones1.php">Balance</a></li>
		            </ul>
                </li>
		      </ul>';
    }
    if($_SESSION['Rol'] == 'Visitas'){
        echo '<ul id="menu" >
                <li id="menu-home" ><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i><span>Perfil</span></a></li>
		        <li><a href="#"><i class="glyphicon glyphicon-pushpin" aria-hidden="true"></i><span>Visitas</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="consultaVisita.php">Listado de visitas</a></li>
			            <li id="menu-academico-boletim" ><a href="visitas.php">Añadir nueva visita</a></li>
		            </ul>
                </li>
		      </ul>';
    }
    if($_SESSION['Rol'] == 'Mascotas'){
        echo '<ul id="menu" >
                <li id="menu-home" ><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i><span>Perfil</span></a></li>
		        <li><a href="#"><i class="glyphicon glyphicon-heart" aria-hidden="true"></i><span>Mascotas</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="consultaMascotas.php">Listado de mascotas</a></li>
			            <li id="menu-academico-boletim" ><a href="mascotas.php">Añadir nueva mascota</a></li>
                        <!--<li id="menu-academico-boletim" ><a href=" ingresoAlimentos.php">Alimentación</a></li>
                        <li id="menu-academico-boletim" ><a href=" ingresoRaza.php">Raza</a></li>-->
		            </ul>
                </li>
		      </ul>';
    }
    if($_SESSION['Rol'] == 'Hogares'){
        echo '<ul id="menu" >
                <li id="menu-home" ><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i><span>Perfil</span></a></li>
		        <li><a href="#"><i class="glyphicon glyphicon-home" aria-hidden="true"></i><span>Hogares</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="agregar_hogares2.php">Listado de hogares temporales</a></li>
			            <li id="menu-academico-boletim" ><a href="agregar_hogares.php">Añadir hogar temporal</a></li>
		            </ul>
                </li>
		      </ul>';
    }
    if($_SESSION['Rol'] == 'Adopciones'){
        echo '<ul id="menu" >
                <li id="menu-home" ><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i><span>Perfil</span></a></li>
		        <li><a href="#"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i><span>Adopciones</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="consultaAdopcion.php">Listado general de adopciones</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="adopcionFecha.php">Listado de adopciones por fecha</a></li>
			            <li id="menu-academico-boletim" ><a href="adopciones.php">Añadir nueva adopción</a></li>
		            </ul>
                </li>
		      </ul>';
    }
}else{
    echo null;
    header('Location: /index.php');
}
?>
