<?php
/**
 * if you use User-Class in an other file, include also <Conversation, Message, Offer, PLZ and Tag>-Class
 */

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

    /**
     * check correct login-dates and start a session, add user-object to sessionstorage
     */
    public static function login(string $mail, string $password){         
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        $userMail = strtolower($mail);
        
        $query = "SELECT ur_userID, ur_userPassword, ur_notification FROM tbl_user WHERE ur_mail = '".$userMail."' AND ur_active = true;";
        
        $res = mysqli_query($connection, $query);
        
        $data = mysqli_fetch_array($res);

        //salting password and hash salt+password:
        $saltDynamic = substr($mail, 0, 4);
        $saltStatic = "!Ma4#0";
        $hashedPassword = hash('sha256', $saltDynamic.$password.$saltStatic);

        if($hashedPassword == $data['ur_userPassword']){
            //password right
            session_start();
            $_SESSION['user'] = new User(true, $userMail, $data['ur_notification'], $data['ur_userPassword'], $data['ur_userID']);
            return true;
        }else{
            //password wrong
            return false;
        }
    }

    /**
     * only check, that logindates are correct, don't start a session
     */
    public static function checkLoginDates(string $mail, string $password){         
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        $userMail = strtolower($mail);
        
        $query = "SELECT ur_userID, ur_userPassword FROM tbl_user WHERE ur_mail = '".$userMail."' AND ur_active = true;";
        
        $res = mysqli_query($connection, $query);
        $resRowsNo = mysqli_num_rows($res);

        if($resRowsNo != 0){
            $data = mysqli_fetch_array($res);

            //salting password and hash salt+password:
            $saltDynamic = substr($mail, 0, 4);
            $saltStatic = "!Ma4#0";
            $hashedPassword = hash('sha256', $saltDynamic.$password.$saltStatic);

            if($hashedPassword == $data['ur_userPassword']){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * delete User
     */
    public static function deleteUser(int $userID){
        //not implemented in prototype
        return true;
    }

    /**
     * register new user
     */
    public static function registration(string $mail, string $password){ 
        //not implemented in prototype
        return $user;
    }

    /**
     * edit account informations ex. e-mail-notifications
     */
    public function changeAccount(string $password, string $mail){
        //not implemented in prototype 
        return true;
    }

    /**
     * create new offer
     */
    public function createOffer(string $content, $mhd = null, string $title, int $tagID, $picture = null, int $plzID){
        //insert offer into db:
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "INSERT INTO tbl_offer(or_ocID, or_active, or_creationDate, or_description, or_mhd, or_picture, or_plzID, or_report, or_tagID, or_title) 
                    VALUES ('".$this->userID."', true, '".date('Y-m-d H:i:s')."', '".$content."', '".$mhd->format('Y-m-d')."', '".$picture."', ".$plzID.", '0', ".$tagID.", '".$title."');";

        if(!mysqli_query($connection, $query)){
            return false;
        }else{
            return true;
        }
    }

    /**
     * edit own offer
     */
    public function editOffer(int $offerID, bool $active, string $title, string $content, string $picture){
        //not implemented in prototype
        return $offer;
    }

    /**
     * logout user --> destroy session
     */
    public function logout(){
        session_destroy();

        return !empty($_SESSION['user']);
    }

    /**
     * report an offer
     */
    public function reportOffer(int $offerID){
        //not implemented in prototype
        return true;
    }

    /**
     * send a message in conversation
     */
    public function sendMessage(int $conID, string $content){ 
        $message = Message::createMessage($this->userID, $conID, $content);

        if($message == false){
            return null;
        }else{
            return $message;
        }
    }

    /**
     * show interest of an offer
     * check -> is there an active con in db with same offerID and userID? if not --> start new con
     */
    public function showInterest(int $offerID){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        $query = "SELECT cn_conID 
                    FROM tbl_conversation 
                    WHERE cn_oaID = ".$this->userID." AND cn_offerID = ".$offerID." AND cn_active = 1;";

        $res = mysqli_query($connection, $query);
        $resRowsNo = mysqli_num_rows($res);
        
        if($resRowsNo == 0){ //if no conversation exists to this offer with the same oaID as the current interest-user
            //start Conversation
            $success = Conversation::startConversation($this->userID, $offerID);
            return $success;
        }else{
            return false;
        }
    }

    /**
     * returns an array of all active offers of the current user
     */
    public function getOwnOffers(){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "SELECT o.*, p.pz_plz, p.pz_location, p.pz_plzID, t.tg_description AS tagDescription, t.tg_color AS tagColor, t.tg_tagID AS tagID 
                    FROM tbl_offer AS o 
                    JOIN tbl_tag AS t 
                        ON o.or_tagID = t.tg_tagID 
                    JOIN tbl_plz AS p 
                        ON o.or_plzID = p.pz_plzID 
                    WHERE o.or_ocID = ".$this->getUserID()." AND o.or_active = true
                    ORDER BY o.or_creationDate DESC;";

        $res = mysqli_query($connection, $query);

        $offers = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $offers[] = new Offer($data['or_active'], new DateTime($data['or_creationDate']), utf8_encode($data['or_description']), new DateTime($data['or_mhd']), $data['or_offerID'], $data['or_picture'], new PLZ(utf8_encode($data['pz_location']), $data['pz_plz'], $data['pz_plzID']), $data['or_report'], new Tag($data['tagColor'], utf8_encode($data['tagDescription']), $data['tagID']), utf8_encode($data['or_title']), $data['or_ocID']);
        }

        return $offers;
    }

    /**
     * returns all conversations and the last message to each conversation
     */
    public function getConversations(){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

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
                    AND (c.cn_active = true OR (m.me_messageRead = 0 AND m.me_senderID != ".$this->getUserID()."))
                    ORDER BY o.or_offerID;"; //order by offerID is important for grouping conversations under an offer
        
        $res = mysqli_query($connection, $query);
        
        $conversations = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $conversations[] = new Conversation($data['cn_active'], $data['cn_conID'], $data['cn_oaID'], $data['cn_ocID'], $data['cn_offerID'], new Message($data['cn_conID'], $data['me_content'], new DateTime($data['me_sendDate']), $data['me_messageID'], $data['me_messageRead'], $data['me_senderID']), $data['or_title']);
        }

        return $conversations;
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