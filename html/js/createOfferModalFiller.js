$(document).ready(function(){
    //filler for tags:

    alert('works');
    var tagSelectionNewOffer = $('#tagSelectionNewOffer');

    $.ajax({
        url: '../php/getAllTags.php',
        dataType: 'json',
        type: 'post',
        success: function(data){
            var tags = JSON.parse(data);

            tags.forEach(function(tag) {
                tagSelectionNewOffer.append('<option value="' + tag.tagID + '">' + tag.description + '</option>');
            });
            
        },
        error: function(err){
            alert('Fehler beim Füllen der Tags im NewOffer Modal.');
        }
    });
});