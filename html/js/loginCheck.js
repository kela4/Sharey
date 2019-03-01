/**
 * function checks, if a visitor enters correct login-dates to the login-modal
 * if no --> a info-message will be shown
 * if yes --> the loginForm will be submitted
 */
function loginCheck(){

    //show loadingContainer:
    $('#loadingContainer').show();

    //get values of email and password field in form
    var mail = $('#email').val();
    var password = $('#password').val();

    //call loginCheck php-script
    $.ajax({
        url: '../php/loginCheck.php',
        data: {mail: mail, password: password},
        dataType: 'json',
        type: 'post',
        complete: function(){
            //hide loadingContainer
            setTimeout(function(){ 
                $('#loadingContainer').hide();
            }, 500);
        },
        success: function(data){
            if(data === true){
                //if success -- remove is-invalid from form-fields and set loginModalInfoText to nothing, then submit form:
                $('#email').removeClass('is-invalid');
                $('#password').removeClass('is-invalid');
                $('#loginModalInfoText').html('');
                $('#loginModalForm').submit();
            }else{
                //info that mail or password is wrong, mark both fields, don't submit
                $('#loginModalInfoText').html('E-Mail oder Passwort sind falsch.');
                $('#email').addClass('is-invalid');
                $('#password').addClass('is-invalid');
            }
        },
        error: function(err){
            alert('Die Funktion konnte nicht geladen werden, bitte versuche es nochmal.');
        }
    });

        
}