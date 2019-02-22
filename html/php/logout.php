<?php 
    require_once('classes/User.php');

    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $success = $_SESSION['user']->logout();
            
        if($success == true){
            header("Location: ../loggedout.php");
        }else{
            echo "<p>Da ist wohl etwas schief gegangen, bitte erneut versuchen.</p>";  //hier vielleicht auf eine initiale Fehler-Meldungsseite verweisen, der verschiedenen get-Params mitgegeben werden und je nach Param wird die Fehlermeldung angezeigt
        }
        
    }else{
        header("Location: ../index.php");
    }
?>