$(document).ready(function(){

    //filler for plz:
    //for prototype solid plz later will be also dynamic filling like tags
    var searchFilterPLZ = $('#searchFilterPLZ');
    searchFilterPLZ.append('<option value="2049">69437 Neckargerach</option>');
    searchFilterPLZ.append('<option value="2092">74821 Mosbach</option>');
    searchFilterPLZ.append('<option value="2093">74834 Elztal</option>');
    searchFilterPLZ.append('<option value="2096">74847 Obrigheim</option>');
    searchFilterPLZ.append('<option value="2098">74855 Haßmersheim</option>');
    searchFilterPLZ.append('<option value="2100">74862 Binau</option>');
    searchFilterPLZ.append('<option value="2102">74865 Neckarzimmern</option>');

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