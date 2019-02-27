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
                    alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
                }
            },
            error: function(err){
                alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
            }
        });
    }
}