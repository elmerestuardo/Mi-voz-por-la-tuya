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
            $('<tr>').html("<td>" +
             response[i][0] + "</td><td>" +
             response[i][1] + "</td><td>" +
             response[i][2] + "</td><td>" +
             response[i][3] + "</td><td>" +
             response[i][4]+"</td><td>" +
             response[i][5]+" años"  +"</td><td>" +
             response[i][6]  +"</td><td>" +
             response[i][7] +" cms" + "</td><td>" +
             response[i][8] +" lbs"  ).appendTo('#cargar_mascotas');
        });
        }
      });
});

$(function() {
  $('#btnMascotaNuevaa').click(function(e){
    nombre = $('#nombre').val();
    alert(nombre);
    edad = $('#edad').val();
    alert(edad);
    estil = $('#estil').val();
    alert(estil);
    raza = $("#raza option:selected").val();
    alert(raza);
    peso = $('#peso').val();
    alert(peso);
    altura = $('#altura').val();
    alert(altura);
    idalimento = $("#idalimento option:selected").val();
    alert(idalimento);
    genero = $("#genero option:selected").val();
    alert(genero);
    des =$('#des').val();
    alert(des);
    foto =$('#resultado').val();
    alert(foto);

    if(nombre=="")
    {
      Mensaje("Falta el nombre de la mascota",'red');
    }
    else if(edad==""){
      Mensaje("Falta la edad de la mascota",'red');
    }
    else if(estil==""){
      Mensaje("Falta el estado de salud de la mascota",'red');
    }

    else if(raza==""){
      Mensaje("Falta la raza de la mascota",'red');
    }
    else if(peso==""){
      Mensaje("Falta el peso de la mascota",'red');
    }
      else if(altura==""){
      Mensaje("Falta la altura de la mascota",'red');
    }
    else if(idalimento==""){
    Mensaje("Falta el alimento de la mascota",'red');
  }
    else if(genero==""){
    Mensaje("Falta el genero de la mascota",'red');
    }
    else if(des==""){
    Mensaje("Falta la descripcion de la foto",'red');
    }
    else if(foto==""){
    Mensaje("Falta la foto de la mascota, por favor agregarla",'red');
    }


      else{
      parametros = {
        "nombre" :nombre,
        "edad":edad,
        "estil":estil,
        "estado":estado,
        "raza":raza,
        "peso":peso,
        "altura":altura,
        "idalimento":idalimento,
        "genero":genero,
        "des":des,
        "foto":foto

      };
      $.ajax({
        data:  parametros,
        url:   '/admin/php/ingresoMascota.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
          if (parseInt(response.resultaddo)==0){
            Mensaje("Datos incorrectos por favor, revisar",'red');
          }
          else{
            $('#nombre').val("");
            $('#edad').val("");
            $('#estil').val("");
            $('#raza').val("");
            $('#peso').val("");
            $('#altura').val("");
            $('#idalimento').val("");
            $('#genero').val("");
            $('#foto').val("");


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
        url:   '/admin/php/cargar_raza.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#raza').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]
                 }));
             });
      }
});
});

function cambiar()
{
    id = $("#raza option:selected").val();
  //  alert(id);
}

$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_generos.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#genero').append($('<option>', {
                     value: response[i][0],
                     text : response[i][1]
                 }));
             });
      }
});
});

function cambiar1()
{
    id = $("#genero option:selected").val();
    //alert(id);
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

function cambiar2()
{
    id = $("#idalimento option:selected").val();
  //alert(id);
}

$(function(){
    $("#formularioMascotas").on("submit", function(e){
        e.preventDefault();
        datos = new FormData(document.getElementById("formularioMascotas"));
        $.ajax({
            url: "php/uploadMascota.php",
            type: "POST",
            dataType:"html",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {

              $('#nombre').val("");
              $('#edad').val("");
              $('#peso').val("");
              $('#altura').val("");
              $('#idalimento').val("");
              $('#des').val("");

            //  $("#cmr").html('Datos recibidos:<br>'+response);
            }
        });
    });
});
