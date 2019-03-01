$(document).ready(function(){
    var conID = $('#conIDMessage').val();

    //set the interval in which client will be asked for new messages 
    //(function messageRequest is called), as long as conversation-page is open
    setInterval(function(){messageRequest();}, 5000);

    //sendMessage part:
    //set function to onclick-event of sendButton:
    $("#sendButton").on("click", function(){
        //get messagetext
        var newMessageText = $('#newMessageText').val();

        if(newMessageText != false){ //if newMessageText contains some message (isn't empty)
            //send message to server, call sendMessage-script
            $.ajax({
                url: '../php/sendMessage.php',
                data: {messageContent: newMessageText, conID: conID},
                dataType: 'json',
                type: 'post',
                success: function(data){
                    if(data.messageSended){
                        //if message was sended correctly --> append sended message to message-area
                        var messageArea = $('#messageArea');
                        var message = JSON.parse(data.message);
                        messageArea.append('  <div class="row justify-content-end">' +
                                                        '<div class="card col-sm-8 col-9" id="senderDark">' +
                                                            '<p>' + message.content + '</p>' +
                                                            '<div class="float-right" id="timestampMessage">' + message.date + '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<br>');

                        //clear newMessage-Area
                        $('#newMessageText').val("");

                        //scroll to bottom of last message/site-body
                        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
                    }else{
                        alert("Deine Nachricht konnte leider nicht gesendet werden. Bitte prüfe, ob du eine Internetverbindung hast und versuche es erneut.");
                    }

                },
                error: function(err){
                    alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
                }
            });
        }else{
            //do nothing if message-text is empty
        }
    });

    //function for messageRequest:
    function messageRequest(){
        //get unreadMessages from server
        $.ajax({
                url: '../php/getUnreadMessages.php',
                data: {conID: conID},
                dataType: 'json',
                type: 'post',
                success: function(data){
                    //if a unread message will be available, append it to page:
                    if(data.newMessage){
                        var messageArea = $('#messageArea');
                        var messages = JSON.parse(data.messages);

                        //add all new messages to messageArea:
                        messages.forEach(function(messageElement) {
                            var message = JSON.parse(messageElement);
                            messageArea.append('  <div class="row">' +
                                                            '<div class="card col-sm-8 col-9" id="senderLight">' +
                                                                '<p>' + message.content + '</p>' +
                                                                '<div class="float-right" id="timestampMessage">' + message.date + '</div>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<br>');
                            
                            //scroll to bottom of last message/site-body
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