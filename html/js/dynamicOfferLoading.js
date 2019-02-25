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

                offers.forEach(function(offerElementWithDistanceArray){
                    var offerElementWithDistance = JSON.parse(offerElementWithDistanceArray);

                    var offer = JSON.parse(offerElementWithDistance.offer);
                    var tag = JSON.parse(offer.tag);
                    var plz = JSON.parse(offer.plz);
                    var distance = JSON.parse(offerElementWithDistance.distance);

                    var image = '<img src="" id="offerImage">';
                    if(offer.picture){
                        image = '<img src="data:image/jpeg;base64,' + offer.picture + '" id="offerImage">';
                    }

                    //print offers 
                    offerContainer.append(      '<div onclick="openModal(' + offer.offerID + ', ' + distance + ');" id="' + offer.offerID + '" class="col-auto m-3 card offerCardSize" style="background-color:' + tag.color + '">' +
                                                    '<div id="cardContent">' +
                                                        '<div class="row">' +
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
                                                                            '<span class="whiteText">' + distance + ' km</span>' +
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
                                                '</div>');

                });

            }else{
                offerContainer.append('<p>Leider sind keine passenden Angebote vorhanden. Versuche doch mal eine andere Such- und Filtereinschränkung.</p>');
            }

            //hide loadingOffers-ProgressBar
            loadingOffers.css('display', 'none');
        },
        error: function(err){
            alert('Fehler beim Laden der Offers.');
        }
    });
}

function openModal(offerID, distance){
    //ggf noch ein loading-button

    $.ajax({
        url: '../php/getOffer.php',
        data: {offerID: offerID},
        dataType: 'json',
        type: 'post',
        success: function(data){
            if(data.offerAvailable){
                var offer = JSON.parse(data.offer);
                var tag = JSON.parse(offer.tag);
                var plz = JSON.parse(offer.plz);

                $('.omColor').css("background-color", tag.color);
                $('#offerModalTitle').html(offer.title);
                $('#offerModalTagText').html(tag.description);
                $('#offerModalLocationName').html(plz.location);
                $('#offerModalLocationDistance').html(distance + ' km');
                $('#offerModalOfferDescription').html(offer.description);

                //add mhd:
                if(offer.mhd){
                    $('#offerModalMHDText').html('MHD: ' + offer.mhd);
                }else{
                    $('#offerModalMHDText').html('');
                }

                //add img:
                var imageContainer = $('#modalOfferImageContainer');
                var image = '<img src="" class="img-fluid" id="omImage">';
                if(offer.picture){
                    image = '<img src="data:image/jpeg;base64,' + offer.picture + '" class="img-fluid" id="omImage">';
                }
                imageContainer.empty();
                imageContainer.append(image);

                //add actionbuttons:
                var offerModalActionButtons = $('#offerModalActionButtons');
                offerModalActionButtons.empty();
                offerModalActionButtons.append('<button type="button" class="btn btn-dark float-right" onclick="showInterest(' + offer.offerID +');">Interesse</button>' +
                                                        '<button type="button" class="btn btn-light float-right whiteText" id="omReportOffer">Melden</button>');

                $('#offerModal').modal('show');

            }else{
                alert('Das Angebot kann leider nicht angezeigt werden.');
            }
        },
        error: function(err){
            alert('Das Angebot kann leider nicht angezeigt werden.');
        }
    });
}

function showInterest(offerID){
    $.ajax({
        url: '../php/isLoggedIn.php',
        data: {offerID: offerID},
        dataType: 'json',
        type: 'post',
        success: function(data){
            alert('passt ' + data);
        },
        error: function(err){
            alert('Es ist ein Problem aufgetreten. Bitte erneut versuchen.');
        }
    });
}
