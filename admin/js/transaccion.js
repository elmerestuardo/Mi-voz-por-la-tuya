function Mensaje(mensaje,color){
  $('#mr').html(mensaje);
  $('#mr').css('color',color);
  $('#cmr').show();
  setTimeout(function(){ $('#mr').html("");  $('#cmr').css('display','none'); }, 4000);
}







function Adoptar(){
  
    fecha1 = $('#Fecha1').val();
      //alert(fecha1);
    fecha2 = $('#Fecha2').val();
    //mivozporlatuya.org/admin/php/ingresoTransaccion.php?Fecha=2016-12-31 23:59:59&Cantidad=200&Descripcion=otrosotros&Usuario=33&TipoT=2&Foto=prueba
    
    if(fecha1==""&&fecha2=="" )
    {
        $('#mens').html("No cuenta con datos.");
    $('#aviso').modal();
         //Mensaje("Falta el nombre de fecha",'red');
    }
    else 
    {
        window.location.replace("http://www.mivozporlatuya.org/admin/php/imprimir_Transaccion.php?Fecha1="+fecha1+"&Fecha2="+fecha2);
     $('#mens').html("En un momento se descargara el documento.");
    $('#aviso').modal();
    }
    
    
    
  
  
}

/*
$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_tipotran.php',
        dataType:'JSON',
        beforeSend: function () {

        },
         success: function (response) {
             $.each(response, function (i, item) {
                 $('#TipoT').append($('<option>', { 
                     value: response[i][0],
                     text : response[i][1]
                 }));
             });
      }
});
});

*/

function cambiar()
{
    id = $("#uno option:selected").val();
  
}



$(function() {
      $.ajax({
          type: 'GET',
        url:   '/admin/php/cargar_transaccion.php',
        dataType:'JSON',
        beforeSend: function () {
               
        },
        
        success: function (response) {
            var one= parseFloat(response[0][1]);
            var two= parseFloat(response[1][1]);
            var resul =one-two;
            //var uno=response[1][1].val();
            //var jaja=function(suma);
        //$.each(response, function (i, item) {
            $('<tr class="h" name="estees">').html('<td>' + response[0][0]+""+'</td><td id="primero">' + response[0][1] + '</td><td id="segundo">' + response[1][1] + '</td><td id="bueno" value="hola">' +resul).appendTo('#cargar-transacciones');
        //});
        }
      });
});

function suma1(a, b) {
    
  return parseInt(a)+parseInt(b);
}

function suma(a, b) {
    sumar=0;
    //var resultado= parseInt(a)+parseInt(b);
    sumar=parseInt(a)+parseInt(b);
    //document.dato.Mascota.value=document.dato.uno.selectIndex; 
    //document.chucho.bueno.value=document.chucho.primero.value;
    //document.getElementById(“txtTabla”).value = “Tutorial Javascript”;
   //document.getElementById("bueno").value =sumar;
    // document.chucho.bueno.value="2";
 // return parseInt(a)+parseInt(b);
    alert(sumar);
}

//////////////////////////////////////


$(function() {
  
    fecha1 = $('#Fecha1').val();
      //alert(fecha1);
    fecha2 = $('#Fecha2').val();
      //alert(fecha2);
    
      
    

    if(fecha1=="")
    {
      Mensaje("Falta el nombre de fecha",'red');
    }
    else if(fecha2==""){
      Mensaje("Falta la cantidad",'red');
    }
    else{
        
      parametros = {
        "Fecha1" : fecha1,
        "Fecha2":fecha2
      };
        $.ajax({
        data:  parametros,
        url:   '/admin/php/cargar_transaccionBalance.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {
        },
        success:  function (response) {
          if (response==null){
            Mensaje("Datos incooorrectos",'red');
            //alert(response.resultaddo);  
          }
          else{
                        
              if(response.length==2){
                one= parseFloat(response[0][1]);
                two= parseFloat(response[1][1]);
                resul =one-two;
              }else if(response.length==1){
                  if(parseInt(response[0][0])==1){
                      one=parseFloat(response[0][1]);
                      two=0;
                      resul=one-two;
                  }else{
                      one=0;
                      two=parseFloat(response[0][1]);
                      resul=one-two;
                  }
                 
              }else{
                  one=0;
                  two=0;
                  resul=one-two;
              }
               numero1 = parseFloat(resul).toFixed();
            //var uno=response[1][1].val();
            //var jaja=function(suma);
        //$.each(response, function (i, item) {
            $('<tr class="h" name="estees">').html('<td id="primero">' + one + '</td><td id="segundo">' + two + '</td><td id="bueno" value="hola">' +numero1).appendTo('#cargar-transacciones1');
              
              
              
            //window.location="/Admin/index.php";
             // Mensaje("Datos ingresados",'green');
            
          }
        }
      });
    //**
      $.ajax({
        data:  parametros,
        url:   '/admin/php/cargar_transaccionLista.php',
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
            $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3]+ "</td><td>" + response[i][4] + "</td><td>" + response[i][5]+ "</td><td><button onclick="+'"'+"MostrarImagen('"+response[i][6]+"'"+')"'+"><i class='glyphicon glyphicon-eye-open' aria-hidden='true'></i></button></td></tr>"                        ).appendTo('#cargar-transaccioneslista');
            });
              
              
              
            //window.location="/Admin/index.php";
              //Mensaje("Datos ingresados",'green');
            
          }
        }
      });
        
        ///
        
       
         
        
    }//TERMA AJAX

});

