$(document).ready(function(){
    //filler for tags:

    var tagSelectionNewOffer = $('#tagSelectionNewOffer');

    $.ajax({
        url: '../php/getAllTags.php',
        dataType: 'json',
        type: 'post',
        success: function(data){
            data.forEach(function(tagElement) {
                var tag = JSON.parse(tagElement);
                tagSelectionNewOffer.append('<option value="' + tag.tagID + '">' + tag.description + '</option>');
            });
            
        },
        error: function(err){
            alert('Fehler beim Füllen der Tags im NewOffer Modal.');
        }
    });

    //filler for plz:
    //for prototype solid plz later will be also dynamic filling like tags
    var plzSelectionNewOffer = $('#plzSelectionNewOffer');
    plzSelectionNewOffer.append('<option value="2049">69437 Neckargerach</option>');
    plzSelectionNewOffer.append('<option value="2092">74821 Mosbach</option>');
    plzSelectionNewOffer.append('<option value="2093">74834 Elztal</option>');
    plzSelectionNewOffer.append('<option value="2096">74847 Obrigheim</option>');
    plzSelectionNewOffer.append('<option value="2098">74855 Haßmersheim</option>');
    plzSelectionNewOffer.append('<option value="2100">74862 Binau</option>');
    plzSelectionNewOffer.append('<option value="2102">74865 Neckarzimmern</option>');

});