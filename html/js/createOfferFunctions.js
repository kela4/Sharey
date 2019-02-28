$(document).ready(function() {
    function fileChange(e) {
        var inputFileHiddenInForm = $('#inputFileHiddenInForm');
        inputFileHiddenInForm.val('');

        var file = e.target.files[0];

        if(file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg"){
            //change lable
            var labelShown = $('#inputFile').val().replace(/\\/g, '/').replace(/.*\//, '');
            $('#inputFileName').val(labelShown);

            var reader = new FileReader();
            reader.onload = function(readerEvent){

                var image = new Image();
                image.onload = function(imageEvent){
                    var maxSize = 200;
                    var width = image.width;
                    var height = image.height;

                    if(width > height){  
                        if(width > maxSize){ 
                            height*=maxSize/width; width=maxSize; 
                        }
                    }else{  
                        if(height > maxSize){
                            width*=maxSize/height; height=maxSize; 
                        } 
                    }

                    var canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;
                    canvas.getContext('2d').drawImage(image, 0, 0, width, height);

                    if(file.type == "image/jpeg"){
                        var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                    }else if(file.type == "image/jpg"){
                        var dataURL = canvas.toDataURL("image/jpg");
                    }else{
                        var dataURL = canvas.toDataURL("image/png");
                    }

                    inputFileHiddenInForm.val(dataURL);
                }
                image.src = readerEvent.target.result;
            }
            reader.readAsDataURL(file);
        }else{
            $('#inputFile').val('');
            $('#newEntryModalInfoText').html('Das Bild hat den falschen Typ. Bitte nur Bilder in den Formaten jpg, jpeg und png.');
        }
    }

    document.getElementById('inputFile').addEventListener('change', fileChange, false);
});

function formSubmit(){
    //check if all required fields are filled out:
    var titleField = $('#title');
    var descriptionField = $('#description');

    var title = titleField.val();
    var description = descriptionField.val();
    titleField.removeClass('is-invalid');
    descriptionField.removeClass('is-invalid');

    if(title == null){
        $('#newEntryModalInfoText').html('Bitte alle Pflichtfelder ausfüllen.');
        titleField.addClass('is-invalid');
    }

    if(description == null){
        $('#newEntryModalInfoText').html('Bitte alle Pflichtfelder ausfüllen.');
        descriptionField.addClass('is-invalid');
    }

    if(title != null && description != null){
        $('#newOfferEntryForm').submit();
    }
}