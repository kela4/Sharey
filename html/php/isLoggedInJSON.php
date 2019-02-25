<?php 
    require_once('classes/User.php');
        
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }    
?>