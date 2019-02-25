$(document).ready(function(){
    var conID = $('#conIDMessage').val();

    //Set the interval in which client will be asked for new messages
    setInterval(function(){messageRequest();}, 5000);

    //sendMessage part:
    $("#sendButton").on("click", function(){
        var newMessageText = $('#newMessageText').val();

        if(newMessageText != false){ //if newMessageText contains some message
            //send message to server
            $.ajax({
                url: '../php/sendMessage.php',
                data: {messageContent: newMessageText, conID: conID},
                dataType: 'json',
                type: 'post',
                success: function(data){
                    if(data.messageSended){
                        var messageArea = $('#messageArea');
                        var message = JSON.parse(data.message);
                        messageArea.append('  <div class="row justify-content-end">' +
                                                        '<div class="card col-sm-8 col-9" id="senderDark">' +
                                                            '<p>' + message.content + '</p>' +
                                                            '<div class="float-right" id="timestampMessage">' + message.date + '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<br>');

                        $('#newMessageText').val("");
                        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
                    }else{
                        alert("Deine Nachricht konnte leider nicht gesendet werden. Bitte prüfe, ob du eine Internetverbindung hast und versuche es erneut.");
                    }

                },
                error: function(err){
                    alert("Ein Fehler liegt vor, bitte erneut versuchen: " + err);
                }
            });
        }else{
            //do nothing
        }
    });

    //function for messageRequest:
    function messageRequest(){
        $.ajax({
                url: '../php/getUnreadMessages.php',
                data: {conID: conID},
                dataType: 'json',
                type: 'post',
                success: function(data){

                    if(data.newMessage){
                        var messageArea = $('#messageArea');
                        var messages = JSON.parse(data.messages);

                        messages.forEach(function(messageElement) {
                            var message = JSON.parse(messageElement);
                            messageArea.append('  <div class="row">' +
                                                            '<div class="card col-sm-8 col-9" id="senderLight">' +
                                                                '<p>' + message.content + '</p>' +
                                                                '<div class="float-right" id="timestampMessage">' + message.date + '</div>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<br>');
                            
                            $('html, body').animate({scrollTop: $(document).height()}, 'slow');
                        });
                    }

                },
                error: function(err){
                    alert("Die Verbindung wurde leider getrennt. Bitte prüfe, ob du eine Internetverbindung hast und lade die Seite neu.");
                }
            });
        }
});