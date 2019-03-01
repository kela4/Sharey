<?php 
    require_once('classes/User.php');
    
    //returns only as JSON-data if a user is logged in

    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }    
?>