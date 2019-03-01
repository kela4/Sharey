<?php 
//function returns if a user is logged in
//this function can only be called from php scripts
    function isLoggedIn(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }
    
?>