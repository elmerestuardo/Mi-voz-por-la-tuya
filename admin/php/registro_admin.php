<?php

include_once $_SERVER['DOCUMENT_ROOT']."/BLL/Operacion.inc";

session_start();
$r=0;
if($_SESSION['Codigo_Usuario'] && $_SESSION['Rol']){
    if($_SESSION['Rol'] == 'Administrador'){
        if($_POST['nombre'] && $_POST['apellido'] && $_POST['telefono'] && $_POST['direccion'] && $_POST['user'] && $_POST['pass'] && $_POST['mail'] && $_POST['rol']){
            $operacion = new Operacion();
            if($operacion->ExisteUsuario($_POST['user'])==0){
                if($operacion->ExisteCorreo($_POST['mail'])==0){
                    $r=$operacion->IngresoUsuariosA($_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['direccion'],$_POST['user'],$_POST['pass'],$_POST['mail'],$_POST['rol'],0);
                    if($r!=0)
                    {
                        if(isset($_POST['aviso'])){
                            $para = $_POST['mail'];
                            $motivo = "Confirmar Registro";

                            $mensage = '
                            <html>
                            <head>
                            <title>Confirmar Registro</title>
                            </head>
                            <body>
                            <center>
                            <div style="background-color:#029f5b;padding:10px;color: white;">
                                <h1 style="color:white">Confirmar Registro</h1>
                                <p style="color:white">Le damos la bienvenida a la familia Mi Voz Por La Tuya. </p><br>

                                <p style="color:white">Para habilitar su cuenta acceda al siguiente link:</p>

                                <p><a href="mivozporlatuya.org/php/habilitar.php?Codigo='.$r.'" style="color:white"><strong>Habilitar</strong></a></p><br>
                            </div>
                            </center>
                            </body>
                            </html>
                            ';
                            $cabeceras = "MIME-Version: 1.0" . "\r\n";
                            $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $cabeceras .= 'From: Mi Voz Por La Tuya <mivozporlatuya@gmail.com>';
                            mail($para,$motivo,$mensage,$cabeceras);
                        }
                        else{
                            $para = $_POST['mail'];
                            $motivo = "Registro";

                            $mensage = '
                            <html>
                            <head>
                            <title>Registro</title>
                            </head>
                            <body>
                            <center>
                            <div style="background-color:#029f5b;padding:10px;color: white;">
                                <h1 style="color:white">Registro</h1>
                                <p style="color:white">Le damos la bienvenida a la familia Mi Voz Por La Tuya. </p><br>

                                <p style="color:white">Para acceder su cuenta acceda al siguiente link:</p>

                                <p><a href="mivozporlatuya.org" style="color:white"><strong>Acceder</strong></a></p><br>
                            </div>
                            </center>
                            </body>
                            </html>
                            ';
                            $cabeceras = "MIME-Version: 1.0" . "\r\n";
                            $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $cabeceras .= 'From: Mi Voz Por La Tuya <mivozporlatuya@gmail.com>';
                            mail($para,$motivo,$mensage,$cabeceras);
                        }
                    }
                }
                else{
                    $r= 3;
                }
            }
            else{
                $r= 2;
            }
        }else{
            $r=4;
        }
    }else{
        $r=5;
        header('Location: /admin/index.php');
    }
}else{
	$r= 5;
    header('Location: /index.php');
}
echo $r;
?>
