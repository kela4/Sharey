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
                 <form method="post" action="php/newOffer.php" enctype="multipart/form-data">
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

                     <div class="form-group">
                         <label for="modalImage">Bild</label>
                         <div class="input-group" id="modalImage">
                             <input id="inputFileName" type="text" class="form-control" readonly>
                             <label class="input-group-btn">
                                 <span class="btn btn-secondary">
                                     Browse&hellip; <input id="inputFile" type="file" style="display: none;" name="img">
                                 </span>
                             </label>
                         </div>
                         <small id="emailHelp" class="form-text text-muted">Bitte nur Dateien im Format
                             '<strong>.jpg</strong>' und
                             '<strong>.png</strong>' mit einer maximalen Größe von <strong>1MB</strong> hochladen.
                             &#128522;</small>
                     </div>

                     <script text="text/javascript">
                     $(document).ready(function() {
                         var inputFile = $('#inputFile');
                         var inputFileName = $('#inputFileName');

                         inputFile.change(function() {
                             var labelShown = inputFile.val().replace(/\\/g, '/').replace(/.*\//, '');
                             inputFileName.val(labelShown);
                         });
                     });
                     </script>

                     <button type="submit" class="btn btn-dark float-right">Erstellen</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!--end Modal-->