function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_mascotas.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
           $.each(response, function (i, item) {

               $('<tr>').html("<td>" + response[i][0] +
                "</td><td>" + response[i][1] +
                "</td><td>" + response[i][2]+
                "</td><td>" + response[i][3]+
                "</td><td>" + response[i][4] +
                "</td><td>" + response[i][5]+" años"  +
                "</td><td>" + response[i][6] +
                "</td><td>" + response[i][7] +" cms" +
                 "</td><td>" + response[i][8] +" lbs"
                 + "</td><td><button onclick='edited("
                 +response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button><button onclick="
                 +'"'+"Mostrar('"+response[i][0]+"'"+')"'
                 +"><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></td></tr>" ).
                 appendTo('#cargar_mascotas');


             });
        }
      });
});




function refrescarMascotas(){
  $.ajax({
      type: 'GET',
    url:   '/admin/php/cargar_mascotas.php',
    dataType:'JSON',
    beforeSend: function () {

    },
        success: function (response) {
          $("#cargar_mascotas").find("tr:gt(0)").remove();
          $('#ventanaM').modal('hide');
          $.each(response, function (i, item) {

              $('<tr>').html("<td>" + response[i][0] +
               "</td><td>" + response[i][1] +
               "</td><td>" + response[i][2]+
               "</td><td>" + response[i][3]+
               "</td><td>" + response[i][4] +
               "</td><td>" + response[i][5]+" años"  +
               "</td><td>" + response[i][6] +
               "</td><td>" + response[i][7] +" cms" +
                "</td><td>" + response[i][8] +" lbs"
                + "</td><td><button onclick='edited("
                +response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button><button onclick="
                +'"'+"Mostrar('"+response[i][0]+"'"+')"'
                +"><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></td></tr>" ).
                appendTo('#cargar_mascotas');






          //$('#ventanaM').modal('hide');
          /*$.each(response, function (i, item) {
            $('<tr>').html("<td>" + response[i][0] +
             "</td><td>" + response[i][1] +
             "</td><td>" + response[i][2]+
             "</td><td>" + response[i][3]+
             "</td><td>" + response[i][4] +
             "</td><td>" + response[i][5]+" años"  +
             "</td><td>" + response[i][6] +
             "</td><td>" + response[i][7] +" cms" +
             "</td><td>" + response[i][8] +" lbs" +
             "</td><td><button type='submit' id='editar' onclick='edited("+
             response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></td></tr>" ).
             appendTo('#cargar_mascotas');*/



             /*
             "</td><td><button type='submit' id='editar' onclick='edited("+
             response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button>
             <button onclick="+
             '"'+"Borrar('"+response[i][0]+"','"+response[i][2]+"'"+')"'+
             "><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></td></tr>" ).
             appendTo('#cargar_mascotas');*/

             /*
             "</td><td><button type='submit' id='editar' onclick='edited("+
             response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></td></tr>" ).
             appendTo('#cargar_mascotas');*/

            });
        }
      });
}

function Mostrar(id){

    $('#idm').attr('value',id);
    $('#ventanaM').modal();
}



$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_alimento.php',
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
function cambiar()
{
    id = $("#idalimento option:selected").val();
//  alert(id);
}


function formulario(peticion, codigo){
  codigo2 = codigo;
  parametros = {
    "Peticion" : peticion,
    "Codigou" : codigo,
  };
  $.ajax({
    data:parametros,
      url:   '/admin/php/formM.php',
      type:  'post',
      dataType:'html',
      beforeSend: function () {
      },
      success:  function (response, codigo) {
        codigo = codigo2;
        $('#mm').html(response);
        $('#terminar').on("click",function(codigo){codigo = codigo2;terminar(codigo2);});
        $('#cancelar').on("click",function(){cancelar();});
      }
  });
}

function edited(codigo) {
    formulario(2, codigo);
    $('#aviso').modal();
    //alert("hola");
}

function terminar(codigo){
  //rol=$('#rol option:selected').text();
  estil = $("#estil option:selected").val();
  peso = $('#peso').val();
  altura = $('#altura').val();
  idalimento = $("#idalimento option:selected").val();


  if(idalimento=="")

  {
    MensajeA("Falta el alimento","red");
  }
  else{
      parametros = {
        "idm" :codigo,
        "estil" :estil,
        "peso":peso,
        "altura":altura,
        "idalimento":idalimento,
      };
      //alert(codigo+ estil +altura+peso+idalimento);
      $.ajax({
        data:  parametros,
        url:   '/admin/php/actualizarMascota.php',
        type:  'post',
        dataType:'html',
        beforeSend: function () {

        },
        success:  function (response) {
            $("#cargar_mascotas").find("tr:gt(0)").remove();
            refrescarMascotas();
            $('#aviso').modal('hide');
        }
      });
  }
}


//QuitarMascota

$(function() {
  $('#quitarMascota').click(function(e){
    idm = $("#idm").val();
    //alert(idm);


    if(idm==""){
      Mensaje("Por favor, ingrese id de mascota",'red');
    }

        else{
        parametros = {
        "idm" :idm
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/quitarMascota.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },

        success:  function (response) {
            $("#cargar_mascotas").find("tr:gt(0)").remove();
            refrescarMascotas();

          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos",'red');
          }
          else{

            $('#idm').val("");


            //window.location="/Admin/index.php";


          }

        }
      });

    }
  });
});











//Actualizar mascota
$(function() {
  $('#ActualizarMascota').click(function(e){
    idm = $("#idm").val();
    //alert(idm);
    estil = $("#estil option:selected").val();
    //alert(estil);
    peso = $('#peso').val();
    //alert(peso);
    altura = $('#altura').val();
    //alert(altura);
    idalimento = $("#idalimento option:selected").val();
    //alert(idalimento);


    if(peso==""){
      Mensaje("Por favor, ingrese nuevo peso de la mascota",'red');
    }
    else if(altura==""){
      Mensaje("Por favor, ingrese nueva altura de la mascota",'red');
    }
    else if(idalimento=="noasignado"){
      Mensaje("Por favor, ingrese nuevo alimento",'red');
    }
    else{
      parametros = {
        "idm" :idm,
        "estil" :estil,
        "peso":peso,
        "altura":altura,
        "idalimento":idalimento
      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/actualizarMascota.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },

        success:  function (response) {
            $("#cargar_mascotas").find("tr:gt(0)").remove();
            refrescarMascotas();

          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos",'red');
          }
          else{

            $('#idm').val("");
            $('#estil').val("");
            $('#peso').val("");
            $('#altura').val("");
            $('#idalimento').val("");

            //window.location="/Admin/index.php";


          }

        }
      });

    }
  });
});



$(function(){
    $("#actualizarM").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("actualizarM"));
        $.ajax({
            url: "php/actualizarMascota.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
              refrescarMascotas();
          //    $('#idm').val("");
            //  $('#estil').val("");
              //$('#peso').val("");
              //$('#altura').val("");
              //$('#idalimento').val("");


              $("#cmr").html('Datos recibidos:<br>'+response);
            }
        });
    });
});
