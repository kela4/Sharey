<!DOCTYPE html>
<html>

<head>
    <?php
        include('basicsiteelements/header.php');
    ?>
</head>

<body>

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
                    <form method="post" action="php/login.php">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" required class="form-control" id="email"
                                placeholder="max.mustermann@beispiel.de" name="mail">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort</label>
                            <input type="password" requeired class="form-control" id="password" placeholder="Passwort"
                                name="password">
                        </div>
                        <!-- Javascript der Login Modal schließt -->
                        <button type="submit" class="btn btn-dark float-right">Login</button>
                        <button type="button" class="btn btn-light float-right" data-toggle="modal"
                            data-target="#registerModal">Registrieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end Modal-->

    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrieren</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" id="email" placeholder="max.mustermann@beispiel.de"
                                name="mail">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort</label>
                            <input type="password" class="form-control" id="password" placeholder="Passwort"
                                name="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort wiederholen</label>
                            <input type="password" class="form-control" id="password" placeholder="Passwort"
                                name="password">
                        </div>
                        <button type="submit" class="btn btn-dark float-right">Registrieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end Modal-->

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
                            <input type="text" required class="form-control" id="title" placeholder="Titel"
                                name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Beschreibung</label>
                            <input type="text" required class="form-control" id="description" placeholder="Beschreibung"
                                name="desc">
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="description">PLZ</label>
                                    <input type="text" required class="form-control" id="description" placeholder="PLZ"
                                        name="plz">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sel1">Tag</label>
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
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
                                <input type="text" class="form-control" readonly>
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

                        <!-- Achtung, dev-hinweis: ein User muss eingeloggt sein! -->
                        <button type="submit" class="btn btn-dark float-right">Erstellen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end Modal-->

    <!-- Modal updateEntery -->

    <!-- Not Implemented -->

    <!-- end Modal -->

    <?php
        include('basicsiteelements/navigation.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->

        <div class="container mt-4">
            <div class="row justify-content-center">

                <?php 
                    for($i = 0; $i<29; $i++){
                        ?>
                <div class="col-auto m-3 card" id="card">
                    <div id="cardContent">
                        <div class="row">
                            <div class="col-7">
                                <div class="row">
                                    <div id="offerTagDiv">
                                        <svg width="150px" height="55px">
                                            <polygon points="10,30 30,10 140,10 140,50 30,50" id="offerTagPolygon" />
                                            <text x="40" y="36" fill="white">Essen</text>
                                        </svg>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="=col-auto">
                                        <div id="locationTagDiv">
                                            <i class="fas fa-map-marker-alt" id="locationTag"></i>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div id="cityDiv">
                                            <span class="whiteText">Mosbach</span>
                                            <br>
                                            <span class="whiteText">15 km</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <br>
                                <br>
                                <img src="images/yoghurt.jpg" id="offerImage">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="offerDescriptionDiv">
                                    <h5 class="whiteText">Ein Joghurt</h5>
                                    <p class="whiteText">Habe einen Naturjoghurt übrig. Will den jemand?<br>Dritte
                                        Textzeile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                        }
                    ?>


            </div>
        </div>








        <!-- Create new Offer -->
        <div id="center">

            <a id="newOffer" class="center-block" data-toggle="modal" data-target="#newOfferModal">
                <img src="images/newOffer.PNG">
            </a>

        </div>

        <?php
            include('basicsiteelements/scripts.php');
        ?>

</body>

</html>