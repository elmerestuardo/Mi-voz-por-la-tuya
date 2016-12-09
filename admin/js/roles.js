$(function (){
    $.ajax({
        type: 'post',
        url: '/admin/php/roles.php',
        dataType: 'html',
        beforeSend: function(){
            
        },
        success: function(response){
            $('#roles').html(response);
        }
    });
});

$(function (){
    $.ajax({
        type: 'post',
        url: '/admin/php/perfil.php',
        dataType: 'html',
        beforeSend: function(){
            
        },
        success: function(response){
            $('#info-usuario').html(response);
        }
    });
});

$(function (){
    $.ajax({
        type: 'post',
        url: '/admin/php/datos.php',
        dataType: 'html',
        beforeSend: function(){
            
        },
        success: function(response){
            $('#datos').html(response);
        }
    });
});

function salir(){
    $.ajax({
        url:   '/php/salir.php',
        type:  'post',
        dataType:'JSON',
        beforeSend: function () {

        },
        success:  function (response) {
            if (parseInt(response.resultado)==1){
            window.location.replace("http://mivozporlatuya.org");
            }
        }
    });
}