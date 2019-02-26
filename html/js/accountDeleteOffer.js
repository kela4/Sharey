function deleteOffer(offerID){
    if (confirm('Möchtest du dieses Angebot endgültig löschen?')) {

        //show loadingContainer:
        $('#loadingContainer').show();
        $.ajax({
            url: '../php/deleteOffer.php',
            data: {offerID: offerID},
            dataType: 'json',
            type: 'post',
            complete: function(){
                //hide loadingContainer
                setTimeout(function(){ 
                    $('#loadingContainer').hide();
                }, 500);
            },
            success: function(data){
                if(data != false){
                    location.reload();
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