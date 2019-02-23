<?php
    require_once('classes/User.php');
    require_once('classes/PLZ.php');
    require_once('classes/Tag.php');
    require_once('classes/Offer.php');
    require_once('classes/Message.php');
    require_once('classes/Conversation.php');
    require_once('dbconnect.php');

if(isset($_POST['startNumbers']) && !empty($_POST['startNumbers'])){
    $numbers = $_POST['startNumbers'];

    $plzs = PLZ::getPLZStartWithNumbers($numbers);

    $jsonPlzs = [];

            foreach($plzs as $plz){
                $jsonPlzs[] = $plz->toJson();
            }

            echo json_encode($jsonPlzs);
    }

?>