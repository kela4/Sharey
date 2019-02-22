<?php
require_once('Tag.php');
require_once('Offer.php');
require_once('Conversation.php');
require_once('Message.php');

class User{
    private $active; //bool
    private $mail; //string
    private $notification; //bool
    private $password; //string
    private $userID; //int

    public function __construct(bool $active, string $mail, bool $notification, string $password, int $userID){
        $this->active = $active;
        $this->mail = $mail;
        $this->notification = $notification;
        $this->password = $password;
        $this->userID = $userID;
    }

    public static function getUser(int $userID){
        return $user;
    }

    public static function login(string $mail, string $password){ 
        require_once('./dbconnect.php');
        
        $query = "SELECT ur_userID, ur_userPassword, ur_notification FROM tbl_user WHERE ur_mail = '".$mail."' AND ur_active = true;";
        
        $res = mysqli_query($connection, $query);
        
        $data = mysqli_fetch_array($res);

        if(hash('sha256', $password) == $data['ur_userPassword']){
            //password right
            session_start();
            $_SESSION['user'] = new User(true, $mail, $data['ur_notification'], $data['ur_userPassword'], $data['ur_userID']);
            return true;
        }else{
            //password wrong
            return false;
        }
    }

    public static function deleteUser(int $userID){
        return true;
    }

    public static function registration(string $mail, string $password){ 
        return $user;
    }

    public function changeAccount(string $password, string $mail){ 
        return true;
    }

    public function createOffer(string $content, DateTime $mhd, string $title, int $tagID, $picture, int $plzID){
        //insert offer into db:
        $connection = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($connection, 'shareyvorlage');
        
        $query = "
            INSERT INTO offer(ocID, active, creationDate, description, mhd, picture, plzID, report, tagID, title) 
            VALUES ('".$this->userID."', true,'".date('Y-m-d H:i:s')."', '".$content."', '".$mhd->format('Y-m-d H:i:s')."', '".$picture."', '".$plzID."', '0', '".$tagID."', '".$title."');";
        
        if(!mysqli_query($connection, $query)){
            return false;
        }else{
            return true;
        }
    }

    public function dontTakeOffer(int $offerID){
        return true;
    }

    public function editOffer(int $offerID, bool $active, string $title, string $content, string $picture){
        return $offer;
    }

    public function logout(){
        session_destroy();

        return !empty($_SESSION['user']);
    }

    public function reportOffer(int $offerID){
        return true;
    }

    public function sendMessage(int $conID, string $content){ 
        $message = Message::createMessage($this->userID, $conID, $content);

        if($message == false){
            return false;
        }else{
            return $message;
        }
    }

    public function showInterest(int $offerID){
        return true;
    }

    /**
     * returns an array of all active offers of the current user
     */
    public function getOwnOffers(){
        
        $connection = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($connection, 'shareyvorlage');
        
        $query = "SELECT o.*, p.plz, p.ort, t.description AS tagDescription, t.color AS tagColor FROM `offer` AS o 
                    JOIN tag AS t
                    ON o.tagID = t.tagID
                    JOIN plz AS p
                    ON o.plzID = p.plzID
                    WHERE o.ocID = ".$this->userID." AND o.active = true;";

        $res = mysqli_query($connection, $query);

        $offers = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $offers[] = new Offer($data['active'], new DateTime($data['creationDate']), utf8_encode($data['description']), new DateTime($data['mhd']), $data['offerID'], $data['picture'], $data['plz'], utf8_encode($data['ort']), $data['report'], new Tag($data['tagColor'], utf8_encode($data['tagDescription']), $data['tagID']), utf8_encode($data['title']), $data['ocID']);
        }

        return $offers;
    }

    public function takeOffer(int $offerID){
        return true;
    }

    /**
     * returns all conversations and the last message to each conversation
     */
    public function getConversations(){
        require_once('php/dbconnect.php');
        
        $query = "SELECT c.*, m.me_messageID, m.me_content, m.me_sendDate, m.me_messageRead, m.me_senderID, o.or_title 
                    FROM tbl_conversation c
                    JOIN tbl_message m
                        ON c.cn_conID = m.me_conID
                    JOIN (SELECT max(m.me_messageID) AS messageID, m.me_conID as conID 
                            FROM tbl_message m 
                            GROUP BY m.me_conID) AS mes
                        ON mes.messageID = m.me_messageID
                    
                    LEFT JOIN (SELECT min(m.me_messageID) AS msgID, m.me_conID as convID 
                            FROM tbl_message m 
                            GROUP BY m.me_conID) AS msg
                        ON msg.msgID = m.me_messageID
                    
                    JOIN tbl_offer o
                        ON c.cn_offerID = o.or_offerID
                    
                    WHERE (c.cn_oaID = ".$this->getUserID()." OR c.cn_ocID = ".$this->getUserID().")
                    AND c.cn_active = true
                    ORDER BY o.or_offerID;"; //order by offerID is important for grouping conversations under an offer
        
        $res = mysqli_query($connection, $query);
        return $res;
        /*$conversations = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $conversations[] = $data;
            //$conversations[] = new Conversation($data['cn_active'], $data['cn_conID'], $data['cn_oaID'], $data['cn_ocID'], $data['cn_offerID'], new Message($data['cn_conID'], $data['me_content'], new DateTime($data['me_sendDate']), $data['me_messageID'], $data['me_messageRead'], $data['me_senderID']), $data['or_title']);
        }

        return $conversations;*/
    }

    #region getter

    public function getActive(){
        return $this->active;
    }

    public function getMail(){
        return $this->mail;
    }

    public function getNotification(){
        return $this->notification;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getUserID(){
        return $this->userID;
    }

    #endregion
}

?>