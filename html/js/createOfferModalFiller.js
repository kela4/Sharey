$(document).ready(function(){
    //filler for tags:
    $.ajax({
        url: 'php/sendMessage.php',
        data: {},
        dataType: 'json',
        type: 'post',
        success: function(data){
            
        },
        error: function(err){

        }
    });
});