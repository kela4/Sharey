/**
 * if loggedout page will be calling --> an automatic redirect to the index-page after 3 secs will be started 
 */
$(document).ready(function(){

    setTimeout(function(){ 
        var url = "/index.php";
        $(location).attr('href', url);
    }, 3000);
   
});
