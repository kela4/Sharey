<?php
    require_once('../php/classes/Conversation.php');
    require_once('../php/classes/Message.php');
    require_once('../php/classes/User.php');
?>

<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Konversation</title>

    <link href="../sources/bootstrap.min.css" rel="stylesheet"/>
    <script src="../sources/jquery-3.2.1.slim.min.js"></script>
    <script src="../sources/popper.min.js"></script>
    <script src="../sources/bootstrap.min.js"></script>

    <script src="../sources/jquery.min.js"></script>
</head>
    
<body>

<h3>Konversation</h3>

<div id="messagesContainer" class="container">

<?php
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        
        $conversation = Conversation::getConversation(intval($_POST['conID']));
        $messages = $conversation->getAllMessages($_SESSION['user']->getUserID());
        
        foreach($messages as $message){

            if($message->getSenderID() == $_SESSION['user']->getUserID()){
                echo '  <div class="row justify-content-end">
                            <div class="col-sm-8" style="background-color:honeydew">
                                <p>sender: '.$message->getSenderID().': '.$message->getDate()->format('Y-m-d H:i:s').' '.$message->getContent().'</p>
                            </div>
                        </div>';
                echo '<br>';
            }else{
                echo '  <div class="row">
                            <div class="col-sm-8" style="background-color:gray">
                                <p>sender: '.$message->getSenderID().': '.$message->getDate()->format('Y-m-d H:i:s').' '.$message->getContent().'</p>
                            </div>
                        </div>';
                echo '<br>';
            }

        }
    }

?>

</div>

<br><br><br><br><br><br><br><br><br>

<div class="container" style="position:fixed; bottom: 5%; left:10%; right:10%; align: center;">
    <div class="row align-items-center">
        <div class="col-10">
            <textarea id="newMessageText" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-2">
            <?php echo '<input id="conIDMessage" hidden value="'.$_POST['conID'].'"/>'; ?>
            <button id="sendButton" class="btn btn-secondary">Send</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        var conID = $('#conIDMessage').val();

        setInterval(function(){messageRequest();}, 5000);
        $("#sendButton").on("click", function(){
            alert('asdf');
            var newMessageText = $('#newMessageText').html();
            if(newMessageText){ //if newMessageText contains some message
                //send message to server
                $.ajax({
                    url: '../php/sendMessage.php',
                    data: {messageContent: newMessageText, conID: conID},
                    dataType: 'json',
                    type: 'post',
                    success: function(data){
                        $('#messagesContainer').append('<div class="row justify-content-end">' +
                            '<div class="col-sm-8" style="background-color:honeydew">' +
                                '<p>sender: ' + data.senderID + ': ' + data.date.date.substring(0,19) + ' ' + data.content + '</p>' +
                            '</div>' +
                        '</div>');

                        $('#newMessageText').html("");

                        console.log( JSON.stringify(data) );
                    },
                    error: function(err){
                        alert("Ein Fehler liegt vor, bitte erneut versuchen: " + err);
                    }
                });
            }else{
                //do nothing
            }
        });

        /*$('#sendButton').click(function (event){
            var newMessageText = $('#newMessageText').html();
            if(newMessageText){ //if newMessageText contains some message
                //send message to server
                $.ajax({
                    url: '../php/sendMessage.php',
                    data: {messageContent: newMessageText, conID: conID},
                    dataType: 'json',
                    type: 'post',
                    success: function(data){
                        $('#messagesContainer').append('<div class="row justify-content-end">' +
                            '<div class="col-sm-8" style="background-color:honeydew">' +
                                '<p>sender: ' + data.senderID + ': ' + data.date.date.substring(0,19) + ' ' + data.content + '</p>' +
                            '</div>' +
                        '</div>');

                        $('#newMessageText').html("");

                        console.log( JSON.stringify(data) );
                    },
                    error: function(err){
                        alert("Ein Fehler liegt vor, bitte erneut versuchen: " + err);
                    }
                });
            }else{
                //do nothing
            }
        });*/

        function messageRequest(){
            $.ajax({
                    url: '../php/getUnreadMessages.php',
                    data: {conID: conID},
                    dataType: 'json',
                    type: 'post',
                    success: function(data){
                        console.log(JSON.stringify(data) );
                    },
                    error: function(err){
                        alert("Ein Fehler liegt vor, bitte erneut versuchen: " + err);
                    }
                });
        }

    })
</script>

</html>