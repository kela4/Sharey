<?php

require_once('classes/User.php');
require_once('classes/PLZ.php');
require_once('classes/Tag.php');
require_once('classes/Offer.php');
require_once('classes/Message.php');
require_once('classes/Conversation.php');

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    if(isset($_POST['messageContent']) && !empty($_POST['messageContent']) 
        && isset($_POST['conID']) && !empty($_POST['conID'])){
            $content = $_POST['messageContent'];
            $conID = intval($_POST['conID']);

            //call user-function sendMessage
            $message = $_SESSION['user']->sendMessage($conID, $content);

            if(!empty($message)){
                $return = json_encode(array(
                    'messageSended' => true,
                    'message' => $message->toJson()));
            
                echo $return;
            }else{
                $return = json_encode(array(
                    'messageSended' => false));
            
                echo $return;
            }   
    }else{
        $return = json_encode(array(
            'messageSended' => false));
    
        echo $return;
    }
     
}else{
    $return = json_encode(array(
        'messageSended' => false));

    echo $return;
}

?>