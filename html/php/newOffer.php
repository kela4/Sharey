<?php 
        require_once('classes/User.php');
        require_once('classes/PLZ.php');
        require_once('classes/Tag.php');
        require_once('classes/Offer.php');
        require_once('classes/Message.php');
        require_once('classes/Conversation.php');

    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        if(isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['desc']) && !empty($_POST['desc'])
        && isset($_POST['plzID']) && !empty($_POST['plzID'])
        && isset($_POST['tagID']) && !empty($_POST['tagID'])){
            
            $imageData = null;

            if(isset($_FILES['img']) && !empty($_FILES['img'])){
                //get image data as byte
                $imageData = addslashes(file_get_contents($_FILES['img']['tmp_name']));
            }

            $expdate = new DateTime('0000-00-00');
            if(isset($_POST['expdate']) && !empty($_POST['expdate'])){
                $expdate = new DateTime($_POST['expdate']);
            }

            $success = $_SESSION['user']->createOffer($_POST['desc'], $expdate, $_POST['title'], intval($_POST['tagID']), $imageData, intval($_POST['plzID']));
            
            if($success){
                header("Location: ../account.php");
            }else{
                header("Location: ../error.php");
            }
                    
        }else{
            header("Location: ../error.php");
            //echo "<p>Fehler, ein Feld wurde nicht korrekt ausgefüllt.</p>";
        }
    }

    
?>