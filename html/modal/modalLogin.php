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
                <form method="post" action="../php/login.php">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" required class="form-control" id="email"
                            placeholder="max.mustermann@beispiel.de" name="mail" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="password" required class="form-control" id="password" placeholder="Passwort"
                            name="password">
                    </div>
                    <!-- Javascript der Login Modal schließt -->
                    <button type="submit" class="btn btn-dark float-right">Login</button>
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