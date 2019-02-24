$(document).ready(function(){
    offerLoading();
});

function offerLoading(){ //search- and filterparameters not implemented yet,...
    //loading offers from DB

    //get html-Elements
    var loadingOffers = $('#loadingOffers');
    var offerContainer = $('#offerContainer');

    //clear offerContainer
    offerContainer.empty();

    //show loadingOffers-ProgressBar
    loadingOffers.css('display', '');

    $.ajax({
        url: '../php/getOffers.php',
        dataType: 'json',
        //data: {searchTerm: searchTerm, plzID: plzID, surrounding: surrounding, tagID: tagID},
        type: 'post',
        success: function(data){
            if(data.offersAvailable){
                var offers = JSON.parse(data.offers);

                offers.forEach(function(offerElement){
                    var offer = JSON.parse(offerElement);
                    var tag = JSON.parse(offer.tag);
                    var plz = JSON.parse(offer.plz);

                    console.log(offer);
                    console.log(tag);
                    console.log(plz);

                    var image = '<img src="" id="offerImage">';
                    if(offer.picture){
                        image = '<img src="data:image/jpeg;base64,' + offer.picture + '" id="offerImage">';
                    }

                    //print offers 
                    offerContainer.append(' <a id="' + offer.offerID + '" data-toggle="modal" data-target="#offerModal">'+
                                                '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 m-3 card" id="card" style="background-color:' + tag.color + '">'+
                                                    '<div id="cardContent">'+
                                                        '<div class="row">'+
                                                            '<div class="col-7">' +
                                                                '<div class="row">' +
                                                                    '<div id="offerTagDiv">' +
                                                                        '<svg width="150px" height="55px">' +
                                                                            '<polygon points="10,30 30,10 140,10 140,50 30,50" id="offerTagPolygon" />' +
                                                                            '<text x="40" y="36" fill="white">' + tag.description + '</text>' +
                                                                        '</svg>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="row">' +
                                                                    '<div class="=col-auto">' +
                                                                        '<div id="locationTagDiv">' +
                                                                            '<i class="fas fa-map-marker-alt" id="offerLocationTag"></i>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                    '<div class="col-auto">' +
                                                                        '<div id="cityDiv">' +
                                                                            '<span class="whiteText">' + plz.location + '</span>' +
                                                                            '<br>' +
                                                                            '<span class="whiteText">5 km</span>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>' +
                                                            '<div class="col-5">' +
                                                                '<br> <br>' +
                                                                image +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="row">' +
                                                            '<div class="col-12">' +
                                                                '<div id="offerDescriptionDiv">' +
                                                                    '<h5 class="whiteText">' + offer.title + '</h5>' +
                                                                    '<p class="whiteText">' + offer.description + '</p>' +
                                                                '</div>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</a>');

                });

            }else{
                offerContainer.append('<p>Leider sind keine passenden Angebote vorhanden. Versuche doch mal eine andere Such- und Filtereinschränkung.</p>')
            }

            //hide loadingOffers-ProgressBar
            loadingOffers.css('display', 'none');
        },
        error: function(err){
            alert('Fehler beim Laden der Offers.');
        }
    });

    /*
    var exampleOffer = {
        id: 1,
        tag: "Essen",
        location: "Mosbach",
        km: "15",
        imgSrc: "images/yoghurt.jpg",
        title: "Ein Jogurt",
        description: "Habe einen Naturjoghurt übrig. Will den jemand?<br>Dritte Textzeile"
    };

    //get html-Elements
    var loadingOffers = $('#loadingOffers');
    var offerContainer = $('#offerContainer');

    //clear offerContainer
    offerContainer.empty();

    //show loadingOffers-ProgressBar
    loadingOffers.css('display', '');

    setTimeout(function(){ //setTimeout --> only to imitate the ajax-call
        //print offers 
        for(var i = 0; i<29; i++){
            offerContainer.append(' <a id="' + exampleOffer['id'] + '" data-toggle="modal" data-target="#offerModal">'+
                                        '<div class="col-auto m-3 card" id="card">'+
                                            '<div id="cardContent">'+
                                                '<div class="row">'+
                                                    '<div class="col-7">' +
                                                        '<div class="row">' +
                                                            '<div id="offerTagDiv">' +
                                                                '<svg width="150px" height="55px">' +
                                                                    '<polygon points="10,30 30,10 140,10 140,50 30,50" id="offerTagPolygon" />' +
                                                                    '<text x="40" y="36" fill="white">' + exampleOffer['tag'] + '</text>' +
                                                                '</svg>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="row">' +
                                                            '<div class="=col-auto">' +
                                                                '<div id="locationTagDiv">' +
                                                                    '<i class="fas fa-map-marker-alt" id="offerLocationTag"></i>' +
                                                                '</div>' +
                                                            '</div>' +
                                                            '<div class="col-auto">' +
                                                                '<div id="cityDiv">' +
                                                                    '<span class="whiteText">Mosbach</span>' +
                                                                    '<br>' +
                                                                    '<span class="whiteText">' + exampleOffer['km'] + ' km</span>' +
                                                                '</div>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<div class="col-5">' +
                                                        '<br> <br>' +
                                                        '<img src="' + exampleOffer['imgSrc'] + '" id="offerImage">' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="row">' +
                                                    '<div class="col-12">' +
                                                        '<div id="offerDescriptionDiv">' +
                                                            '<h5 class="whiteText">' + exampleOffer['title'] + '</h5>' +
                                                            '<p class="whiteText">' + exampleOffer['description'] + '</p>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</a>');
        }

        //hide loadingOffers-ProgressBar
        loadingOffers.css('display', 'none');
    }, 3000);

    */
}