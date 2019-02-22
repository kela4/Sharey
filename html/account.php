<?php
    require_once('php/classes/User.php');
    require_once('php/classes/Offer.php');
    require_once('php/classes/Tag.php');
    require_once('php/classes/Conversation.php');
    require_once('php/classes/Message.php');
?>

<!DOCTYPE html>
<html>

<head>
    <?php
        include('basicsiteelements/header.php');
    ?>
</head>

<body>

    <?php
        include('basicsiteelements/navigation.php');
    ?>

<?php
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ //only show page if a user is logged in
        ?>
            <div class="content">
                <!-- Div content for padding-top (header) -->
                <div class="container">

                    <div class="row">

                        <div class="col-lg-6">
                            <h1>Account</h1>
                            <!--account features not implemented yet-->
                            <ul class="list-unstyled">
                                <li><a title="Passwort ändern">Passwort ändern</a></li>
                                <li><a title="E-Mail ändern">E-Mail ändern</a></li>
                                <li><a title="Account löschen"> Account löschen</a></li>
                            </ul>
                        </div>

                        <div id="message" class="col-lg-6">
                            <h1>Nachrichten</h1>
                            <ul class="list-unstyled">
                                <!--feature not implemented yet-->
                                <li>E-Mail-Benachrichtigung
                                    <div class="form-check" id="checkbox">
                                        <input type="checkbox" class="form-check-input">
                                    </div>
                                </li>
                            </ul>

                            <!--print conversations with last message-->
                            <?php
                                $conversations = $_SESSION['user']->getConversations();

                                echo "Cons:".var_dump($conversations);

                                if(!empty($conversations)){
                                    $currentOfferID = 0;
                                    $acceptorCounter = 1;
                                    $offerCounter = 1;

                                    foreach($conversations as $conversation){ //if offerID of current conversation equals to offerID of the previous conversation --> add only the lastMessage
                                        if(!empty($conversation->getLastMessage())){ //if in the conversation actually a message is present
                                            if($conversation->getOfferID() == $currentOfferID){
                                                echo '  <form method="POST" action="conversation.php#anker">
                                                            <input type="text" hidden required name="conID" value="'.$conversation->getConID().'" />
                                                            <div class="col-12">
                                                                <button class="btn shadow-none" type="submit">
                                                                    <div style="display: inline;">@'.$acceptorCounter.' '.$conversation->getLastMessage()->getContent().'</div>
                                                                    <div style="display: inline;">...</div>
                                                                    <div class="float-right" id="timestampLight">'.$conversation->getLastMessage()->getDate()->format('Y-m-d H:i').'</div>
                                                                </button>
                                                            </div>
                                                        </form>';
                                            }else{ //if offerID of current conversation not equals to offerID of the previous conversation --> add a new title and then the lastMessage
                                                if($currentOfferID != 0){
                                                    echo '</div>'; //closing div of the group of conversations of one offer
                                                }

                                                $acceptorCounter = 1;

                                                //color for offer-group:
                                                $colorOfferGroup = "messageDark";   
                                                if(intval($offerCounter)%2 == 0){
                                                    $colorOfferGroup = "messageLight";
                                                }

                                                //if offer-counter ist ungerade, dann dunkelgrau er div, sonst hellgrau
                                                echo '<div class="card" id="'.$colorOfferGroup.'">
                                                        <h4>Ein Jogurt</h4>
                                                        <form method="POST" action="conversation.php#anker">
                                                            <input type="text" hidden required name="conID" value="'.$conversation->getConID().'" />
                                                            <div class="col-12">
                                                                <button class="btn shadow-none" type="submit">
                                                                    <div style="display: inline;">@'.$acceptorCounter.' '.$conversation->getLastMessage()->getContent().'</div>
                                                                    <div style="display: inline;">...</div>
                                                                    <div class="float-right" id="timestampLight">'.$conversation->getLastMessage()->getDate()->format('Y-m-d H:i').'</div>
                                                                </button>
                                                            </div>
                                                        </form>';

                                                $currentOfferID = $conversation->getOfferID();
                                                $offerCounter++;
                                            }

                                            $acceptorCounter++;
                                        }
                                    }
                                    echo '</div>'; //closing div for last offer-con-container
                                 }
                            ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <h1>Eigene Angebote</h1>
                            <div class="container mt-4">
                                <div class="row justify-content-center">

                                    <?php 
                                for($i = 0; $i<3; $i++){
                                    ?>
                                    <div class="col-auto m-3 card bg-success" id="card">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="row">
                                                    <div id="offerTagDiv">
                                                        <svg width="150px" height="55px">
                                                            <polygon points="10,30 30,10 140,10 140,50 30,50"
                                                                id="offerTagPolygon" />
                                                            <text x="40" y="36" fill="white">Essen</text>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="=col-auto">
                                                        <div id="locationTagDiv">
                                                            <i class="fas fa-map-marker-alt" id="locationTag"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div id="cityDiv">
                                                            <span id="whiteText">Mosbach</span>
                                                            <br>
                                                            <span id="whiteText">15 km</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <br>
                                                <br>
                                                <img src="../images/yoghurt.jpg" id="offerImage">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="offerDescriptionDiv">
                                                    <h5 id="whiteText">Ein Joghurt</h5>
                                                    <p id="whiteText">Habe einen Naturjoghurt übrig. Will den
                                                        jemand?<br>Dritte
                                                        Textzeile
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                }
                            ?>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        <?php                    
    }
?>

    <?php
        include('basicsiteelements/scripts.php');
    ?>
</body>

</html>
