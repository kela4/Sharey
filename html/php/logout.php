<?php 
        require_once('classes/User.php');
        require_once('classes/PLZ.php');
        require_once('classes/Tag.php');
        require_once('classes/Offer.php');
        require_once('classes/Message.php');
        require_once('classes/Conversation.php');

    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        //call user-function logout
        $success = $_SESSION['user']->logout();
            
        if($success == true){
            header("Location: ../loggedout.php");
            exit;
        }else{
            echo "<p>Da ist wohl etwas schief gegangen, bitte erneut versuchen.</p>";  //hier vielleicht auf eine initiale Fehler-Meldungsseite verweisen, der verschiedenen get-Params mitgegeben werden und je nach Param wird die Fehlermeldung angezeigt
        }
        
    }else{
        header("Location: ../index.php");
        exit;
    }
?>