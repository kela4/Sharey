<?php 
    require_once('classes/User.php');

    function isLoggedIn(){        
        session_start();
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            echo true;
        }else{
            echo false;
        }
    }
    
?>