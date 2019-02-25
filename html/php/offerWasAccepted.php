<?php
require_once('classes/User.php');
require_once('classes/PLZ.php');
require_once('classes/Tag.php');
require_once('classes/Offer.php');
require_once('classes/Conversation.php');
require_once('classes/Message.php');

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])
    && isset($_POST['conID']) && !empty($_POST['conID'])
    && isset($_POST['offerID']) && !empty($_POST['offerID'])){
        //a counter of the completed offers per user can be implemented via the conID, which can be used for the later implementation of user-experience-status
        
        //delete offer:
        $success = Offer::deleteOffer(intval($_POST['offerID']));
        
        if($success){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }

    }else{
        echo json_encode(false);
    }

?>