function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}

$(function() {
  $('#formulario1').on("submit",function(e){
     e.preventDefault();
    fechain = $('#FechaIn').val();
    //alert(fechain);
    fechafin = $('#FechaFin').val();
    //alert(fechafin);
    persona = $("#uno option:selected").val();
    //alert(persona);
    mascota = $("#dos option:selected").val();
    //alert(mascota);
      //personaa== $("#uno option:selected").text();
     //mascotaa = $("#dos option:selected").text();

    if(fechain  =="")
    {
      Mensaje("Falta el campo fecha Inicial",'red');
    }
    else if(fechafin==""){
      Mensaje("Falta el campo fecha Final",'red');
    }
    else if(persona=="noasignado"){
      Mensaje("Falta el campo persona",'red');
    }
    else if(mascota=="noasignado"){
      Mensaje("Falta el campo mascota",'red');
    }
    else{
      parametros = {
        "FechaIn" : fechain,
        "FechaFin":fechafin,
        "Persona":persona,
        "Mascota":mascota
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/ingresoHogar.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },

        success:  function (response) {
            // alert(response.resultaddo);
            //rpersona();
            $('#dos').find('option').remove().end();
            rmascota();
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incooorrectos",'red');
          }
          else{
            $('#FechaIn').val("");
            $('#FechaFin').val("");
            $('#Persona').val("");
            $('#Mascota').val("");



            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }

        }
      });

    }
  });
});

function refrescar() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_hogar.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
        $.each(response, function (i, item) {
            $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][6] + "</td><td>" + response[i][7] + "</td><td>" + response[i][3]+ "</td><td>" + response[i][4] + "</td><td><button onclick="+'"'+"MostrarImagen('"+response[i][6]+"'"+')"'+"><i class='glyphicon glyphicon-eye-open' aria-hidden='true'></i></button></td><td><button onclick='edited("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button><button onclick="+'"'+"Borrar('"+response[i][0]+"','"+response[i][2]+"'"+')"'+"><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></td></tr>" ).appendTo('#cargar-hogares');
        });
        }
      });
}

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_hogar.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
        $.each(response, function (i, item) {
            $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][6] + "</td><td>" + response[i][7] + "</td><td>" + response[i][3]+ "</td><td>" + response[i][4] + "</td><td><button onclick='edited("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button><button onclick="+'"'+"Borrar('"+response[i][0]+"','"+response[i][2]+"'"+')"'+"><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></td></tr>" ).appendTo('#cargar-hogares');
        });
        }
      });
});

function MostrarImagen(nombreimagen){
    $('#imagen-tran').attr('src',nombreimagen);
    $('#ventana-imagen').modal();
}


function Borrar(nombreimagen,nom2){
    //$('#imagen-tran').attr('src',nombreimagen);
    $('#hogar').attr('value',nombreimagen);
    $('#masco').attr('value',nom2);
    $('#ventana-hogareliminar').modal();
}


function rpersona() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_persona.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#uno').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]+ " " +response[i][2]
                 }));
             });
      }
});
}
function rmascota() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_mascotahogar.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#dos').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]
                 }));
             });
      }
});
}


$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_persona.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#uno').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]+ " " +response[i][2]
                 }));
             });
      }
});
});

function cambiar()
{
    id = $("#uno option:selected").val();

}

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_mascotahogar.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#dos').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]
                 }));
             });
      }
});
});

function cambiar1()
{
    id = $("#dos option:selected").val();
}





function edited(codigo) {
    formulario(2, codigo);
    $('#ventana-hogar').modal();
}

function mostrar(){
  document.getElementById("ventana-flotanteH").style.visibility = "visible";
  document.getElementById("ventana-flotanteH").className = 'mostrar';
}
function ocultar(){
  document.getElementById("ventana-flotanteH").style.visibility = "hidden";
  document.getElementById("ventana-flotanteH").className = 'oculto';
}

function formulario(peticion, codigo){
  codigo2 = codigo;
  parametros = {
    "Peticion" : peticion,
    "Codigou" : codigo,
  };
  $.ajax({
    data:parametros,
      url:   '/admin/php/form1.php',
      type:  'post',
      dataType:'html',
      beforeSend: function () {
      },
      success:  function (response, codigo) {
        codigo = codigo2;
        $('#us').html(response);
        //$('#terminar').on("click",function(codigo){codigo = codigo2;terminar(codigo2);});
        //$('#cancelar').on("click",function(){cancelar();});
      }
  });
}


$(function() {
  $('#ActualizarHogar').click(function(e){
    fechain = $('#FechaIn').val();
      //alert(fechain);
    fechafin = $('#FechaFin').val();
      //alert(fechafin);
    persona = $("#per option:selected").val();
      //alert(persona);
   hogar = $('#idhogar').val();
      //alert(hogar);



    if(fechain  =="")
    {
      Mensaje("Falta el campo fecha Inicial",'red');
    }
    else if(fechafin==""){
      Mensaje("Falta el campo fecha Final",'red');
    }
    else if(persona=="noasignado"){
      Mensaje("Falta el campo persona",'red');
    }
    else if(hogar==""){
      Mensaje("Falta el campo hogar",'red');
    }
    else{
      parametros = {
        "FechaIn" : fechain,
        "FechaFin":fechafin,
        "Persona":persona,
        "idhogar":hogar
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/actualizarHogar.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },

        success:  function (response) {
            $("#cargar-hogares").find("tr:gt(0)").remove();
        refrescar();
            // alert(response.resultaddo);
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incooorrectos",'red');
          }
          else{
            /*$('#FechaIn').val("");
            $('#FechaFin').val("");
            $('#Persona').val("");
            $('#idhogar').val("");
            */


            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }

        }
      });

    }
  });
});



$(function() {
  $('#EliminarHogar').click(function(e){
    fechainn = $('#hogar').val();
     // alert(fechainn);
    fechafinn = $('#masco').val();
      //alert(fechafinn);



    if(fechainn  =="")
    {
      Mensaje("Falta el campo fecha Inicial",'red');
    }
    else if(fechafinn==""){
      Mensaje("Falta el campo fecha Final",'red');
    }

    else{
      parametros = {
        "FechaIn" : fechainn,
        "FechaFin":fechafinn,

      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/eliminarHogar.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },

        success:  function (response) {
            // alert(response.resultaddo);
            $("#cargar-hogares").find("tr:gt(0)").remove();
            refrescar();
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incooorrectos",'red');
          }
          else{




            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }

        }
      });

    }
  });
});

function Adoptar(){


    window.location.replace("http://www.mivozporlatuya.org/admin/php/imprimir_Hogar.php");
    $('#mens').html("En un momento se descargara el documento.");
    $('#aviso').modal();

}

/*
$(function(){
		$("#formulario").on("submit", function(e){
			e.preventDefault();
			datos = new FormData(document.getElementById("formulario"));
            $.ajax({
                url: "php/upload_hogar.php",
                type: "POST",
                dataType:"html",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    alert(response);
                     if (parseInt(response)==0){
            alert("Datos incooorrectos");
          }
          else{
           // $('#formulario').val("");
                        
                //window.location="/Admin/index.php";
              alert("Datos ingresados");
                    //$("#resultado").html('Datos recibidos:<br>'+response);
                   // $("#resultad").html(response);
                // $('<formulario>').html('<input id="resultadu" type="hidden" value='+response+'></input>').appendTo('#formulario');
                         //'Datos recibidos:'+response).appendTo('#formulario');
                    
                }}
            });
		});
	});*/
