 <!-- Modal newEntry -->
 <div class="modal fade" id="newOfferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Neues Angebot anlegen</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <p id="newEntryModalInfoText"></p>
                 <form id="newOfferEntryForm" method="post" action="php/newOffer.php" enctype="multipart/form-data">
                     <div class="form-group">
                         <label for="title">Titel</label>
                         <input type="text" required class="form-control" id="title" placeholder="Titel" name="title">
                     </div>
                     <div class="form-group">
                         <label for="description">Beschreibung</label>
                         <input type="text" required class="form-control" id="description" placeholder="Beschreibung"
                             name="desc">
                     </div>


                     <div class="row">
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <label for="plzSelectionNewOffer">PLZ</label>
                                 <select id="plzSelectionNewOffer" required class="form-control" name="plzID"></select>
                             </div>
                         </div>
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <label for="tagSelectionNewOffer">Tag</label>
                                 <select id="tagSelectionNewOffer" required class="form-control" name="tagID"></select>
                             </div>
                         </div>
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <label for="mhd">MHD</label>
                                 <input type="date" class="form-control" id="mhd" placeholder="TT.MM.JJJJ"
                                     name="expdate">
                             </div>
                         </div>
                     </div>

                     <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                     <input id="inputFileHiddenInForm" type="hidden" name="img" value="">
                 </form>
                    <!--out of the form-->
                    <div class="form-group">
                         <label for="modalImage">Bild</label>
                         <div class="input-group" id="modalImage">
                             <input id="inputFileName" type="text" class="form-control" readonly>
                             <label class="input-group-btn">
                                 <span class="btn btn-secondary">
                                     Browse&hellip; <input id="inputFile" type="file" style="display: none;">
                                 </span>
                             </label>
                         </div>
                         <small id="imgHelp" class="form-text text-muted">Bitte nur Dateien im Format
                             '<strong>.jpg</strong>' und
                             '<strong>.png</strong>' mit einer maximalen Größe von <strong>1MB</strong> hochladen.
                             &#128522;</small>
                     </div>

                     <script text="text/javascript">
                     $(document).ready(function() {
                         /*var inputFile = $('#inputFile');
                         var inputFileName = $('#inputFileName');

                         inputFile.change(function() {
                            var labelShown = inputFile.val().replace(/\\/g, '/').replace(/.*\//, '');
                            inputFileName.val(labelShown);
                         });*/

                        function fileChange(e) {
                            document.getElementById('inputFileHiddenInForm').value = '';

                            var file = e.target.files[0];

                            if (file.type == "image/jpeg" || file.type == "image/png") {
                                //change lable
                                var labelShown = $('#inputFile').val().replace(/\\/g, '/').replace(/.*\//, '');
                                $('#inputFileName').val(labelShown);

                                var reader = new FileReader();
                                reader.onload = function(readerEvent) {

                                    var image = new Image();
                                    image.onload = function(imageEvent) {
                                        var max_size = 300;
                                        var w = image.width;
                                        var h = image.height;

                                        if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
                                        } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }

                                        var canvas = document.createElement('canvas');
                                        canvas.width = w;
                                        canvas.height = h;
                                        canvas.getContext('2d').drawImage(image, 0, 0, w, h);

                                        if (file.type == "image/jpeg") {
                                            var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                                        } else {
                                            var dataURL = canvas.toDataURL("image/png");
                                        }
                                        console.log(dataURL);
                                        document.getElementById('inputFileHiddenInForm').value = dataURL;
                                    }
                                    image.src = readerEvent.target.result;
                                }
                                reader.readAsDataURL(file);
                            } else {
                                document.getElementById('inputFile').value = '';
                                $('#newEntryModalInfoText').html('Das Bild hat den falschen Typ. Bitte nur Bilder in den Formaten jpg, jpeg und png.');
                            }
                        }

                        document.getElementById('inputFile').addEventListener('change', fileChange, false);

                     });
                     </script>

                     <button type="button" onclick="formSubmit();" class="btn btn-dark float-right">Erstellen</button>
             </div>
         </div>
     </div>
 </div>

 <script>
    function formSubmit(){
        $('#newOfferEntryForm').submit();
    }
 </script>
 <!--end Modal-->