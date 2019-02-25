<?php 
    require_once('classes/User.php');
        
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        echo json_encode(array("test" => true, "user" => $_SESSION['user']));
    }else{
        echo json_encode(array("test" => false, "user" => $_SESSION['user']));
    }    
?>