function offerWasHandedOver(conID, offerID){
    if (confirm('Wurde dieses Produkt von dem User abgeholt?')) {
        $.ajax({
            url: '../php/offerWasAccepted.php',
            data: {conID: conID, offerID: offerID},
            dataType: 'json',
            type: 'post',
            success: function(data){
                if(data != false){ //action was successfull
                    var url = "https://sharey.rollingrelease.de/account.php";
                    $(location).attr('href', url);
                }else{
                    alert('Es ist ein Fehler aufgetreten, bitte versuche es nochmal.');
                }
            },
            error: function(err){
                alert('Es ist ein Fehler aufgetreten, bitte versuche es nochmal.');
            }
        });
    }
}

function deleteConversation(conID){
    if (confirm('Möchtest du die Konversation mit dem User endgültig löschen?')) {
        $.ajax({
            url: '../php/deleteConversation.php',
            data: {conID: conID},
            dataType: 'json',
            type: 'post',
            success: function(data){
                if(data != false){
                    var url = "https://sharey.rollingrelease.de/account.php";
                    $(location).attr('href', url);
                }else{
                    alert('Es ist ein Fehler aufgetreten, bitte versuche es nochmal.');
                }
            },
            error: function(err){
                alert('Es ist ein Fehler aufgetreten, bitte versuche es nochmal.');
            }
        });
    }
}