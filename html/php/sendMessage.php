<?php

require_once('../php/classes/User.php');
require_once('../php/classes/Message.php');

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $content = $_POST['messageContent'];
    $conID = intval($_POST['conID']);

    $message = $_SESSION['user']->sendMessage($conID, $content);
    //$message = "test";

    if(!empty($message)){
        echo $message->toJson();
    }else{
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }    
}

?>