$(document).ready(function(){
    //filler for tags:
    $.ajax({
        url: 'php/sendMessage.php',
        data: {messageContent: newMessageText, conID: conID},
        dataType: 'json',
        type: 'post',
        success: function(data){
            
        },
        error: function(err){

        }
    });
});