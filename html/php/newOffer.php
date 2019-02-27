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

            if(isset($_POST['img']) && !empty($_POST['img']) && $_POST['img'] != ""){
                $image = $_POST['img'];
                if(strpos($image, 'data:image/jpeg;base64,')){
                    $image = str_replace('data:image/jpeg;base64,', '', $image);
                }
                if(strpos($image, 'data:image/png;base64,')){
                    $image = str_replace('data:image/png;base64,', '', $image);
                }
                $image = str_replace(' ', '+', $image);
                $imageData = base64_decode($image);
            }

            /*if(isset($_FILES['img']) && !empty($_FILES['img']) && $_FILES['img'] != "" 
                && isset($_FILES['img']['name']) && !empty($_FILES['img']['name']) && $_FILES['img']['name'] != ""){
                
                if(isset($_FILES['img']['size']) && !empty($_FILES['img']['size'])
                    && $_FILES['img']['size'] != "" && $_FILES['img']['size'] > 1000000){
                    header("Location: ../error.php?errormessage=Dein Bild überschreitet die maximale Bildgröße von <strong>1MB</strong>.");
                    exit;
                }else{
                    $fileExtension = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
                    
                    if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg"){
                        header("Location: ../error.php?errormessage=Nur Bilder mit den Formaten <strong>jpg, png oder jpeg</strong> sind gültig.");
                        exit;
                    }else{
                        //get image data as byte
                        $imageData = addslashes(file_get_contents($_FILES['img']['tmp_name']));
                    }           
                }
            }*/

            $expdate = new DateTime('0000-00-00');
            if(isset($_POST['expdate']) && !empty($_POST['expdate'])){
                $expdate = new DateTime($_POST['expdate']);
            }

            $success = $_SESSION['user']->createOffer($_POST['desc'], $expdate, $_POST['title'], intval($_POST['tagID']), $imageData, intval($_POST['plzID']));
            
            if($success){
                header("Location: ../account.php");
            }else{
                header("Location: ../error.php?errormessage=Success failed. Bitte überprüfe, ob dein Bild die maximale Bildgröße von <strong>1MB</strong> nicht überschreitet.");
                exit;
            }
                    
        }else{
            header("Location: ../error.php?errormessage=Bitte überprüfe, ob dein Bild die maximale Bildgröße von <strong>1MB</strong> nicht überschreitet.");
            exit;
        }
    }

    
?>