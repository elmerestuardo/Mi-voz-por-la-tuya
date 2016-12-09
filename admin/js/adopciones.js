function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}

$(function() {
      $.ajax({
        type: 'GET',
        url:   '/admin/php/cargar_adopciones.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
        $.each(response, function (i, item) {
              $('<tr>').html("<td>" +
               response[i][0] + "</td><td>" +
               response[i][0] + "</td><td>" +
               response[i][0] + "</td><td>" +
               response[i][0] + "</td><td>" +
               response[i][0]+"</td>" ).appendTo('#cargar_adopciones');

        });
        }
      });
});
$(function() {
  $('#btnNuevaAdopcion').click(function(e){
    lugar = $('#lugar').val();
    //alert(lugar);
    fecha = $('#fecha').val();
    //alert(fecha);
    idPer = $('#idPer').val();
    //alert(idPer);
    fechanac = $('#fechanac').val();
    //alert(fechanac);
    dpi = $('#dpi').val();
    //alert(dpi);
    idMascota = $('#idMascota').val();
    //alert(idMascota);
    idFormulario = $('#idFormulario').val();
    //alert(idFormulario);




    if(lugar=="")
    {
      Mensaje("Falta indicar el lugar de la adopcion",'red');
    }
    else if(fecha==""){
      Mensaje("Falta indicar la fecha de la adopcion",'red');
    }

    else if(idPer==""){
      Mensaje("Falta indicar el id del adoptante de la adopcion",'red');
    }
    else if(fechanac==""){
      Mensaje("Falta indicar el la fecha de nacimiento del adoptante",'red');
    }
    else if(dpi==""){
      Mensaje("Falta indicar el DPI del adoptante",'red');
    }
    else if (idMascota==""){
      Mensaje("Falta indicar el id de la mascota",'red');
    }
    else if (idFormulario=="") {
      Mensaje("Falta indicar el id del formulario");
    }

      else{
      parametros = {
        "lugar" : lugar,
        "fecha":fecha,
        "idPer":idPer,
        "fechanac":fechanac,
        "dpi":dpi,
        "idMascota":idMascota,
        "idFormulario":idFormulario
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/ingresoAdopcion.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos por favor, revisar",'red');
          }
          else{
            $('#lugar').val("");
            $('#fecha').val("");
            $('#idPer').val("");
            $('#fechanac').val("");
            $('#dpi').val("");
            $('#idMascota').val("");
            $('#idFormulario').val("");

            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }
        }
      });

    }
  });
});

$(function(){
    $("#formularioAdopciones").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioAdopciones"));
        $.ajax({
            url: "php/ingresoAdopcion.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
              $('#lugar').val("");


              $("#cmr").html('Datos recibidos exitosamente!<br>');
            }
        });
    });
});
