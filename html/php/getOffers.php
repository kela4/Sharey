<?php
require_once('classes/PLZ.php');
require_once('classes/Tag.php');
require_once('classes/Offer.php');

//returns offers depending on search restrictions

//search- and filterparameters not implemented in prototype
$searchTerm = "";
$plzID = 0;
$surrounding = 0;
$tagID = 0;

if(isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])){
    $searchTerm = $_POST['searchTerm'];
}

if(isset($_POST['plzID']) && !empty($_POST['plzID'])){
    $plzID = intval($_POST['plzID']);
}

if(isset($_POST['surrounding']) && !empty($_POST['surrounding'])){
    $surrounding = intval($_POST['surrounding']);
}

if(isset($_POST['tagID']) && !empty($_POST['tagID'])){
    $tagID = intval($_POST['tagID']);
}

//get offers based on search- and filter-options
$offersWithDistance = Offer::setSearch($searchTerm, $plzID, $surrounding, $tagID);

if(!empty($offersWithDistance)){
    $jsonOffers = [];

    foreach($offersWithDistance as $offerArray){
        $jsonOffers[] = json_encode(array(
            'offer' => $offerArray["offer"]->toJson(),
            'distance' => $offerArray["distanceFromStartPoint"]
        ));
    }

    $return = json_encode(array(
        'offersAvailable' => true,
        'offers' => json_encode($jsonOffers)));

    echo $return;
}else{
    $return = json_encode(array(
        'offersAvailable' => false));

    echo $return;
}    

?>