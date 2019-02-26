<?php
/**
 * if you use Offer-Class in an other file, include also <Tag, PLZ>-Class
 */

class Offer{
    private $active; //bool
    private $date; //date
    private $description; //string
    private $mhd; //date
    private $offerID; //int
    private $picture; //string
    private $plz; //PLZ
    private $report; //int
    private $tag; //Tag
    private $title; //string 
    private $ocID; //int
 
    public function __construct(bool $active, DateTime $date, string $description, DateTime $mhd, int $offerID, string $picture = null, PLZ $plz, int $report, Tag $tag, string $title, int $ocID){
        $this->active = $active;
        $this->date = $date;
        $this->description = $description;
        $this->mhd = $mhd;
        $this->offerID = $offerID;
        $this->picture = $picture;
        $this->plz = $plz;
        $this->report = $report;
        $this->tag = $tag;
        $this->title = $title;
        $this->ocID = $ocID; 
    }

    public static function deleteOffer(int $offerID){ 
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "UPDATE tbl_offer 
                    SET or_active = false
                    WHERE or_offerID = ".$offerID.";";
        
        $success = mysqli_query($connection, $query);

        if($success){
            //get all conversations to this offer and delete them and send offer deleted message
            $conversations = Conversation::getConversationsToOffer($offerID);

            foreach($conversations as $conversation){
                //set conversation to inactive
                Conversation::deleteConversation($conversation->getConID());
                Message::sendOfferDeletedMessage($conversation->getConID(), $conversation->getOcID());
            }

            return true; //offer was deleted (set to inactive)
        }else{
            return false;
        }
    }

    public static function setSearch(string $searchTerm = null, int $plzID = null, int $surrounding = null, int $tagID = null){
        //search- and filterparameters not implemented yet
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "SELECT o.*, t.*, p.pz_plzID, p.pz_location, p.pz_plz FROM tbl_offer AS o 
                    JOIN tbl_plz p 
                    ON p.pz_plzID = o.or_plzID 
                    JOIN tbl_tag t 
                    ON t.tg_tagID = o.or_tagID 
                    WHERE o.or_active = 1;";

        $res = mysqli_query($connection, $query);

        $offersWithDistanceFromPoint = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $offersWithDistanceFromPoint[] = [
                                                "offer" => new Offer($data['or_active'], new DateTime($data['or_creationDate']), $data['or_description'], new DateTime($data['or_mhd']), $data['or_offerID'], $data['or_picture'], new PLZ($data['pz_location'], $data['pz_plz'], $data['pz_plzID']), $data['or_report'], new Tag($data['tg_color'], $data['tg_description'], $data['tg_tagID']), $data['or_title'], $data['or_ocID']),
                                                "distanceFromStartPoint" => "10"
                                                ];
            
        }

        return $offersWithDistanceFromPoint;
    }

    public static function getOffer(int $offerID){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');

        $query = "SELECT o.*, t.*, p.pz_plzID, p.pz_location, p.pz_plz FROM tbl_offer AS o 
                    JOIN tbl_plz p 
                        ON p.pz_plzID = o.or_plzID 
                    JOIN tbl_tag t 
                        ON t.tg_tagID = o.or_tagID 
                    WHERE o.or_offerID = ".$offerID." AND o.or_active = 1;";

        $res = mysqli_query($connection, $query);

        $data = mysqli_fetch_array($res);

        $offer = null;
        
        if(isset($data)){
            $offer = new Offer($data['or_active'], new DateTime($data['or_creationDate']), $data['or_description'], new DateTime($data['or_mhd']), $data['or_offerID'], $data['or_picture'], new PLZ($data['pz_location'], $data['pz_plz'], $data['pz_plzID']), $data['or_report'], new Tag($data['tg_color'], $data['tg_description'], $data['tg_tagID']), $data['or_title'], $data['or_ocID']);
        }

        return $offer;
    }

    public function toJson() {
        $mhd = null;
        if($this->getMhd() != new DateTime('0000-00-00')){
            $mhd = $this->getMhd()->format('d-m-Y');
        }
        return json_encode(array(
            'active' => $this->getActive(),
            'date' => $this->getDate()->format('d-m-Y'),
            'description' => $this->getDescription(),
            'mhd' => $mhd,
            'offerID' => $this->getOfferID(),
            'picture' => base64_encode($this->getPicture()),
            'plz' => $this->getPLZ()->toJson(),
            'report' => $this->getReport(),
            'tag' => $this->getTag()->toJson(),
            'title' => $this->getTitle(),
            'ocID' => $this->getOcID()      
        ));
    }

    public function edit(string $title, string $content, int $tagID, DateTime $mhd, string $picture){ //String, String, int, date, String
        //not implemented in prototype
        return $offer;
    }

    /**
     * call this method if an offer was reported
     * report counter will incremented
     * if an offer has a report counter >= 5 --> the offer will be deleted
     */
    public function reportCount(){
        //not implemented in prototype
        return true;
    }


#region getters

    public function getActive(){
        return $this->active;
    }

    public function getDate(){
        return $this->date;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getMhd(){
        return $this->mhd;
    }

    public function getOfferID(){
        return $this->offerID;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function getPlz(){
        return $this->plz;
    }

    public function getReport(){
        return $this->report;
    }

    public function getTag(){
        return $this->tag;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getOcID(){
        return $this->ocID;
    }
#endregion

}

?>