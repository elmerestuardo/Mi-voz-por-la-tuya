function mostrar(){
  document.getElementById("ventana-flotanteu").style.visibility = "visible";
  document.getElementById("ventana-flotanteu").className = 'mostrar';
}
function ocultar(){
  document.getElementById("ventana-flotanteu").style.visibility = "hidden";
  document.getElementById("ventana-flotanteu").className = 'oculto';
}
function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}
function MensajeA(mensaje,color){
  $('#ma').html(mensaje);
  $('#ma').css('color',color);
  $('#cma').show();
  setTimeout(function(){ $('#ma').html("");  $('#cma').css('display','none'); }, 4000);
}
function Ocultar(){
    $('#aviso').modal('hide');
}
function Mostar(){
    $('#aviso').modal();
}
function OcultarBU(){
    $('#eliminaru').modal('hide');
}
function MostarBU(){
    $('#eliminaru').modal();
}
function OcultarBE(){
    $('#eliminarev').modal('hide');
}
function MostarBE(){
    $('#eliminarev').modal();
}
$(function(){
    $("#add-user").on("submit", function(e){
        e.preventDefault();
        rol = $('#rol option:selected').text();
        if(rol == ""){
            Mensaje("Falta el rol",'red');
        }else{
            datos = new FormData(document.getElementById("add-user"));
            $.ajax({
                url: "/admin/php/registro_admin.php",
                type: "POST",
                dataType:"html",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    if (response==0){
                        Mensaje("Ocurrio un error inesperado",'red');
                    }
                    else if (response==2) {
                        Mensaje("El nombre de usuario ya existe",'red');
                    }
                    else if (response==3) {
                        Mensaje("El correo ya esta en uso",'red');
                    }
                    else if (response==4) {
                        Mensaje("no hay nada",'red');
                    }
                    else{
                        $('#nombre').val("");
                        $('#apellido').val("");
                        $('#telefono').val("");
                        $('#direccion').val("");
                        $('#user').val("");
                        $('#pass').val("");
                        $('#mail').val("");
                        Mensaje("Para confirmar revise su correo",'green');
                        //$("#cmr").html('Datos recibidos:<br>'+response);
                    }
                }
            });
        }
    });
});

$(function() {
    cont = 0;
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_usuarios.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            $.each(response, function (i, item) {
                if(response[i][3] == "1"){
                    cont++;
                    $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td><a href='#' onclick='desactivar("+response[i][0]+")'>Desactivar</a></td><td><div class='edit-users'><ul><a href='#'><li><button type='submit' id='editar-u onclick='edited("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></li></a><li><button type='submit' id='borrar-u' onclick='borrar("+response[i][0]+")'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></li></ul></div></td></tr>").appendTo('#cargar-usuarios');
                }else{
                    $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td><a href='#' onclick='activar("+response[i][0]+")'>Activar</a></td><td><p>Para usar esta opción,</p><p>active al usuario</p></td></tr>").appendTo('#cargar-usuarios');
                    cont++;
                }
            });
            
        }
      });
});

function activar(codigo){
    parametros={
        "CodigoUS": codigo,
        "estado": "1",
    }
    $.ajax({
        data: parametros,
        type: 'post',
        url: '/admin/php/activacion_usuario.php',
        dataType: 'html',
        beforeSend: function () {
            
        },
        success: function (response) {
            if(response == 1){
                $("#cargar-usuarios").find("tr:gt(0)").remove();
                refrescarUsuarios();
            }else if(response == 0){
                alert("no se ingreso nada");
            }else if(response == 2){
                alert("no hay datos");
            }else if(response == 3){
                alert("no es administrador");
            }else if(response == 4){
                alert("no se ha logueado");
            }
        }
    });
}

function desactivar(codigo){
    parametros={
        "CodigoUS": codigo,
        "estado": "0",
    }
    $.ajax({
        data: parametros,
        type: 'post',
        url: '/admin/php/activacion_usuario.php',
        dataType: 'html',
        beforeSend: function () {
            
        },
        success: function (response) {
            $("#cargar-usuarios").find("tr:gt(0)").remove();
            refrescarUsuarios();
        }
    });
}

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_eventos.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            $.each(response, function (i, item) {
                $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3] + "</td><td>" + response[i][4] + "</td><td>" + response[i][5] + "</td><td><div class='edit-users'><ul><a href='#'><li><button type='submit' id='editar' onclick='editev("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></li></a><li><button type='submit' onclick='borrarE("+response[i][0]+")'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></li></ul></div></td></tr>").appendTo('#cargar-eventos');
            });
        }
      });
});

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_historial_eventos.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            $.each(response, function (i, item) {
                $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3] + "</td><td>" + response[i][4] + "</td><td>" + response[i][5] + "</td><td><div class='edit-users'><ul><a href='#'><li></li></a><li><button type='submit' onclick='borrarE("+response[i][0]+")'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></li></ul></div></td></tr>").appendTo('#cargar-historial-eventos');
            });
        }
      });
});

