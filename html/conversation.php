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

                <div class="row justify-content-end">
                    <div class="card col-sm-8 col-9" id="senderDark">
                        <p>Hallo du :D</p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="card col-sm-8 col-9" id="senderLight">
                        <p>Was geht so?</p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="card col-sm-8 col-9" id="senderDark">
                        <p>Gut und dir?</p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="card col-sm-8 col-9" id="senderLight">
                        <p>Kannst mir den Jogurt geben?</p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="card col-sm-8 col-9" id="senderDark">
                        <p>sender: '.$message->getSenderID().': '.$message->getDate()->format('Y-m-d H:i:s').'
                            '.$message->getContent().'</p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="card col-sm-8 col-9" id="senderLight">
                        <p>sender: '.$message->getSenderID().': '.$message->getDate()->format('Y-m-d H:i:s').'
                            '.$message->getContent().dsdsdsdsdsdsdsdsdsdsdsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'
                        </p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="card col-sm-8 col-9" id="senderDark">
                        <p>sender: '.$message->getSenderID().': '.$message->getDate()->format('Y-m-d H:i:s').'
                            '.$message->getContent().'</p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="card col-sm-8 col-9" id="senderLight">
                        <p>sender: '.$message->getSenderID().': '.$message->getDate()->format('Y-m-d H:i:s').'
                            '.$message->getContent().dsdsdsdsdsdsdsdsdsdsdsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'
                        </p>
                        <div class="float-right" id="timestampMessage">01.01.2000 12:00</div>
                    </div>
                </div>
                <br>

            </div>


            <p id="anker"></p>
            <div id="newMessage">
                <div class="container">
                    <div class="input-group">
                        <textarea id="newMessageText" class="form-control" rows="1"></textarea>
                        <button id="sendButton" class="btn btn-secondary float-right">Senden</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php
        include('basicsiteelements/scripts.php');
    ?>
</body>

</html>