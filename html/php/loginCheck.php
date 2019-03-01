<?php 
    require_once('classes/User.php');
    require_once('classes/PLZ.php');
    require_once('classes/Tag.php');
    require_once('classes/Offer.php');
    require_once('classes/Message.php');
    require_once('classes/Conversation.php');

    if(isset($_POST['mail']) && !empty($_POST['mail'])
        && isset($_POST['password']) && !empty($_POST['password'])){
            //check if user and password are correct, call user-function checkLoginDates
            $success = User::checkLoginDates($_POST['mail'], $_POST['password']);
            
            if($success == true){
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }
            
        }else{
            echo json_encode(false);
        }
?>