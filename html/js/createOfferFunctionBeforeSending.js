function checkImg(){

    //show loadingContainer:
    $('#loadingContainer').show();

    var inputFileField = $('#inputFile');
    console.log(inputFileField.val());

    if(inputFileField.files){
        console.log(inputFileField.files[0]);

        $('#inputFileName').removeClass('is-invalid');

        //check img
        var imageFile = inputFileField.files[0];
        if(imageFile.type == "image/jpeg" || imageFile.type == "image/png"){
            var fileReader = new FileReader();

            //set resize-function to filereader
            fileReader.onload = function(readerEvent){

                var image = new Image();
                image.onload = function(imageEvent){
                    var maxSize = 200;
                    var width = image.width;
                    var height = image.height;

                    if(width > height) {  
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
                    
                    var dataURL;
                    if(imageFile.type == "image/jpeg"){
                        dataURL = canvas.toDataURL("image/jpeg", 0.5);
                    }else{
                        dataURL = canvas.toDataURL("image/png");
                    }
                    $('#inputFileHiddenInForm').val(dataURL);
                }
                image.src = readerEvent.target.result;

            }

            //start filereader
            fileReader.readAsDataURL(imageFile);

            //img is resized -> form submit
            $('#newOfferEntryForm').submit();
        }else{
            //image has the false type
            $('#newEntryModalInfoText').html('Das Bild hat den falschen Typ. Bitte nur Bilder in den Formaten jpg, jpeg und png.');
            $('#inputFileName').addClass('is-invalid');
            $('#loadingContainer').hide();
        }

    }else{
        //no img is selected -> form submit
        $('#newOfferEntryForm').submit();
    }
    
}