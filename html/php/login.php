<?php 

    require_once('classes/User.php');
    require_once('classes/PLZ.php');
    require_once('classes/Tag.php');
    require_once('classes/Offer.php');
    require_once('classes/Message.php');
    require_once('classes/Conversation.php');

    if(isset($_POST['mail']) && !empty($_POST['mail'])){
        if(isset($_POST['password']) && !empty($_POST['password'])){

            $loginFrom = 0;
            if(isset($_POST['loginFrom']) && !empty($_POST['loginFrom'])){
                $loginFrom = $_POST['loginFrom'];
            }

            //call login-method of User
            $success = User::login($_POST['mail'], $_POST['password']);
            
            if($success == true){
                if($loginFrom == 1){ //login from "newOffer"
                    header("Location: ../index.php?from=1");
                    exit;
                }elseif($loginFrom == 2){ //login from "interesse zeigen"
                    if(isset($_POST['loginShowOfferID']) && !empty($_POST['loginShowOfferID'])
                        &&isset($_POST['loginShowOfferDistance']) && !empty($_POST['loginShowOfferDistance'])){
                        header("Location: ../index.php?from=2&id=".$_POST['loginShowOfferID']."&distance=".$_POST['loginShowOfferDistance']);
                        exit;
                    }
                    header("Location: ../index.php?from=2");
                    exit;
                }else{ //show account
                    header("Location: ../account.php");
                    exit;
                }
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