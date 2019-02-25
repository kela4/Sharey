<?php
require_once('classes/PLZ.php');
require_once('classes/Tag.php');
require_once('classes/Offer.php');

if(isset($_POST['offerID']) && !empty($_POST['offerID'])){
    $offer = Offer::getOffer($_POST['offerID']);

    if(!empty($offer)){
        $return = json_encode(array(
            'offerAvailable' => true,
            'offer' => $offer->toJson()));
    }else{
        $return = json_encode(array(
            'offerAvailable' => false));
    }
}else{
    $return = json_encode(array(
        'offerAvailable' => false));
}

?>