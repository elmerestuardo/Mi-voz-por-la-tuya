<html>
		<head>
		<title>Cambiar Contraseña</title>
		  <meta charset="UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style type="text/css" rel="stylesheet">
		.card {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card {
  margin-top: 10px;
  box-sizing: border-box;
  border-radius: 2px;
  background-clip: padding-box;
}
#titulo {
    color: black;
    font-size: 24px;
    font-weight: 300;
    text-transform: uppercase;
}

.card .card-image {
  position: relative;
  overflow: hidden;
}
.card .card-image img {
  border-radius: 2px 2px 0 0;
  background-clip: padding-box;
  position: relative;
  z-index: -1;
}
.card .card-image span.card-title {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 16px;
}
.card .card-content {
  padding: 16px;
  border-radius: 0 0 2px 2px;
  background-clip: padding-box;
  box-sizing: border-box;
}
.card .card-content p {
  margin: 0;
  color: inherit;
}
.card .card-content span.card-title {
  line-height: 48px;
}
.card .card-action {
  border-top: 1px solid rgba(160, 160, 160, 0.2);
  padding: 16px;
}
.card .card-action a {
  color: #ffab40;
  margin-right: 16px;
  transition: color 0.3s ease;
  text-transform: uppercase;
}
.card .card-action a:hover {
  color: #ffd8a6;
  text-decoration: none;
}
		</style>
		</head>
		<body>
		
		
		<div class="container">
    <div class="row">
        <!-- Card Projects -->
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-image">
                    <center><img class="img-responsive" src="http://www.mivozporlatuya.org/img/logo.png"></center>
                    
                </div>
                <div>
                <center><span class="card-title" id="titulo">Cambiar Contraseña</span></center>
                </div>
                <div class="card-content">
                    <p>Por razones de seguridad tu contraseña solamente puede ser cambiada.</p>
                </div>
                
                <div class="card-action">
                    <form action="http://www.mivozporlatuya.org/php/sustituir.php" method="post">
			<input type="hidden" name="identificador" value="<?php 
				if(!empty($_POST['Codigo'])){
				echo $_POST['Codigo'];
				}else{
				header("Location: /");
				}
			?>">
			 <div class="form-group">
			    <label for="contraseña">Nueva Contraseña:</label>
					<br>
			    <input type="password" class="form-control" name="contraseña" id="contraseña" required>
			  </div>
			  <br><br>
			   <div class="form-group">
			    <label for="vcontraseña">Verificar Nueva Contraseña:</label>
					<br>
			    <input type="password" class="form-control" name="vcontraseña" id="vcontraseña" required>
			  </div>
			  <br>
			 <center><input type="submit" name="Finalizar" value="Finalizar"></center>
		</form>
                </div>
            </div>
        </div>
    </div>
</div>
		
		
		</body>
		</html>