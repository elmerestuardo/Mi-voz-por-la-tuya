function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}

$(function() {
  $('#btnNuevaRaza').click(function(e){
    Nraza = $('#Nraza').val();
      alert(Nraza);

    if(Nraza=="")
    {
      Mensaje("¡No ingreso ninguna raza!",'red');
    }
      else{
      parametros = {
        "Nraza":Nraza,


      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/ingresoRazas.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos por favor, revisar",'red');
          }
          else{
            $('#Nraza').val("");

            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }
        }
      });

    }
  });
});

$(function(){
    $('#agregar-raza').click(function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioRaza"));
        $.ajax({
            url: "php/ingresoRazas.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
                $('#Nraza').val("");
                $("#cmr").html('Datos recibidos exitosamente!<br>');
                $("#m-raza").modal('hide');
                actualizar_razas();
            }
        });
    });
});

function actualizar_razas(){
    $('#raza').find('option').remove().end();
    $.ajax({
        type: 'GET',
        url:   '/admin/php/cargar_raza.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#raza').append('<option value="'+response[i][0]+'">'+response[i][1]+'</option>').val(response[i][0]);
             });
         }
    });
}

function nuevaraza(){
    $('#m-raza').modal();
}

$(function(){
    $("#formularioRaza").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioRaza"));
        $.ajax({
            url: "php/ingresoRazas.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
              $('#Nraza').val("");


              $("#cmr").html('Datos recibidos exitosamente!<br>');
            }
        });
    });
});
