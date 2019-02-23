<?php 
        /*require_once('classes/User.php');
        require_once('classes/PLZ.php');
        require_once('classes/Tag.php');
        require_once('classes/Offer.php');
        require_once('classes/Message.php');
        require_once('classes/Conversation.php');*/

    function isLoggedIn(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }
    
?>