function loginCheck(){

    //show loadingContainer:
    $('#loadingContainer').show();
    var mail = $('#email').val();
    var password = $('password').val();

    $.ajax({
        url: '../php/loginCheck.php',
        data: {mail: mail, password: password},
        dataType: 'json',
        type: 'post',
        complete: function(){
            //hide loadingContainer
            $('#loadingContainer').hide();
        },
        success: function(data){
            console.log(data);
            if(data == true){
                //if success:
                $( "#loginModalForm" ).submit();
            }else{
                //info that mail or password is wrong
                alert('Mail oder Password falsch.');
            }
        },
        error: function(err){
            alert('Es ist ein Fehler aufgetreten, bitte versuche es nochmal.');
        }
    });

        
}