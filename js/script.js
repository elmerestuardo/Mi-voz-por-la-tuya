function mostrar(){
  document.getElementById("ventana-flotante").style.visibility = "visible";
  document.getElementById("ventana-flotante").className = 'mostrar';
  $('#ventana-flotante').focus();
}
function ocultar(){
  document.getElementById("ventana-flotante").style.visibility = "hidden";
  document.getElementById("ventana-flotante").className = 'oculto';
}
function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 6000);
}
function MensajeI(mensaje,color){
  $('#mi').html(mensaje);
  $('#mi').css('color',color);
  $('#cmi').show();
  setTimeout(function(){ $('#mi').html("");  $('#cmi').css('display','none'); }, 6000);
}
function MensajeA(mensaje,color){
  $('#ma').html(mensaje);
  $('#ma').css('color',color);
  $('#cma').show();
  setTimeout(function(){ $('#ma').html("");  $('#cma').css('display','none'); }, 6000);
}
function MensajeV(mensaje,color){
  $('#mv').html(mensaje);
  $('#mv').css('color',color);
  $('#cmv').show();
  setTimeout(function(){ $('#mv').html("");  $('#cmv').css('display','none'); },6000);
}
function MensajeR(mensaje,color){
  $('#mrr').html(mensaje);
  $('#mrr').css('color',color);
  $('#cmrr').show();
  setTimeout(function(){ $('#mrr').html("");  $('#cmrr').css('display','none'); }, 6000);
}
function iniciar(e){
    e.preventDefault();
    usuario = $('#ui').val();
    clave = $('#ci').val();
    if(usuario==""){
      $('#ui').focus();
      MensajeI("Falta el nombre de usuario",'red');
    }
    else if(clave==""){
      $('#ci').focus();
      MensajeI("Falta la contraseña",'red');
    }
    else{
      parametros = {
        "Usuario" : usuario,
        "Clave":clave
      };
      $.ajax({
        data:  parametros,
        url:   '/php/inicio.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (response.resultado==1){
            window.location.replace("http://mivozporlatuya.org");

          }else if(response.resultado==2){
            MensajeI("Cuenta deshabilitada",'red');
          }
          else{
            $('#ui').focus();
            MensajeI("Datos incorrectos",'red');
          }
        }
      });
    }
}
function registrar(e){
    e.preventDefault();
    usuario = $('#ur').val();
    clave = $('#clr').val();
    correo= $('#cr').val();
    confirmacion = $('#cclr').val();
    if(usuario==""){
      $('#ur').focus();
      Mensaje("Falta el nombre de usuario",'red');
    }
    else if(correo==""){
      $('#cr').focus();
      Mensaje("Falta el correo",'red');
    }
    else if(clave==""){
      $('#clr').focus();
      Mensaje("Falta la contraseña",'red');
    }
    else if(confirmacion!=clave){
        $('#cclr').val("");
        $('#cclr').focus();
      Mensaje("La contraseña de confirmacion es incorrecta",'red');
    }
    else{
      parametros = {
        "Usuario" : usuario,
        "Correo" : correo,
        "Clave":clave
      };
      $.ajax({
        data:  parametros,
        url:   '/php/registro.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultado)==0){
            Mensaje("Ocurrio un error al registrar",'red');
          }
          else if (parseInt(response.resultado)==2) {
            $('#ur').focus();
            Mensaje("El nombre de usuario ya existe",'red');
          }
          else if (parseInt(response.resultado)==3) {
            $('#cr').focus();
            Mensaje("El correo ya esta en uso",'red');
          }
          else{
            $('#ur').val("");
            $('#clr').val("");
            $('#cr').val("");
            $('#cclr').val("");
            Mensaje("En unos minutos recibira un correo para confirmar su registro",'green');
          }
        }
      });
    }
}
function cambiar(){
  formulario(2);
}
function terminar(e){
    e.preventDefault();
  nombre =$('#nombre-usuario').val();
  apellido=$('#apellido-usuario').val();
  telefono =$('#telefono-usuario').val();
  direccion =$('#direccion-usuario').val();
  if(nombre==""){
    MensajeA("Falta el nombre","red");
  }else if(apellido==""){
    MensajeA("Falta el apellido","red");
  }else if(telefono==""){
    MensajeA("Falta el telefono","red");
  }else if(direccion==""){
    MensajeA("Falta la direccion","red");
  }
  else{
      parametros = {
        "Nombre" : nombre,
        "Apellido" : apellido,
        "Telefono":telefono,
        "Direccion":direccion
      };
      $.ajax({
        data:  parametros,
        url:   '/php/actualizarp.php',
        type:  'post',
        dataType:'html',
        beforeSend: function () {

        },
        success:  function (response) {
          formulario(1);
        }
      });
  }
}
function cancelar(){
  formulario(1);
}
function salir(){
  $.ajax({
        url:   '/php/salir.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultado)==1){
            window.location.replace("http://mivozporlatuya.org");
          }
        }
      });
}
function formulariolinks(){
  $('#login-form-link').on("click",function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').on("click",function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });
}

function formulario(peticion){
  parametros = {
    "Peticion" : peticion
  };
  $.ajax({
    data:parametros,
      url:   '/php/formulariou.php',
      type:  'post',
      dataType:'html',
      beforeSend: function () {
      },
      success:  function (response) {
        $('#ventana-flotante').html(response);
        $('#salir').on("click",function(){salir();});
        $('#login-form').on("submit",function(e){iniciar(e);});
        $('#register-form').on("submit",function(e){registrar(e);});
        $('#cambiar').on("click",function(){cambiar();});
        $('#datos-form').on("submit",function(e){terminar(e);});
        $('#cancelar').on("click",function(){cancelar();});
        $('#clave-olvidada').on("click",function(){$('#recuperar').modal();});

        formulariolinks();
      }
  });

}
function Respuestas(respuestas){
  rs ="";
  for (i = 0; i <respuestas.length; i++) {
   rs=rs+"&r"+i+"="+respuestas[i];
  }
  return rs;
}
function MostrarSlide(){
  $('#formulario-adoptar').addClass('is-visible');
}
function OcultarSlide(){
  $('#formulario-adoptar').removeClass('is-visible');
}
function Adoptar(codigomascota,numeropreguntas){
  respuestas =[];
  for (i = 1; i <= numeropreguntas; i++) {
    if($("#respuesta"+i+"1")[0] && $("#respuesta"+i+"2")[0]){
      if($("#respuesta"+i+"1").is(':checked')){
        respuestas.push("Si");
      }else if($("#respuesta"+i+"2").is(':checked')){
        respuestas.push("No");
      }
    }else{
      if($('#respuesta'+i).val().length>0){
        respuestas.push($('#respuesta'+i).val());
      }
    }
  }
  if(respuestas.length==numeropreguntas){
    window.location.replace("http://www.mivozporlatuya.org/php/adoptar.php?Codigo_Mascota="+codigomascota+Respuestas(respuestas));
    $('#mens').html("Para confimar la adopcion solicitada, debes imprimir el formulario que se ha descargado a tu computadora y presentarlo a la asociacion junto con una copia de tu DPI.");
    $('#aviso').modal();
    $('#aviso').on('hide.bs.modal', function () {
      OcultarSlide();
    });
  }
  else{
    $('#mens').html("Debes responder todas las preguntas");
    $('#aviso').modal();
    $('#aviso').on('hide.bs.modal', function () {
      MostrarSlide();
    });
  }
}
function ComprobarDatos(codigomascota){
  $.ajax({
      url: '/php/comprobard.php',
      type:  'post',
      dataType:'JSON',
      beforeSend: function () {
      },
      success:  function (response) {
        if(response.resultado==0){
          window.location.href="#";
          mostrar();
          MensajeI('Inicia sesion para adoptar','green');
          Mensaje('Inicia sesion para adoptar','green');
        }else if(response.resultado==1){
          window.location.href="#";
          mostrar();
          MensajeV('Actualiza tus datos personales para adoptar','green');
          MensajeA('Actualiza tus datos personales para adoptar','green');
        }else{
          parametros = {
            "Codigo_Mascota" : codigomascota
          };
          $.ajax({
              data:parametros,
              url:   '/php/formularioa.php',
              type:  'post',
              dataType:'html',
              beforeSend: function () {
              },
              success:  function (response) {
                $('#preguntas').html(response);
                MostrarSlide();
              }
          });

        }
      }
  });
}
function Recuperar(e){
	e.preventDefault();
	correo=$('#emailr').val();
	parametros = {
	    "Correo" : correo
	  };
	  $.ajax({
	      data:parametros,
	      url:   '/php/recuperar.php',
	      type:  'post',
	      dataType:'JSON',
	      beforeSend: function () {
	      },
	      success:  function (response) {
	        if(response.resultado==1){
	        	$('#emailr').val("");
	        	MensajeR('En unos minutos recibiras un correo para restablecer tu contraseña','green');
	        }else if(response.resultado==2){
	        	MensajeR('El correo no esta registrado en el sistema','red');
	        }else if(response.resultado==0){
	        	MensajeR('Error al recuperar la cuenta','red');
	        }
	      }
	  });
}
$(function() {
  formulario(1);
  $('#formulario-recuperacion').on("submit",function(e){Recuperar(e);});
});
