$(document).ready(function(){

    //filler for plz:
    //for prototype solid plz later will be also dynamic filling like tags
    var searchFilterPLZ = $('#searchFilterPLZ');
    searchFilterPLZ.append('<option value="2092" selected>74821 Mosbach</option>');

    //filler for tags:
    var searchFilterTag = $('#searchFilterTag');

    $.ajax({
        url: '../php/getAllTags.php',
        dataType: 'json',
        type: 'post',
        success: function(data){
            if(data != false){
                data.forEach(function(tagElement) {
                    var tag = JSON.parse(tagElement);
                    searchFilterTag.append('<option value="' + tag.tagID + '">' + tag.description + '</option>');
                });
            }
        },
        error: function(err){
            alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
        }
    });

});