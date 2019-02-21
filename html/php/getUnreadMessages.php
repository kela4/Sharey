<?php

require_once('../php/classes/User.php');
require_once('../php/classes/Message.php');
require_once('../php/classes/Conversation.php');

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
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
}

?>