<?php

//returns as JSON-data if unread messages are available + message data

require_once('classes/User.php');
require_once('classes/PLZ.php');
require_once('classes/Tag.php');
require_once('classes/Offer.php');
require_once('classes/Message.php');
require_once('classes/Conversation.php');

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    if(isset($_POST['conID']) && !empty($_POST['conID'])){
        $conID = $_POST['conID'];
        $messages = Conversation::getUnreadMessages($conID, $_SESSION['user']->getUserID());
        
        if(!empty($messages)){
            $jsonMessages = [];

            foreach($messages as $message){
                $jsonMessages[] = $message->toJson();
            }

            $return = json_encode(array(
                'newMessage' => true,
                'messages' => json_encode($jsonMessages)));

            echo $return;
        }else{
            $return = json_encode(array(
                'newMessage' => false));

            echo $return;
        }    
    }else{
        $return = json_encode(array(
            'newMessage' => false));

        echo $return;
    }
}else{
    $return = json_encode(array(
        'newMessage' => false));

    echo $return;
}

?>