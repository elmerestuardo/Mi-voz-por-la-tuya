$(function (){
    $.ajax({
        type: 'post',
        url: '/admin/php/info.php',
        dataType: 'html',
        beforeSend: function(){
            
        },
        success: function(response){
            $('.logo-name').html(response);
        }
    });
});