//////////////////////////////////////////


$(function() {
  $('#IngresarLista').click(function(e){
    fecha1 = $('#Fecha1').val();
      //alert(fecha1);
    fecha2 = $('#Fecha2').val();
      //alert(fecha2);
    
      
    

    if(fecha1=="")
    {
      Mensaje("Falta el nombre de fecha",'red');
    }
    else if(fecha2==""){
      Mensaje("Falta la cantidad",'red');
    }
    else{
        
      parametros = {
        "Fecha1" : fecha1,
        "Fecha2":fecha2
      };
        $.ajax({
        data:  parametros,
        url:   '/admin/php/cargar_transaccionBalance.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {
        },
        success:  function (response) {
        $("#cargar-transacciones1").find("tr:gt(0)").remove();
        if (response==null){
            Mensaje("Datos incooorrectos",'red');
            //alert(response.resultaddo);  
          }
          else{
                        
              if(response.length==2){
                one= parseFloat(response[0][1]);
                two= parseFloat(response[1][1]);
                resul =one-two;
              }else if(response.length==1){
                  if(parseInt(response[0][0])==1){
                      one=parseFloat(response[0][1]);
                      two=0;
                      resul=one-two;
                  }else{
                      one=0;
                      two=parseFloat(response[0][1]);
                      resul=one-two;
                  }
                 
              }else{
                  one=0;
                  two=0;
                  resul=one-two;
              }
               numero1 = parseFloat(resul).toFixed();
            //var uno=response[1][1].val();
            //var jaja=function(suma);
        //$.each(response, function (i, item) {
            $('<tr class="h" name="estees">').html('<td id="primero">' + one + '</td><td id="segundo">' + two + '</td><td id="bueno" value="hola">' +numero1).appendTo('#cargar-transacciones1');
              
              
              
            //window.location="/Admin/index.php";
             // Mensaje("Datos ingresados",'green');
            
          }
        }
      });
    //**
      $.ajax({
        data:  parametros,
        url:   '/admin/php/cargar_transaccionLista.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
       $("#cargar-transaccioneslista").find("tr:gt(0)").remove();
               if(response==null){
                alert("No existen datos en estas fechas");
              }
          else{
              
            $.each(response, function (i, item) {
            $('<tr>').html("<td>" + response[i][0] + "</td><td>" + response[i][1] + "</td><td>" + response[i][2] + "</td><td>" + response[i][3]+ "</td><td>" + response[i][4] + "</td><td>" + response[i][5]+ "</td><td><button onclick="+'"'+"MostrarImagen('"+response[i][6]+"'"+')"'+"><i class='glyphicon glyphicon-eye-open' aria-hidden='true'></i></button></td></tr>"                        ).appendTo('#cargar-transaccioneslista');
            });
              
              
              
            //window.location="/Admin/index.php";
             // Mensaje("Datos ingresados",'green');
            
          }
        }
      });
        
        ///
        
       
         
        
    }//TERMA AJAX
  });
});






function MostrarImagen(nombreimagen){
    $('#imagen-tran').attr('src',nombreimagen);
    $('#ventana-imagen').modal();
}

$(function(){
		$("#formulario").on("submit", function(e){
			e.preventDefault();
			datos = new FormData(document.getElementById("formulario"));
            $.ajax({
                url: "php/upload_transaccion.php",
                type: "POST",
                dataType:"html",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    //alert(response);
                     if (parseInt(response)==0){
            alert("Datos incooorrectos");
          }
          else{
           // $('#formulario').val("");
            
            
            $('#Fecha').val("");
            $('#Cantidad').val("");
            $('#Descripcion').val("");
          
            $('#Foto').val("");
            //window.location="/Admin/index.php";
              //alert("Datos ingresados");
                    //$("#resultado").html('Datos recibidos:<br>'+response);
                   // $("#resultad").html(response);
                // $('<formulario>').html('<input id="resultadu" type="hidden" value='+response+'></input>').appendTo('#formulario');
                         //'Datos recibidos:'+response).appendTo('#formulario');
                    
                }}
            });
		});
	});



function edited(codigo) {
    formulario(2, 16);
        mostrar();
}

function mostrar(){
  document.getElementById("ventana-flotanteu1").style.visibility = "visible";
  document.getElementById("ventana-flotanteu1").className = 'mostrar';
}
function ocultar(){
  document.getElementById("ventana-flotanteu1").style.visibility = "hidden";
  document.getElementById("ventana-flotanteu1").className = 'oculto';
}
function formulario(peticion, codigo){
  codigo2 = codigo;
  parametros = {
    "Peticion" : peticion,
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
        $('#ventana-flotanteu').html(response);
        $('#terminar').on("click",function(codigo){codigo = codigo2;terminar(codigo2);});
        $('#cancelar').on("click",function(){cancelar();});
      }
  });
}


