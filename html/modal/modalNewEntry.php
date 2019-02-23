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
                         <input type="text" required class="form-control" id="description" placeholder="Beschreibung" name="desc">
                     </div>


                     <div class="row">
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <label for="plzSelectionNewOffer">PLZ</label>
                                 <select id="plzSelectionNewOffer" class="form-control" name="plzID"></select>
                             </div>
                         </div>
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <label for="tagSelectionNewOffer">Tag</label>
                                 <select id="tagSelectionNewOffer" class="form-control" name="tagID"></select>
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

                     <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

                     <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

                     <div class="form-group">
                         <label for="modalImage">Bild</label>
                         <div class="input-group" id="modalImage">
                             <input type="file" class="form-control" readonly name="img">
                             <label class="input-group-btn">
                                 <span class="btn btn-secondary">
                                     Browse&hellip; <input type="file" style="display: none;" multiple>
                                 </span>
                             </label>
                         </div>
                     </div>

                     <script text="text/javascript">
                     $(function() {

                         // We can attach the `fileselect` event to all file inputs on the page
                         $(document).on('change', ':file', function() {
                             var input = $(this),
                                 numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                 label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                             input.trigger('fileselect', [numFiles, label]);
                         });

                         // We can watch for our custom `fileselect` event like this
                         $(document).ready(function() {
                             $(':file').on('fileselect', function(event, numFiles, label) {

                                 var input = $(this).parents('.input-group').find(':text'),
                                     log = numFiles > 1 ? numFiles + ' files selected' :
                                     label;

                                 if (input.length) {
                                     input.val(log);
                                 } else {
                                     if (log) alert(log);
                                 }

                             });
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