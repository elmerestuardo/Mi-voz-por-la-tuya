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
            $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3] + "</td><td>" + response[i][4]+"</td><td>" + response[i][5]  +"</td><td>" + response[i][6]  +"</td><td>" + response[i][7]  + "</td><td>" + response[i][8]  +"</td><td><div class='edit-users'><ul><li><button type='submit' id='editar' onclick='edited("+response[i][0]+")'><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></li><li><button type='submit' onclick='borrar("+response[i][0]+")'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></button></li><li><button><i class='glyphicon glyphicon-pencil' aria-hidden='true'></i></button></li></ul></div></td></tr>").appendTo('#cargar_mascotas');
        });
        }
      });
});

$(function() {
  $('#btnMascotaNueva').click(function(e){

      nombre = $('#nombre').val();
      alert(nombre);
      edad = $('#edad').val();
      alert(edad);
      estil = $('#estil option:selected').text();
      alert(estil);
      raza = $('#raza'.val();
      alert(raza);
      peso = $('#peso').val();
      alert(peso);
      altura = $('#altura').val();
      alert(altura);
      alimento = $('#alimento').val();
      alert(alimento);
      genero = $('#genero option:selected').text();
      alert(genero);
      des =$('#des').val();
      alert(des);
      foto =$('resultado').val();
      alert(foto);

    if(nombre=="")
    {
      Mensaje("Falta el nombre de la mascota",'red');
    }
    else if(edad==""){
      Mensaje("Falta la edad de la mascota",'red');
    }
    else if(estil=="Si"){
      estil=1;
    }
    else if(estil=="No"){
      estil=0;
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
    else if(alimento==""){
    Mensaje("Falta el alimento de la mascota",'red');
  }
    else if(genero=="Hembra"){
      genero=1;
    }
    else if(genero=="Macho"){
      genero=2;
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
        "raza":raza,
        "peso":peso,
        "altura":altura,
        "alimento":alimento,
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
   	});
