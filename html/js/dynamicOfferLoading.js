$(document).ready(function(){
    //if index.php was fully loaded --> call offerLoading-function and load the offers with initial search- and filter-parameters
    offerLoading();
});

/**
 * load offers dynamically from database and add them to the offerContainer in index.php
 * search- and filterparameters not implemented in prototype but later they will be getted 
 * also in this function and send them with the data-attribute of ajax-function to the backend 
 */
function offerLoading(){
    //get html-Elements
    var loadingOffers = $('#loadingOffers');
    var offerContainer = $('#offerContainer');

    //clear offerContainer
    offerContainer.empty();

    //show loadingOffers-ProgressBar
    loadingOffers.css('display', '');

    $.ajax({
        url: '../php/getOffers.php',
        //data: {searchTerm: searchTerm, plzID: plzID, surrounding: surrounding, tagID: tagID},
        dataType: 'json',
        type: 'post',
        success: function(data){
            if(data.offersAvailable){
                //get JSON-data as JS-Objects and print all offers
                var offers = JSON.parse(data.offers);

                offers.forEach(function(offerElementWithDistanceArray){
                    //get JSON-data as JS-Objects:
                    var offerElementWithDistance = JSON.parse(offerElementWithDistanceArray);
                    var offer = JSON.parse(offerElementWithDistance.offer);
                    var tag = JSON.parse(offer.tag);
                    var plz = JSON.parse(offer.plz);
                    var distance = JSON.parse(offerElementWithDistance.distance);

                    //create the img-tag accordingly if the offer has an image 
                    var image = '<img src="" id="offerImage">';
                    if(offer.picture){
                        image = '<img src="data:image/jpeg;base64,' + offer.picture + '" id="offerImage">';
                    }

                    //print offers (append them to offerContainer) 
                    offerContainer.append(      '<div onclick="openModal(' + offer.offerID + ', ' + distance + ');" id="' + offer.offerID + '" class="col-auto m-3 card offerCardSize cardCursor" style="background-color:' + tag.color + '">' +
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
                                                                            '<div id="offerLocationDiv" class="whiteText locationDiv">' + plz.location + '</div>' +
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
                
                //fit font-size of location-name 
                $(".locationDiv").boxfit({align_center:false, align_middle:false, maximum_font_size: 16});
            }else{
                //if there are no offers to the selected paramters available:
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

/**
 * gets the infos of one specific offer, fills the offer-Modal fields with the informations
 * and shows the offer-modal
 * @param {*} offerID id of offer
 * @param {*} distance the distance of the selected offer (that can not be recalculated by backend without search- and filterparameters)
 */
function openModal(offerID, distance){
    //show loadingContainer:
    $('#loadingContainer').show();

    $.ajax({
        url: '../php/getOffer.php',
        data: {offerID: offerID},
        dataType: 'json',
        type: 'post',
        complete: function(){
            //hide loadingContainer with a timeout of 0.5 sec
            setTimeout(function(){ 
                $('#loadingContainer').hide();
            }, 500);
        },
        success: function(data){
            if(data.offerAvailable){
                //parse JSON-data to JS-objects
                var offer = JSON.parse(data.offer);
                var tag = JSON.parse(offer.tag);
                var plz = JSON.parse(offer.plz);

                //set offer-data to the offer-modal-fields:
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

                //create and add the img-tag accordingly if the offer has an image 
                var imageContainer = $('#modalOfferImageContainer');
                var image = '<img src="" class="img-fluid omImageClass" id="omImage">';
                if(offer.picture){
                    image = '<img src="data:image/jpeg;base64,' + offer.picture + '" class="img-fluid omImageClass" id="omImage">';
                }
                imageContainer.empty();
                imageContainer.append(image);

                //add actionbuttons with specific offerID:
                var offerModalActionButtons = $('#offerModalActionButtons');
                offerModalActionButtons.empty();
                offerModalActionButtons.append('<button type="button" class="btn btn-dark float-right" onclick="showInterest(' + offer.offerID + ', ' + distance + ');">Interesse</button>' +
                                                        '<button type="button" class="btn btn-light float-right whiteText" id="omReportOffer" onclick="alert(\'Diese Funktion ist im Prototypen nicht implementiert.\');">Melden</button>');

                //showw offer-modal
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

/**
 * if a user has interest on an offer, he clicks the interesse-button
 * than this function will be called
 * fist will be checked, if a user is logged in, if not, the user must loggin firs
 * if yes -> php-script showInterest will be called and if this returns true (means everything worked in the script),
 * a redirect to account-page will be accomplished
 */
function showInterest(offerID, distance){
    //show loadingContainer:
    $('#loadingContainer').show();

    //check if a user is logged in:
    $.ajax({
        url: '../php/isLoggedInJSON.php',
        dataType: 'json',
        type: 'post',
        complete: function(){
            //hide loadingContainer
            setTimeout(function(){ 
                $('#loadingContainer').hide();
            }, 500);
        },
        success: function(data){
            if(data){ //true = User ist eingeloggt
                $.ajax({
                    url: '../php/showInterest.php',
                    data: {offerID: offerID},
                    dataType: 'json',
                    type: 'post',
                    success: function(success){
                        if(success){ //go to account-page
                            var url = "/account.php";
                            $(location).attr('href', url);
                        }else{ //warning-message
                            alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal. Prüfe bitte auch, ob du bereits eine Konversation zu diesem Angebot laufen hast.');
                        }
                    },
                    error: function(err){
                        alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
                    }
                });
            }else{
                //show info-text that user must logged in
                $('#offerModal').modal('hide');
                $('#loginModalInfoText').html('Bitte melde dich an, kehre zur Startseite zurück und wähle dann den Interesse-Button aus.');
                $('#loginModal').modal('show');
            }
        },
        error: function(err){
            alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
        }
    });
}
