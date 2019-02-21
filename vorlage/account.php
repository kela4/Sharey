<!-- <?php
    require_once('../php/classes/User.php');
    require_once('../php/classes/Offer.php');
    require_once('../php/classes/Tag.php');
    require_once('../php/classes/Conversation.php');
    require_once('../php/classes/Message.php');
?> -->

<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Account</title>
</head>

<body>

    <h3>Account</h3>

    <?php
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        echo '<a class="btn" href="../php/logout.php">Logout</a>';
        echo "<p>Hello ".$_SESSION['user']->getMail()."</p>";
    }
?>

    <br>
    <h5>Konversationen</h5>

    <?php 
    //session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $conversations = $_SESSION['user']->getConversations();

        //print conversations:
        if(!empty($conversations)){
            $currentOfferID = 0;
            $acceptorCounter = 1;
            
            foreach($conversations as $conversation){
                
                if($conversation->getOfferID() == $currentOfferID){ //if offerID of current conversation equals to offerID of the previous conversation --> add only the lastMessage
                    //echo '<p>@'.$acceptorCounter.' '.$conversation->getLastMessage()->getDate()->format('Y-m-d H:i:s').' '.substr($conversation->getLastMessage()->getContent(),0,25).'...</p>';
                    echo '  <form method="POST" action="conversation.php">
                                <input type="text" hidden required name="conID" value="'.$conversation->getConID().'"/>
                                <button class="btn" type="submit">@'.$acceptorCounter.' '.$conversation->getLastMessage()->getDate()->format('Y-m-d H:i:s').' '.substr($conversation->getLastMessage()->getContent(),0,25).'...</button>
                            </form>';
                }else{ //if offerID of current conversation not equals to offerID of the previous conversation --> add a new title and then the lastMessage
                    if($currentOfferID != 0){
                        echo '</div>';
                    }

                    $acceptorCounter = 1;
                    echo   '<div style="background-color: #FFFFFF">
                                <h4>'.$conversation->getOfferTitle().'</h4>
                                <form method="POST" action="conversation.php">
                                    <input type="text" hidden required name="conID" value="'.$conversation->getConID().'"/>
                                    <button class="btn" type="submit">@'.$acceptorCounter.' '.$conversation->getLastMessage()->getDate()->format('Y-m-d H:i:s').' '.substr($conversation->getLastMessage()->getContent(),0,25).'...</button>
                                </form>';
                    $currentOfferID = $conversation->getOfferID();
                }

                $acceptorCounter++; 

            }
            echo '</div>'; //end for last offer-con-container
        }
           
    }
?>

    <br>
    <h5>Eigene Angebote</h5>

    <?php 
    //session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $offers = $_SESSION['user']->getOwnOffers();

        //print own offers:
        if(!empty($offers)){
            foreach($offers as $offer){
                echo    '<div id="'.$offer->getOfferID().'" style="background-color:'.$offer->getTag()->getColor().'">
                            <p>'.$offer->getTag()->getDescription().'</p>
                            <p>'.$offer->getPlz().' '.$offer->getPlace().'</p>
                            <h5>'.$offer->getTitle().'</h5>
                            <p>'.$offer->getDescription().'</p>
                            <p>'.$offer->getDate()->format('Y-m-d H:i:s').'</p>';
                if(!empty($offer->getPicture())){
                    echo    '<img src="data:image/jpeg;base64,'.base64_encode( $offer->getPicture() ).'" width="100" height="100"/>';
                }
                echo     '</div>';
            }
        }
    }
?>

</body>

</html>