<?php 
    //an der stelle benötigt?
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        
    }
?>

<html>

<head>
    <title>Startseite</title>

    <link href="sources/bootstrap.min.css" rel="stylesheet"/>
    <script src="sources/jquery-3.2.1.slim.min.js"></script>
    <script src="sources/popper.min.js"></script>
    <script src="sources/bootstrap.min.js"></script>

    <script src="sources/jquery.min.js"></script>
</head>
    
<body>

    <!-- Modal Login -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="php/login.php">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" required class="form-control" id="email" placeholder="max.mustermann@beispiel.de" name="mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort</label>
                                <input type="password" requeired class="form-control" id="password" placeholder="Passwort" name="password">
                            </div>
                            <button type="button" class="btn btn-light">Registrieren</button>
                            <button type="submit" class="btn btn-dark">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--end Modal-->

    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" id="email" placeholder="max.mustermann@beispiel.de" name="mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort</label>
                                <input type="password" class="form-control" id="password" placeholder="Passwort" name="password">
                            </div>
                            <button type="submit" class="btn btn-light">Registrieren</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--end Modal-->

    <!-- Modal newEntry -->
        <div class="modal fade" id="newOfferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="form-group">
                                <label for="description">PLZ</label>
                                <input type="text" required class="form-control" id="description" placeholder="PLZ" name="plz">
                            </div>
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" required class="form-control" id="tag" placeholder="Tag" name="tag">
                            </div>
                            <div class="form-group">
                                <label for="mhd">MHD</label>
                                <input type="date" required class="form-control" id="mhd" placeholder="TT.MM.JJJJ" name="expdate">
                            </div>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" /> <!--max. Upload-Size->10MB-->
                            <div class="form-group">
                                <label for="image">Bild</label>
                                <input type="file" class="form-control" id="image" placeholder="Bild auswählen (optional)" name="img">
                            </div>
                            <p>Achtung, dev-hinweis: ein User muss eingeloggt sein!</p>
                            <button type="submit" class="btn btn-dark">Erstellen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--end Modal-->

<h1>hier ein Header</h1>

<br>

<h3>Menü</h3>
<a class="btn" data-toggle="modal" data-target="#loginModal">Login</a>
<a class="btn" href="pages/account.php">Account</a>
<a class="btn" href="php/logout.php">Logout</a>
<a class="btn" href="pages/aboutus.php">Über uns</a>
<a class="btn" href="pages/contact.php">Kontakt</a>
<a class="btn" href="pages/dataprotection.php">Datenschutz</a>
<a class="btn" href="pages/imprint.php">Impressum</a>

<br><br>

<h3>Angebote</h3>

<div id="offers">

<a class="btn" data-toggle="modal" data-target="#newOfferModal">Neues Angebot</a>

</div>

</body>

</html>


<?php 

?>