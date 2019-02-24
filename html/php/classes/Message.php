<?php
/**
 * if you use Message-Class in an other file, include also <>-Class
 */

class Message{
    private $conID; //int
    private $content; //string
    private $date; //timestamp
    private $messageID; //int
    private $messageRead; //bool
    private $senderID; //int

    public function __construct(int $conID, string $content, DateTime $date, int $messageID = null, bool $messageRead = null, int $senderID){
        $this->conID = $conID;
        $this->content = $content;
        $this->date = $date;
        $this->messageID = $messageID;
        $this->messageRead = $messageRead;
        $this->senderID = $senderID;
    }

    public static function getMessage(int $messageID){
        return $message;
    }

    public static function createMessage(int $senderID, int $conID, string $content){
        $sendDate = date('Y-m-d H:i:s');
        
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "
                    INSERT INTO tbl_message(me_conID, me_content, me_sendDate, me_messageRead, me_senderID) 
                    VALUES (".$conID.", '".$content."', '".$sendDate."', false, ".$senderID.");";
        
        $success = mysqli_query($connection, $query);

        if($success){
            //messageID and messageRead won't be needed in result, cause of this, these params are null
            return new Message($conID, $content, new DateTime($sendDate), null, null, $senderID);
        }else{
            return false;
        }
    }

    public static function deleteMessage(int $messageID){ 
        return true;
    }

    public static function sendAutoStartMessage(int $conID){
        return true;
    }

    public function sendInfoMessage(int $messageID){ 
        return true;
    }

    public function toJson() {
        return json_encode(array(
            'conID' => $this->getConID(),
            'content' => $this->getContent(),
            'date' => $this->getDate()->format('d-m-Y H:i'),
            'messageID' => $this->getMessageID(),
            'messageRead' => $this->getMessageRead(),
            'senderID' => $this->getSenderID()         
        ));
    }

    #region getter

    public function getConID(){
        return $this->conID;
    }

    public function getContent(){
        return $this->content;
    }

    public function getDate(){
        return $this->date;
    }

    public function getMessageID(){
        return $this->messageID;
    }

    public function getMessageRead(){
        return $this->messageRead;
    }

    public function getSenderID(){
        return $this->senderID;
    }

    #endregion
}

?>