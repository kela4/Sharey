<?php
/**
 * if you use User-Class in an other file, include also <>-Class
 */

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
        //not implemented in prototype
        return $tag;
    }

    public static function getAllTags(){
        require('dbconnect.php');
        mysqli_select_db($connection, 'db_sharey');
        
        $query = "SELECT * FROM tbl_tag";

        $res = mysqli_query($connection, $query);

        $tags = [];
        
        while(($data = mysqli_fetch_array($res)) != false){
            $tags[] = new Tag($data['tg_color'], utf8_encode($data['tg_description']), $data['tg_tagID']);
        }

        return $tags;
    }

    public function toJson() {
        return json_encode(array(
            'color' => $this->getColor(),
            'description' => $this->getDescription(),
            'tagID' => $this->getTagID()      
        ));
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