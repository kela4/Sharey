<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="loginModalInfoText"></p>
                <form id="loginModalForm" method="post" action="../php/login.php">
                    <input id="loginFrom" hidden name="loginFrom">
                    <input id="loginShowOfferID" hidden name="loginShowOfferID">
                    <input id="loginShowOfferDistance" hidden name="loginShowOfferDistance">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" required class="form-control" id="email"
                            placeholder="max.mustermann@beispiel.de" name="mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="password" required class="form-control" id="password" placeholder="Passwort"
                            name="password">
                    </div>
                    <!-- Javascript der Login Modal schließt -->
                    <button type="button" class="btn btn-dark float-right" onclick="loginCheck();">Login</button>
                    <button type="button" class="btn btn-light float-right"
                        onclick="$('#loginModal').modal('hide');
                        $('#registerModal').modal('show');"
                        id="register">Registrieren</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end Modal-->

<script type="text/javascript" src="../js/loginCheck.js"></script>