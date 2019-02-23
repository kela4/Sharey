<?php
    require_once('classes/User.php');
    require_once('classes/PLZ.php');
    require_once('classes/Tag.php');
    require_once('classes/Offer.php');
    require_once('classes/Message.php');
    require_once('classes/Conversation.php');

$tags = Tag::getAllTags();

$jsonTags = [];

        foreach($tags as $tag){
            $jsonTags[] = $tag->toJson();
        }

        echo json_encode($jsonTags);

?>