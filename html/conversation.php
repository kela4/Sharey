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

    <div class="content">
        <!-- Div content for padding-top (header) -->
        <div class="container">

            <div id="conversationButtons">
                <div class="btn-group btn-group-sm col-12" role="group">
                    <button type="button" class="btn btn-success" title="Angebot
                        angenommen"><i
                            class="fas fa-check"></i> Angebot
                        angenommen</button>
                    <button type="button" class="btn btn-danger" title="Konversation
                        löschen"><i
                            class="fas fa-trash"></i>
                        Konversation
                        löschen</button>
                </div>

            </div>
            <div id="conversationHeading">
                <h1>Konversation</h1>
            </div>






            <div id="messageArea">

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
                        <textarea id="newMessageText" class="form-control" rows="2"></textarea>
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