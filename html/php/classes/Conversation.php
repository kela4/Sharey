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

    public function __construct(bool $active, int $conID, int $oaID, int $ocID, int $offerID, Message $lastMessage = null, string $offerTitle = null){
        $this->active = $active;
        $this->conID = $conID;
        $this->oaID = $oaID;
        $this->ocID = $ocID;
        $this->offerID = $offerID;
        $this->lastMessage = $lastMessage;
        $this->offerTitle = $offerTitle;
    }

    /**
     * creates a new converation in database and sends the autostartmessage that 
     * an user has interest of an offer
     */
    public static function startConversation(int $oaID, int $offerID){ 
        //get int $ocID --> check if offerinterestor not equals to offercreator
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        $query = "SELECT or_ocID 
                    FROM tbl_offer WHERE or_offerID = ".$offerID.";";

        $res = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($res);
        $ocID  = $data['or_ocID'];

        if($ocID == $oaID){ //own offer --> conversation can't be started
            return false;
        }

        //start conversation
        $query = "INSERT INTO tbl_conversation(cn_active, cn_oaID, cn_ocID, cn_offerID) 
                    VALUES (true, ".$oaID.", ".$ocID.", ".$offerID.");";

        $success = mysqli_query($connection, $query);
        
        if($success){
            //get ConID of new Conversation
            $query = "SELECT cn_conID 
                        FROM tbl_conversation 
                        WHERE cn_oaID = ".$oaID." AND cn_ocID = ".$ocID." AND cn_offerID = ".$offerID." AND cn_active = 1";

            $res = mysqli_query($connection, $query);
            $data = mysqli_fetch_array($res);
            $conID  = $data['cn_conID'];

            //send and create autoStart Message:
            $success = Message::sendAutoStartMessage($conID, $oaID);
            return $success;

        }else{
            return false;
        }
    }

    /**
     * deletes a conversation (set to inactive) and deletes all messages of the conversation 
     */
    public static function deleteConversation(int $conID){
        //set conversation to inactive
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "UPDATE tbl_conversation 
                    SET cn_active = false
                    WHERE cn_conID = ".$conID.";";
        
        $success = mysqli_query($connection, $query);

        if($success){
            //delete all Messages
            require('dbconnect.php');
            mysqli_select_db($connection, 'db_sharey');
            
            $query = "DELETE FROM tbl_message 
            WHERE me_conID = ".$conID.";";
            
            $success = mysqli_query($connection, $query);  
            if($success){
                return true;
            }else{
                return false;
            }          
        }else{
            return false;
        }
    }

    /**
     * returns a specific conversation
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
     * get all conversations to a specific offer
     */
    public static function getConversationsToOffer(int $offerID){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        $query = "SELECT c.*
                    FROM tbl_conversation c
                    WHERE c.cn_offerID = ".$offerID."";
        
        $res = mysqli_query($connection, $query);
        
        $conversations = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $conversations[] = new Conversation($data['cn_active'], $data['cn_conID'], $data['cn_oaID'], $data['cn_ocID'], $data['cn_offerID'], null, null);
        }

        return $conversations;
    }

    /**
     * return unread messages if conversation is open
     * for this part, the $requestUserID is needed, cause of only messages will return, which the requestUser hasn't readed yet
     */
    public static function getUnreadMessages(int $conID, int $requestUser){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "SELECT * 
                    FROM tbl_message 
                    WHERE me_conID = ".$conID." 
                    AND me_messageRead = false 
                    AND me_senderID != ".$requestUser."
                    ORDER BY me_sendDate;";
        $res = mysqli_query($connection, $query);

        $messages = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $messages[] = new Message($data['me_conID'], $data['me_content'], new DateTime($data['me_sendDate']), $data['me_messageID'], $data['me_messageRead'], $data['me_senderID']);
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
            $messages[] = new Message($data['me_conID'], $data['me_content'], new DateTime($data['me_sendDate']), $data['me_messageID'], $data['me_messageRead'], $data['me_senderID']);
        }

        //get all unread messages:
        $unreadMessages = [];

        foreach($messages as $message){
            if(!$message->getMessageRead() && $message->getSenderID() != $requestUserID){
                $unreadMessages[] = $message;
            }
        }

        //mark all unread Messages as readed
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

/**
 * function to mark all messages in $messages als readed
 */
function markMessagesAsReaded($messages){
    if($messages){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        //create ID-String of messages for Query
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