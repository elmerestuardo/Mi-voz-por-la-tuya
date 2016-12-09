function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_mascotasA.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
        $.each(response, function (i, item) {
            $('<tr>').html("<td>" + response[i][0] +
             "</td><td>" + response[i][1] +
             "</td><td>" + response[i][2] +
             "</td><td>" + response[i][3]+
             "</td><td>" + response[i][4] +
             "</td><td>" + response[i][5]+" años"  +
             "</td><td>" + response[i][6] +
             "</td><td>" + response[i][7] +" cms" +
             "</td><td>" + response[i][8] +" lbs" +
             "</td><td><button type='submit' id='editar' onclick='edited("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></td></tr>" ).
             appendTo('#cargar_mascotas');
        });
        }
      });
});
