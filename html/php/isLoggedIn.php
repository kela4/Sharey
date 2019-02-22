<?php 
    require_once('classes/User.php');
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        echo true;
    }else{
        echo false;
    }    
?>