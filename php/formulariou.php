<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
session_start();
if(isset($_SESSION['Codigo_Usuario'])){
	if(!empty($_SESSION['Nombre_Usuario'])){
		$nombre = $_SESSION['Nombre_Usuario'];
	}else{
		$nombre = "Sin Asignar";
	}
	if(!empty($_SESSION['Apellido_Usuario'])){
		$apellido = $_SESSION['Apellido_Usuario'];
	}else{
		$apellido = "Sin Asignar";
	}
	if(!empty($_SESSION['Telefono_Usuario'])){
		$telefono = $_SESSION['Telefono_Usuario'];
	}else{
		$telefono = "Sin Asignar";
	}
	if(!empty($_SESSION['Direccion_Usuario'])){
		$direccion = $_SESSION['Direccion_Usuario'];
	}else{
		$direccion = "Sin Asignar";
	}
	if(!empty($_SESSION['Usuario'])){
		$usuario = $_SESSION['Usuario'];
	}else{
		$usuario = "Sin Asignar";
	}
	if(!empty($_SESSION['Correo'])){
		$correo = $_SESSION['Correo'];
	}else{
		$correo = "Sin Asignar";
    }
	if($_POST['Peticion']==2){
        if($nombre=="Sin Asignar"){
            $nombre = "";
        }
        if($apellido=="Sin Asignar"){
            $apellido = "";
        }
        if($telefono=="Sin Asignar"){
            $telefono = "";
        }
        if($direccion=="Sin Asignar"){
            $direccion = "";
        }
		echo '
<div class="panel" id="panel-usuario">
<a class="cerrar" href="#" onclick="ocultar()">x</a>
<div class="container-fluid">
<br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#datos-caja">ACTUALIZAR DATOS</a></li>
  </ul>

  <div class="tab-content">
    <div id="datos-caja" class="tab-pane fade in active">
    				<div class="row">
                    <div class="col-xs-12">
                    <br>
                    	<form id="datos-form">
                            <div class="form-group" id="cma" style="display:none">
                                <center><label id="ma"></label></center>
                            </div>
                            <div class="form-group col-xs-12" role="form" style="display: block;">
						      <div style="color:red; display:inline">*</div><label for="nombre-usuario">Nombre</label>
						      <input type="text" class="form-control" name="nombre-usuario" id="nombre-usuario" tabindex="1" placeholder="Sin Asignar" value="'.$nombre.'" required>
						    </div>

                            <div class="form-group col-xs-12">
                            	<div style="color:red; display:inline">*</div><label for="apellido-usuario">Apellido</label>
                                <input type="text" name="apellido-usuario" id="apellido-usuario" tabindex="1" class="form-control" placeholder="Sin Asignar" value="'.$apellido.'" required>
                            </div>
                            <div class="form-group col-xs-12">
                            	<div style="color:red; display:inline">*</div><label for="telefono-usuario">Telefono</label>
                                <input type="text" name="telefono-usuario" id="telefono-usuario" tabindex="1" class="form-control" placeholder="Sin Asignar" value="'.$telefono.'" required>

                            </div>
                            <div class="form-group col-xs-12">
                            	<div style="color:red; display:inline">*</div><label for="direccion-usuario">Direccion</label>
                                <input type="text" name="direccion-usuario" id="direccion-usuario" tabindex="1" class="form-control" placeholder="Sin Asignar" value="'.$direccion.'" required>

                            </div>
                            <div class="form-group col-xs-12">
                                <button type="submit" class="col-xs-8 col-xs-offset-2 cd-close btn btn-default" name="terminar" id="terminar">Actualizar</button>
                            </div>
                            <div class="form-group col-xs-12">
                                <button type="button" class="col-xs-8 col-xs-offset-2 cd-close btn btn-danger" name="cancelar" id="cancelar">Cancelar</button>
                            </div>
                        </form>
                    </div>
                    </div>
    </div>
  </div>
</div>
</div>
		';
	}else{
		echo '
<div class="panel" id="panel-usuario">
<a class="cerrar" href="#" onclick="ocultar()">x</a>
<div class="container-fluid">
<br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#datos-caja">DATOS PERSONALES</a></li>
  </ul>

  <div class="tab-content">
    <div id="datos-caja" class="tab-pane fade in active">
      <div class="row">
                    <div class="col-xs-12">
                    <br>
                        <form id="datos-form">
                            <div class="form-group col-xs-12" id="cmv" style="display:none">
                                <center><label id="mv"></label></center>
                            </div>
														<div class="form-group col-xs-12">
	                            <p><span class="glyphicon glyphicon-info-sign"></span> Nombre: '.$nombre.'</p>
	                            <p><span class="glyphicon glyphicon-info-sign"></span> Apellido: '.$apellido.'</p>
								 							<p><span class="glyphicon glyphicon-phone-alt"></span> Telefono: '.$telefono.'</p>
								 							<p><span class="glyphicon glyphicon-map-marker"></span> Direccion: '.$direccion.'</p>
								 							<p><span class="glyphicon glyphicon-user"></span> Usuario: '.$usuario.'</p>
								 							<p><span class="glyphicon glyphicon-envelope"></span> Correo: '.$correo.'</p>
														</div>
                            <div class="form-group col-xs-12">
                                <button type="button" class="col-xs-8 col-xs-offset-2 cd-close btn btn-default" name="cambiar" id="cambiar">Actualizar Datos</button>
                            </div>
                            <div class="form-group col-xs-12">
                                <button type="button" class="col-xs-8 col-xs-offset-2 cd-close btn btn-danger" name="salir" id="salir">Salir</button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
  </div>
</div>
</div>
';
	}
}else
{
	echo '
<div class="panel" id="panel-usuario">
<a class="cerrar" href="#" onclick="ocultar()">x</a>
<div class="container-fluid">	
<br>
	  <ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#login-caja">INICIAR</a></li>
	    <li><a data-toggle="tab" href="#register-caja">REGISTRARSE</a></li>
	  </ul>
  <div class="tab-content">

    <div id="login-caja" class="tab-pane fade in active">
    				<div class="row">
                    <div class="col-xs-12">
                    <br>
                        <form id="login-form" role="form" style="display: block;">
                                              
                        	<div class="form-group col-xs-12" id="cmi" style="display:none">
                        		<center><label id="mi"></label></center>
                        	</div>
                            <div class="form-group col-xs-12">
                               <div style="color:red; display:inline">*</div><label for="ui">Usuario o Correo</label>
                                <input type="text" name="Usuario" id="ui" tabindex="1" class="form-control" placeholder="" value="" required/>
                            </div>
                            <div class="form-group col-xs-12">
                                <div style="color:red; display:inline">*</div><label for="ci">Contraseña</label>
                                <input type="password" name="Clave" id="ci" tabindex="2" class="form-control" placeholder="" required/>
                            </div>
														<div class="form-group col-xs-12">
                                <button type="submit" class="col-xs-8 col-xs-offset-2 cd-close btn btn-default" name="iniciar" id="iniciar">Iniciar</button>
                            </div>
                            <div class="form-group col-xs-12">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="text-center">
																				<br>
                                            <a href="#" id="clave-olvidada" tabindex="5" class="forgot-password">¿Contraseña olvidada?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
    </div>
    
    <div id="register-caja" class="tab-pane fade">
    				<div class="row">
                    <div class="col-xs-12">
                    <br>
    					<form id="register-form" role="form">
                        	<div class="form-group col-xs-12" id="cmr" style="display:none">
                        		<center><label id="mr"></label></center>
                        	</div>
                            <div class="form-group col-xs-12">
                            <div style="color:red; display:inline">*</div>
                            	<label for="ur">Usuario</label>
                                <input type="text" name="Usuario" id="ur" tabindex="1" class="form-control" placeholder="" value="" required/>
                            </div>
                            <div class="form-group col-xs-12">
                            <div style="color:red; display:inline">*</div>
                            	<label for="cr">Correo Electronico</label>
                                <input type="email" name="Correo" id="cr" tabindex="1" class="form-control" placeholder="" value="" required/>
                            </div>
                            <div class="form-group col-xs-12">
                            <div style="color:red; display:inline">*</div>
                            	<label for="clr">Contraseña</label>
                                <input type="password" name="Clave" id="clr" tabindex="2" class="form-control" placeholder="" required/>
                            </div>
                            <div class="form-group col-xs-12">
                            <div style="color:red; display:inline">*</div>
                            	<label for="cclr">Confirmar Contraseña</label>
                                <input type="password" name="Confirmar_Clave" id="cclr" tabindex="2" class="form-control" placeholder="" required/>
                            </div>
														<div class="form-group col-xs-12">
                                <button type="submit" class="col-xs-8 col-xs-offset-2 cd-close btn btn-default" name="registrar" id="registrar">Registrar</button>
                            </div>

                        </form>
                    </div>
                </div>
    </div>

  </div>

</div>
</div>
        ';
}
}else{
header("Location: /");
}
?>
