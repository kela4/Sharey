<?php 
    require_once('classes/User.php');

    //returns only if a user is logged in
        
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        return true;
    }else{
        return false;
    }    
?>