$(document).ready(function() {
    function fileChange(e) {
        //clear the inputFileHiddenInForm field --> field that transports the image-data to the backend
        var inputFileHiddenInForm = $('#inputFileHiddenInForm');
        inputFileHiddenInForm.val('');

        //get selected file
        var file = e.target.files[0];

        //check if selected file is an image of type jpeg, jpg or png
        if(file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg"){
            //change lable that shown to user in the not hidden filename-field
            var labelShown = $('#inputFile').val().replace(/\\/g, '/').replace(/.*\//, '');
            $('#inputFileName').val(labelShown);

            //create new FileReader and set the file-resize function to onload-event:
            var reader = new FileReader();
            reader.onload = function(readerEvent){

                //create new Image and set the file-resize function to onload-event:
                var image = new Image();
                image.onload = function(imageEvent){
                    var maxSize = 200;
                    var width = image.width;
                    var height = image.height;

                    //reduce image width and heigt:
                    if(width > height){  
                        if(width > maxSize){ 
                            height*=maxSize/width; width=maxSize; 
                        }
                    }else{  
                        if(height > maxSize){
                            width*=maxSize/height; height=maxSize; 
                        } 
                    }

                    //create canvas element, set new image width and heigth to it and draw image in this element:
                    var canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;
                    canvas.getContext('2d').drawImage(image, 0, 0, width, height);

                    //get resized image of canvas-element
                    if(file.type == "image/jpeg"){
                        var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                    }else if(file.type == "image/jpg"){
                        var dataURL = canvas.toDataURL("image/jpg");
                    }else{
                        var dataURL = canvas.toDataURL("image/png");
                    }

                    //put the reduced image (in base64 encoding) as value of field that will be sended to backend
                    inputFileHiddenInForm.val(dataURL);
                }
                image.src = readerEvent.target.result;
            }
            reader.readAsDataURL(file);
        }else{
            //if file has the false extension, clear the inputFile-Field and show the info text to user 
            $('#inputFile').val('');
            $('#newEntryModalInfoText').html('Das Bild hat den falschen Typ. Bitte nur Bilder in den Formaten jpg, jpeg und png.');
        }
    }

    /**
    * sets file/image-resize function to the inputFile-Input field (at change-event)
    * if this field will be changed, the fileChange-function checks the file and resize 
    * the image if the picked file will be an image
    */
    document.getElementById('inputFile').addEventListener('change', fileChange, false);
});

/**
 * create offer modal --> form submit
 * checks, if all required fiels are filled out
 * if yes -> submits form
 */
function formSubmit(){
    //check if all required fields are filled out:
    var titleField = $('#title');
    var descriptionField = $('#description');

    var title = titleField.val();
    var description = descriptionField.val();
    titleField.removeClass('is-invalid');
    descriptionField.removeClass('is-invalid');

    if(title == null || title == ""){
        $('#newEntryModalInfoText').html('Bitte alle Pflichtfelder ausfüllen.');
        titleField.addClass('is-invalid');
    }

    if(description == null || title == ""){
        $('#newEntryModalInfoText').html('Bitte alle Pflichtfelder ausfüllen.');
        descriptionField.addClass('is-invalid');
    }

    //submit only if the required fields title and description are filled out
    if(title != null && title != "" && description != null && description != ""){
        $('#newOfferEntryForm').submit();
    }
}