<?php
require_once('classes/User.php');
require_once('classes/PLZ.php');
require_once('classes/Tag.php');
require_once('classes/Offer.php');
require_once('classes/Conversation.php');
require_once('classes/Message.php');

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])
    && isset($_POST['conID']) && !empty($_POST['conID'])){
            
        $success = Conversation::deleteConversation(intval($_POST['conID']));
        if($success){
            Message::sendConversationDeletedMessage(intval($_POST['conID']), $_SESSION['user']->getUserID());
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }

    }else{
        echo json_encode(false);
    }

?>