function formulario(peticion, codigo){
  codigo2 = codigo;
  parametros = {
    "Peticion" : peticion,
    "Codigou" : codigo,
  };
  $.ajax({
    data:parametros,
      url:   '/admin/php/form.php',
      type:  'post',
      dataType:'html',
      beforeSend: function () {
      },
      success:  function (response, codigo) {
        codigo = codigo2;
        if(peticion == 1){
            $('#ev').html(response);
            $('#terminar').on("click",function(codigo){codigo = codigo2;terminar(codigo2);});
            $('#cancelar').on("click",function(){cancelar();});
        }else if(peticion == 2){
            $('#us').html(response);
            $('#terminar').on("click",function(codigo){codigo = codigo2;terminar(codigo2);});
            $('#cancelar').on("click",function(){cancelar();});
        }
      }
  });
}

function cancelar(){
  ocultar();
}

function terminar(codigo){
  rol=$('#rol option:selected').text();
  if(rol==""){
    MensajeA("Falta el rol","red");
  }
  else{
      if(document.getElementById('activo').checked == 1){
          status = "1";
      }
      else{
          status = "0";
      }
      parametros = {
        "Estado" : status,
        "Rol" : rol,
        "idus" : codigo,
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/actualizaru.php',
        type:  'post',
        dataType:'html',
        beforeSend: function () {

        },
        success:  function (response) {
            $("#cargar-usuarios").find("tr:gt(0)").remove();
            refrescarUsuarios();
            $('#aviso').modal('hide');            
        }
      });
  }
}

function edited(codigo) {
    formulario(2, codigo);
    $('#aviso').modal();
}

function editev(codigo) {
    formulario(1, codigo);
    $('#aviso').modal();
}

function borrarE(codigo) {
    codigo2 = codigo;
    $('#mensaje').html("¿Desea eliminar este evento?");
    $('#eliminarev').modal();
    $('#eliminarevent').on("click",function(codus){
        codus = codigo2;
        parametros = {
        "idus" : codus,
        };
        $.ajax({
            data:  parametros,
            url:   '/admin/php/eliminare.php',
            type:  'post',
            dataType:'html',
            beforeSend: function () {
                
            },
            success:  function (response) {
                $("#cargar-eventos").find("tr:gt(0)").remove();
                refrescarEventos();
                $('#eliminarev').modal('hide');
            }
        });
    });
}

function refrescarUsuarios(){
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_usuarios.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            $.each(response, function (i, item) {
                if(response[i][3] == "1"){
                    $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td><a href='#' onclick='desactivar("+response[i][0]+")'>Desactivar</a></td><td><div class='edit-users'><ul><a href='#'><li><button type='submit' id='editar' onclick='edited("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></li></a><li><button type='submit' onclick='borrar("+response[i][0]+")'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></li></ul></div></td></tr>").appendTo('#cargar-usuarios');
                }else{
                    $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td><a href='#' onclick='activar("+response[i][0]+")'>Activar</a></td><td><p>Para usar esta opción,</p><p>active al usuario</p></td></tr>").appendTo('#cargar-usuarios');
                }
            });
        }
      });
}

function refrescarEventos(){
    $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_eventos.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            $.each(response, function (i, item) {
                $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3] + "</td><td>" + response[i][4] + "</td><td>" + response[i][5] + "</td><td><div class='edit-users'><ul><a href='#'><li></li></a><li><button type='submit' onclick='borrarE("+response[i][0]+")'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></li></ul></div></td></tr>").appendTo('#cargar-eventos');
            });
        }
      });
}

function borrar(codigo) {
    codigo2 = codigo;
    $('#mensaj').html("¿Desea eliminar usuario?");
    $('#eliminaru').modal();
    $('#eliminarus').on("click",function(codus){
        codus = codigo2;
        parametros = {
        "idus" : codus,
        };
        $.ajax({
            data:  parametros,
            url:   '/admin/php/eliminaru.php',
            type:  'post',
            dataType:'html',
            beforeSend: function () {
                
            },
            success:  function (response) {
                $("#cargar-usuarios").find("tr:gt(0)").remove();
                refrescarUsuarios();
                $('#eliminaru').modal('hide');
            }
        });
    });
}

$(function(){
    $("#form-eventos").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("form-eventos"));
        $.ajax({
            url: "php/upload_evento.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                $("#titulo").val("");
                $("#descripcion").val("");
                $("#lugar").val("");
                $("#fecha").val("");
                $("#hora").val("");
                $("#imagen").val("");
                Mensaje("Evento agregado con exito.", 'green');
                //$("#cmr").html("Evento agregado con exito");
            }
        });
    });
});