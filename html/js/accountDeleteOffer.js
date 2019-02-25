function deleteOffer(offerID){
    if (confirm('Möchtest du dieses Angebot endgültig löschen?')) {

        $.ajax({
            url: '../php/deleteOffer.php',
            data: {offerID: offerID},
            dataType: 'json',
            type: 'post',
            success: function(data){
                if(data != false){
                    var offerToDelete = $('#' + offerID + '');
                    offerToDelete.remove();
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