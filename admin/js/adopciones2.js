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
            response[i][1] + "</td><td>" +
            response[i][2] + "</td><td>" +
            response[i][3] +"</td><td>" +
            response[i][4] +"</td><td>" +
            response[i][5]+"</td>").appendTo('#cargar_adopciones');
        });
        }
      });
});

function refrescarAdopciones(){
  $.ajax({
    type: 'GET',
    url:   '/admin/php/cargar_adopcionesF.php',
    dataType:'JSON',
    beforeSend: function () {

    },
        success: function (response) {
          $("#cargar_adopciones2").find("tr:gt(0)").remove();
          //$('#ventanaM').modal('hide');
          $.each(response, function (i, item) {
              $('<tr>').html("<td>" +
              response[i][0] + "</td><td>" +
              response[i][1] + "</td><td>" +
              response[i][2] + "</td><td>" +
              response[i][3] +"</td><td>" +
              response[i][4] +"</td><td>" +
              response[i][5]+"</td>").appendTo('#cargar_adopciones');


            });
        }
      });
}





$(function() {
  $('#AdopcionesF').click(function(e){
    fecha1 = $('#Fecha1').val();
      //alert(fecha1);
    fecha2 = $('#Fecha2').val();
      //alert(fecha2);


    if(fecha1=="")
    {
      Mensaje("Falta fecha inicial",'red');
    }
    else if(fecha2==""){
      Mensaje("Falta fecha fin",'red');
    }
    else{

      parametros = {
        "Fecha1":fecha1,
        "Fecha2":fecha2
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/cargar_adopcionesF.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
               if(response==null){
                alert("No existen datos en estas fechas");
              }
          else{

            $.each(response, function (i, item) {
                $('<tr>').html("<td>" +
                response[i][0] + "</td><td>" +
                response[i][1] + "</td><td>" +
                response[i][2] + "</td><td>" +
                response[i][3] +"</td><td>" +
                response[i][4] +"</td><td>" +
                response[i][5]+"</td>").appendTo('#cargar_adopciones2');
            });
            //window.location="/Admin/index.php";
              Mensaje("Datos ingresados",'green');

          }
        }
      });

          }//TERMA AJAX
  });
});
