$(document).ready(function(){
    //filler for tags:

    var tagSelectionNewOffer = $('#tagSelectionNewOffer');

    $.ajax({
        url: '../php/getAllTags.php',
        dataType: 'json',
        type: 'post',
        success: function(data){
            console.log(data);
            //var tags = JSON.parse(data);
            //console.log(tags);
            data.forEach(function(tag) {
                tagSelectionNewOffer.append('<option value="' + tag.tagID + '">' + tag.description + '</option>');
            });
            
        },
        error: function(err){
            alert('Fehler beim Füllen der Tags im NewOffer Modal.');
        }
    });
});