<?php 

    //performs the actual login

    require_once('classes/User.php');
    require_once('classes/PLZ.php');
    require_once('classes/Tag.php');
    require_once('classes/Offer.php');
    require_once('classes/Message.php');
    require_once('classes/Conversation.php');

    if(isset($_POST['mail']) && !empty($_POST['mail'])){
        if(isset($_POST['password']) && !empty($_POST['password'])){

            //call login-method of User
            $success = User::login($_POST['mail'], $_POST['password']);
            
            if($success == true){
                //show account
                header("Location: ../account.php");
                exit;
            }else{
                header("Location: ../error.php?errormessage=Nutzerdaten falsch.");
                exit;
            }
            
        }else{
                header("Location: ../error.php?errormessage=Bitte Passwort eingeben.");
                exit;
        }
    }else{
        header("Location: ../error.php?errormessage=Bitte E-Mail eingeben.");
        exit;
    }
?>