<?php
    require_once('classes/PLZ.php');

if(isset($_POST['startNumbers']) && !empty($_POST['startNumbers'])){
    $numbers = $_POST['startNumbers'];

    $plzs = PLZ::getPLZStartWithNumbers($numbers);

    if(!empty($plzs)){
        $jsonPlzs = [];

        foreach($plzs as $plz){
            $jsonPlzs[] = $plz->toJson();
        }

        echo json_encode($jsonPlzs);
    }else{
        echo false;
    }

    
}

?>