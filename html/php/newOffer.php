<?php 
    require_once('classes/Offer.php');
    require_once('classes/User.php');

    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        if(isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['desc']) && !empty($_POST['desc'])
        && isset($_POST['plz']) && !empty($_POST['plz'])
        && isset($_POST['tag']) && !empty($_POST['tag'])
        && isset($_POST['expdate']) && !empty($_POST['expdate'])
        && isset($_FILES['img']) && !empty($_FILES['img'])){

            //übergangsweise feste Werte, bis richtig von Frontend geliefert
            $_POST['plz'] = 2093;
            $_POST['tag'] = 1;
            
            //image:
            $imageData = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        
            $success = $_SESSION['user']->createOffer($_POST['desc'], new DateTime($_POST['expdate']), $_POST['title'], intval($_POST['tag']), $imageData, intval($_POST['plz']));
            
            if($success){
                header("Location: ../pages/account.php");
            }else{
                echo "Fehler.";
            }
                    
        }else{
            echo "<p>Fehler, ein Feld wurde nicht korrekt ausgefüllt.</p>";
        }
    }

    
?>