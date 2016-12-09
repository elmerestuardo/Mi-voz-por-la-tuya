function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}

$(function() {
  $('#btnNuevoAlimento').click(function(e){
    Nalimento = $('#Nalimento').val();
      alert(Nalimento);

    if(Nalimento=="")
    {
      Mensaje("¡No ingreso ningun alimento!",'red');
    }
      else{
      parametros = {
        "Nalimento":Nalimento,
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/ingresoAlimento.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos por favor, revisar",'red');
          }
          else{
            $('#Nalimento').val("");

            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');
          }
        }
      });

    }
  });
});

$(function(){
    $('#agregar-alimento').click(function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioAlimento"));
        $.ajax({
            url: "php/ingresoAlimento.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
                $('#Nalimento').val("");
                $("#cmr").html('Datos recibidos exitosamente!<br>');
                $('#m-alimento').modal('hide');
                actualizar_alimento();
            }
        });
    }) 
});

$(function(){
    $("#formularioAlimento").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioAlimento"));
        $.ajax({
            url: "php/ingresoAlimento.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
                $('#Nalimento').val("");
                $("#cmr").html('Datos recibidos exitosamente!<br>');
            }
        });
    });
});

function nuevoalimento(){
    $('#m-alimento').modal();
}

function actualizar_alimento(){
    $.ajax({
        type: 'GET',
        url:   '/admin/php/cargar_alimento.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#idalimento').append('<option value="'+response[i][0]+'">'+response[i][1]+'</option>').val(response[i][0]);
             });
         }
    });
}