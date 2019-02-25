function deleteOffer(offerID){
    if (confirm('Möchtest du dieses Angebot endgültig löschen?')) {
        alert('Angebot' + offerID + ' wird gelöscht');
    }
}