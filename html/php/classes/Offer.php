<?php
require_once('Tag.php');
require_once('../dbconnect.php');

class Offer{
    private $active; //bool
    private $date; //date
    private $description; //string
    private $mhd; //date
    private $offerID; //int
    private $picture; //string
    private $plz; //int
    private $place; //string
    private $report; //int
    private $tag; //Tag
    private $title; //string 
    private $ocID; //int
 
    public function __construct(bool $active, DateTime $date, string $description, DateTime $mhd, int $offerID, string $picture = null, int $plz, string $place, int $report, Tag $tag, string $title, int $ocID){
        $this->active = $active;
        $this->date = $date;
        $this->description = $description;
        $this->mhd = $mhd;
        $this->offerID = $offerID;
        $this->picture = $picture;
        $this->plz = $plz;
        $this->place = $place;
        $this->report = $report;
        $this->tag = $tag;
        $this->title = $title;
        $this->ocID = $ocID; 
    }

    public static function deleteOffer(int $offerID){ 
        return true;
    }

    public static function setSearch(string $searchTerm, int $plz, int $surrounding, int $tagID){
        return $offers; //offer-Array
    }

    public static function getOffer(int $offerID){
        //wichtig, Tag nicht vergessen!
        return $offer;
    }

    public function edit(string $title, string $content, int $tagID, DateTime $mhd, string $picture){ //String, String, int, date, String
        return $offer;
    }

    /**
     * call this method if an offer was reported
     * report counter will incremented
     * if an offer has a report counter >= 5 --> the offer will be deleted
     */
    public function reportCount(){
        return true;
    }

    /* statt der getColor-Funktion wird jetzt das Tag-Attribut statt dem tagID verwendet und hier wird immer gleich der ganze Tag hinterlegt, somit wird die Anzahl der DB-Abfragen herheblich reduziert
    public function getColor(){
        $connection = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($connection, 'shareyvorlage');
        
        $query = "SELECT color FROM tag WHERE id ='".$this->tagID."';";
        $res = mysqli_query($connection, $query);
        
        $data = mysqli_fetch_array($res);

        return $data['color'];
    }*/


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

    public function getPlace(){
        return $this->place;
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