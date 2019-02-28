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

        //query without filter and search (default for prototype):
        $query = "SELECT o.*, t.*, p.* FROM tbl_offer AS o 
                    JOIN tbl_plz p 
                        ON p.pz_plzID = o.or_plzID 
                    JOIN tbl_tag t 
                        ON t.tg_tagID = o.or_tagID 
                    WHERE o.or_active = 1;";

        /*//query only with filter and all tags:
        if(isset($plzID) && !empty($plzID) 
            && isset($surrounding) && !empty($surrounding)
            && isset($tagID) && !empty($tagID) && $tagID == 0){ //0 = all tags
                $query = "SELECT o.*, p.pz_location, t.tg_description, t.tg_color
                            FROM tbl_offer AS o 
                            JOIN tbl_tag t 
                                ON t.tg_tagID = o.or_tagID 
                            JOIN tbl_plz p 
                                ON p.pz_plzID = o.or_plzID 
                            WHERE o.or_plzID IN (SELECT calcLoc.pz_plzID
                                                FROM tbl_plz AS calcLoc
                            JOIN (SELECT *
                                    FROM tbl_plz
                                    WHERE pz_plzID = ".$plzID.") AS orgLoc
                            WHERE calcLoc.pz_longitude BETWEEN (orgLoc.pz_longitude-(1/111*".$surrounding.")) AND (orgLoc.pz_longitude+(1/111*".$surrounding.")) 
                            AND calcLoc.pz_latitude BETWEEN (orgLoc.pz_latitude-(1/111*".$surrounding.")) AND (orgLoc.pz_latitude+(1/111*".$surrounding.")))
                            AND o.or_active = 1;";
            }
            
        //query only with filter:
        if(isset($plzID) && !empty($plzID) 
        && isset($surrounding) && !empty($surrounding)
        && isset($tagID) && !empty($tagID)){ //only special tag
            $query = "SELECT o.*, p.pz_location, t.tg_description, t.tg_color
                        FROM tbl_offer AS o 
                        JOIN tbl_tag t 
                            ON t.tg_tagID = o.or_tagID 
                        JOIN tbl_plz p 
                            ON p.pz_plzID = o.or_plzID 
                        WHERE o.or_plzID IN (SELECT calcLoc.pz_plzID
                                            FROM tbl_plz AS calcLoc
                        JOIN (SELECT *
                                FROM tbl_plz
                                WHERE pz_plzID = ".$plzID.") AS orgLoc
                        WHERE calcLoc.pz_longitude BETWEEN (orgLoc.pz_longitude-(1/111*".$surrounding.")) AND (orgLoc.pz_longitude+(1/111*".$surrounding.")) 
                        AND calcLoc.pz_latitude BETWEEN (orgLoc.pz_latitude-(1/111*".$surrounding.")) AND (orgLoc.pz_latitude+(1/111*".$surrounding.")))
                        AND o.or_active = 1 
                        AND o.or_tagID = ".$tagID.";";
        }  

        //query with search and filter (not implemented in prototype):
        if(isset($searchTerm) && !empty($searchTerm) && $searchTerm != ""
            && isset($plzID) && !empty($plzID) 
            && isset($surrounding) && !empty($surrounding)
            && isset($tagID) && !empty($tagID)){
                $query = "SELECT o.*, p.pz_location, t.tg_description, t.tg_color
                            FROM tbl_offer AS o 
                            JOIN tbl_tag t 
                                ON t.tg_tagID = o.or_tagID 
                            JOIN tbl_plz p 
                                ON p.pz_plzID = o.or_plzID 
                            WHERE (o.or_title LIKE '".$searchTerm."' 
                            OR o.or_description LIKE '.$searchTerm.')
                            AND o.or_plzID IN (SELECT calcLoc.pz_plzID
                                                FROM tbl_plz AS calcLoc
                            JOIN (SELECT *
                                    FROM tbl_plz
                                    WHERE pz_plzID = ".$plzID.") AS orgLoc
                            WHERE calcLoc.pz_longitude BETWEEN (orgLoc.pz_longitude-(1/111*".$surrounding.")) AND (orgLoc.pz_longitude+(1/111*".$surrounding.")) 
                            AND calcLoc.pz_latitude BETWEEN (orgLoc.pz_latitude-(1/111*".$surrounding.")) AND (orgLoc.pz_latitude+(1/111*".$surrounding.")))
                            AND o.or_active = 1 
                            AND o.or_tagID = ".$tagID.";";
            }*/

        $res = mysqli_query($connection, $query);

        $offersWithDistanceFromPoint = [];
        
        //calc distance from Mosbach:
        $startDistanceY = 9.15110; //longitude
        $startDistanceX = 49.35360; //latitude
        
        while(($data = mysqli_fetch_array($res)) != false){
            $distanceFromMosbach = round(doubleval(getDistanceBetween($startDistanceX, $startDistanceY, $data['pz_latitude'], $data['pz_longitude'])));

            $offersWithDistanceFromPoint[] = [
                                                "offer" => new Offer($data['or_active'], new DateTime($data['or_creationDate']), $data['or_description'], new DateTime($data['or_mhd']), $data['or_offerID'], $data['or_picture'], new PLZ($data['pz_location'], $data['pz_plz'], $data['pz_plzID']), $data['or_report'], new Tag($data['tg_color'], $data['tg_description'], $data['tg_tagID']), $data['or_title'], $data['or_ocID']),
                                                "distanceFromStartPoint" => $distanceFromMosbach
                                                ];
            
        }

        return $offersWithDistanceFromPoint;
    }

    public function getDistanceBetween($pointOneX, $pointOneY, $pointTwoX, $pointTwoY){
        $d = sqrt( pow( (doubleval($pointOneX) - doubleval($ointTwoX)), 2) + pow( ( doubleval($pointOneY) - doubleval($pointTwoY)), 2) );   //d = Quadratwurzel( (x1-x2)^2 + (y1-y2)^2 )
        return $d;
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