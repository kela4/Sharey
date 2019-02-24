<?php
    require_once('classes/Tag.php');

    $tags = Tag::getAllTags();
    
    if(!empty($tags)){
        $jsonTags = [];

        foreach($tags as $tag){
            $jsonTags[] = $tag->toJson();
        }

        echo json_encode($jsonTags);
    }else{
        echo false;
    }


?>