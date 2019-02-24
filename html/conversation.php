<?php
    require_once('php/classes/User.php');
    require_once('php/classes/Offer.php');
    require_once('php/classes/Tag.php');
    require_once('php/classes/Conversation.php');
    require_once('php/classes/Message.php');
    require_once('php/classes/PLZ.php');
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
        include('basicsiteelements/navigationpages.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->
        <div class="container">
            <div id="paddingtopMobil"></div>


            <div class="container fixed-top" id="conversationButtons">
                <div class="row">
                    <div class="col-10">
                        <button type="button" class="btn btn-sm btn-success" title="Angebot angenommen"><i
                                class="fas fa-check"></i> Angebot angenommen</button>
                        <button type="button" class="btn btn-sm btn-danger" title="Konversation löschen"><i
                                class="fas fa-trash"></i>
                            Konversation löschen</button>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-sm btn-secondary float-right" title="Zurück"
                            onclick="history.go(-1)"><i class=" fas fa-times"></i></button>
                    </div>

                </div>
            </div>


            <div id="conversationHeading">
                <h1>Konversation</h1>
            </div>

            <div id="messageArea">

                <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        if(isset($_POST['conID']) && !empty($_POST['conID'])){
                            $conversation = Conversation::getConversation(intval($_POST['conID']));
                            $messages = $conversation->getAllMessages($_SESSION['user']->getUserID());

                            foreach($messages as $message){
                                if($message->getSenderID() == $_SESSION['user']->getUserID()){
                                    echo '  <div class="row justify-content-end">
                                                <div class="card col-sm-8 col-9" id="senderDark">
                                                    <p>'.$message->getContent().'</p>
                                                    <div class="float-right" id="timestampMessage">'.$message->getDate()->format('d-m-Y H:i').'</div>
                                                </div>
                                            </div>
                                            <br>';
                                }else{
                                    echo '  <div class="row">
                                                <div class="card col-sm-8 col-9" id="senderLight">
                                                    <p>'.$message->getContent().'</p>
                                                    <div class="float-right" id="timestampMessage">'.$message->getDate()->format('d-m-Y H:i').'</div>
                                                </div>
                                            </div>
                                            <br>';
                                }
                            }
                        }else{
                            header("Location: error.php");
                        }
                    }else{
                        header("Location: error.php?errormessage=Du bist nicht eingeloggt. Mitte melde dich an um auf deinen Account zuzugreifen.");
                    }
                ?>

            </div>


            <p id="anker"></p>
            <div id="newMessage">
                <div class="container">
                    <div class="input-group">
                        <textarea id="newMessageText" class="form-control" rows="1"></textarea>
                        <?php echo '<input id="conIDMessage" hidden value="'.$_POST['conID'].'"/>'; ?>
                        <button id="sendButton" class="btn btn-secondary float-right">Senden</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php
        include('basicsiteelements/scripts.php');
    ?>
    <script type="text/javascript" src="js/messageSendAndGet.js"></script>
</body>

</html>