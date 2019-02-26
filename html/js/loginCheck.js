function loginCheck(){

    //show loadingContainer:
    $('#loadingContainer').show();
    var mail = $('#email').val();
    var password = $('#password').val();

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
            if(data === true){
                //if success -- remove is-invalid from form-fields and set loginModalInfoText to nothing, then submit form:
                $('#email').removeClass('is-invalid');
                $('#password').removeClass('is-invalid');
                $('#loginModalInfoText').html('');
                $('#loginModalForm').submit();
            }else{
                //info that mail or password is wrong, mark the fields
                $('#loginModalInfoText').html('E-Mail oder Passwort sind falsch.');
                $('#email').addClass('is-invalid');
                $('#password').addClass('is-invalid');
            }
        },
        error: function(err){
            alert('Es ist ein Fehler aufgetreten, bitte versuche es nochmal.');
        }
    });

        
}