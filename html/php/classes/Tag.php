<?php
//required_once('../dbconnect.php');

class Tag{
    private $color; //string
    private $description; //string
    private $tagID; //int

    public function __construct(string $color, string $description, int $tagID){
        $this->color = $color;
        $this->description = $description;
        $this->tagID = $tagID;
    }

    public static function getTag(int $tagID){
        return $tag;
    }

    #region getter

    public function getColor(){
        return $this->color;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getTagID(){
        return $this->tagID;
    }

    #endregion
}

?>