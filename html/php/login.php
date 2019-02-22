<?php 
    require_once('classes/User.php');

    if(isset($_POST['mail']) && !empty($_POST['mail'])){
        if(isset($_POST['password']) && !empty($_POST['password'])){
            //call login-method of User
            $success = User::login($_POST['mail'], $_POST['password']);
            
            if($success == true){
                header("Location: ../account.php");
            }else{
                echo "<p>Nutzerdaten falsch.</p>";  //hier vielleicht auf eine initiale Fehler-Meldungsseite verweisen, der verschiedenen get-Params mitgegeben werden und je nach Param wird die Fehlermeldung angezeigt
            }
        }else{
            echo "<p>Bitte Passwort eingeben..</p>";
        }
    }else{
        echo "<p>Bitte E-Mail eingeben.</p>";
    }
?>