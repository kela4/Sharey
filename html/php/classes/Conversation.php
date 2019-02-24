<?php
/**
 * if you use Conversation-Class in an other file, include also <Message>-Class
 */

class Conversation{
    private $active; //bool
    private $conID; //int
    private $oaID; //int --> offer acceptor
    private $ocID; //int --> offer creator
    private $offerID; //int
    private $lastMessage; //message-Array
    private $offerTitle;

    public function __construct(bool $active, int $conID, int $oaID, int $ocID, int $offerID, Message $lastMessage = null, string $offerTitle){
        $this->active = $active;
        $this->conID = $conID;
        $this->oaID = $oaID;
        $this->ocID = $ocID;
        $this->offerID = $offerID;
        $this->lastMessage = $lastMessage;
        $this->offerTitle = $offerTitle;
    }

    public static function startConversation(int $oaID, int $ocID, int $offerID){ 
        return $con;
    }

    public static function deleteConversation(int $conID){
        return true;
    }

    /**
     * returns a conversation
     */
    public static function getConversation(int $conID){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "SELECT c.*, o.or_title
                    FROM tbl_conversation c
                    JOIN tbl_offer o
                        ON c.cn_offerID = o.or_offerID
                    WHERE c.cn_conID = ".$conID.";";

        $res = mysqli_query($connection, $query);
        
        $data = mysqli_fetch_array($res);
                
        return new Conversation($data['cn_active'], $data['cn_conID'], $data['cn_oaID'], $data['cn_ocID'], $data['cn_offerID'], null, $data['or_title']);
    }

    /**
     * return unread messages if conversation is open
     */
    public static function getUnreadMessages(int $conID, int $requestUser){
        $connection = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($connection, 'shareyvorlage');
        
        $query = "SELECT * FROM message WHERE conID ='".$conID."' AND messageRead = false AND senderID != ".$requestUser." ORDER BY sendDate;"; //aSC/DESC???
        $res = mysqli_query($connection, $query);

        $messages = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $messages[] = new Message($data['conID'], utf8_encode($data['content']), new DateTime($data['sendDate']), $data['messageID'], $data['messageRead'], $data['senderID']);
        }

        markMessagesAsReaded($messages);

        return $messages;
    }

    //returns all messages of a conversation, the latest message is the first one, the last message the last one in the array
    //unreaded messages will be marked as readed --> for this part, the $requestUserID is needed
    public function getAllMessages($requestUserID){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "SELECT m.me_messageID, m.me_conID, m.me_content, m.me_sendDate, m.me_messageRead, m.me_senderID 
                    FROM tbl_conversation AS c 
                    JOIN tbl_message m 
                    ON c.cn_conID = m.me_conID 
                    WHERE c.cn_conID = ".$this->conID."
                    ORDER BY m.me_sendDate;";

        $res = mysqli_query($connection, $query);

        $messages = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $messages[] = new Message($data['me_conID'], utf8_encode($data['me_content']), new DateTime($data['me_sendDate']), $data['me_messageID'], $data['me_messageRead'], $data['me_senderID']);
        }

        //mark all unread messages as readed:
        $unreadMessages = [];

        foreach($messages as $message){
            if(!$message->getMessageRead() && $message->getSenderID() != $requestUserID){
                $unreadMessages[] = $message;
            }
        }

        if($unreadMessages){
            markMessagesAsReaded($unreadMessages);
        }        

        return $messages;
    }

    #region getter

    public function getActive(){
        return $this->active;
    }

    public function getConID(){
        return $this->conID;
    }

    public function getOaID(){
        return $this->oaID;
    }

    public function getOcID(){
        return $this->ocID;
    }

    public function getOfferID(){
        return $this->offerID;
    }

    public function getLastMessage(){
        return $this->lastMessage;
    }

    public function getOfferTitle(){
        return $this->offerTitle;
    }

    #endregion
}

function markMessagesAsReaded($messages){
    if($messages){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        //create ID-String for Query
        $messageIDs = "";
        foreach($messages as $message){
            $messageIDs = $messageIDs.', '.$message->getMessageID();
        }

        $messageIDs = substr($messageIDs, 1);
        
        $query = "UPDATE tbl_message SET me_messageRead = true WHERE me_messageID IN (".$messageIDs.")";
        mysqli_query($connection, $query);

        return true;
    }else{
        return false;
    }       
}

?>