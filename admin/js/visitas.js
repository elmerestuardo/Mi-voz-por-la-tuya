function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}
$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_visitas.php',
        dataType:'JSON',
        beforeSend: function () {

        },
        success: function (response) {
        $.each(response, function (i, item) {
            $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3] +"</td><td>" + response[i][4]  ).appendTo('#cargar-visitas');
        });
        }
      });
});
$(function() {
  $('#btnNuevaVisita').click(function(e){
    fecha = $('#fecha').val();
    //alert(fecha);
    observaciones = $('#observaciones').val();
    //alert(observaciones);
    idalimento = $("#idalimento option:selected").val();
    //alert(idalimento);


    if(fecha=="")
    {
      Mensaje("Falta la fecha de la visita",'red');
    }
    else if(observaciones==""){
      Mensaje("Faltaron las observaciones de la visita",'red');
    }
    else if(idalimento==""){
      Mensaje("Falta el id de la visita",'red');
    }

      else{
      parametros = {
        "fecha" :fecha,
        "observaciones":observaciones,
        "idalimento":idalimento

      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/ingresoVisitas.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos por favor, revisar",'red');
          }
          else{
            $('#fecha').val("");
            $('#observaciones').val("");
            $('#idalimento').val("");

            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }
        }
      });

    }
  });
});

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_combo.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#idalimento').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]
                 }));
             });
      }
});
});

function cambiar2()
{
    id = $("#idalimento option:selected").val();
//  alert(id);
}

$(function(){
    $("#formularioVisita").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioVisita"));
        $.ajax({
            url: "php/ingresoVisitas.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
              $('#fecha').val("");
              $('#observaciones').val("");
              $('#idalimento').val("");


              $("#cmr").html('Datos recibidos exitosamente!<br>');
            }
        });
    });
});
