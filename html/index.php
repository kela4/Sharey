<!DOCTYPE html>
<html>

<head>
    <?php
        include('basicsiteelements/header.php');
    ?>


    <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#edeff5",
                    "text": "#838391"
                },
                "button": {
                    "background": "#4b81e8"
                }
            },
            "position": "bottom-right",
            "content": {
                "message": "<b>Magst du Cookies?</b> &#127850; Wir benutzen Cookies, um das beste Erlebnis auf der Webseite zu ermöglichen.",
                "dismiss": "Verstanden",
                "link": "Mehr dazu"
            }
        })
    });
    </script>
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
                    <h5 class="modal-title" id="exampleModalLabel">Angebot anlegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="php/newOffer.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Titel</label>
                            <input type="text" required class="form-control" id="title" placeholder="Titel" name="title"
                                title="Geben Sie hier den Titel Ihres Angebotes an.">
                        </div>
                        <div class="form-group">
                            <label for="description">Beschreibung</label>
                            <textarea class="form-control" id="description" placeholder="Beschreibung" rows="3"
                                name="desc" title="Hier können Sie das Produkt näher beschreiben."></textarea>
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="description" title="Postleitzahl">PLZ</label>
                                    <input type="text" required class="form-control" id="description" placeholder="PLZ"
                                        name="plz"
                                        title="Geben Sie hier die Postleitzahl des Ortes an, an dem Sie das Angebot anbieten.">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tag">Tag</label>
                                    <select class="form-control" id="tag"
                                        title="Wählen Sie den passenden Tag zu Ihrem Angebot aus.">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="mhd" title="Mindesthaltbarkeitsdatum">MHD</label>
                                    <input type="date" class="form-control" id="mhd" placeholder="TT.MM.JJJJ"
                                        name="expdate" title="Tragen Sie hier das Mindesthaltbarkeitsdatum ein.">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

                        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

                        <div class="form-group" title="Fügen Sie hier optional ein Bild Ihrem Angebot an.">
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
                            $(document).on('change', ':file', function() {
                                var input = $(this),
                                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                                input.trigger('fileselect', [numFiles, label]);
                            });
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
                <div class="col-auto m-3 card bg-success" id="card">
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
                                        <span id="whiteText">Mosbach</span>
                                        <br>
                                        <span id="whiteText">15 km</span>
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
                                <h5 id="whiteText">Ein Joghurt</h5>
                                <p id="whiteText">Habe einen Naturjoghurt übrig. Will den jemand?<br>Dritte Textzeile
                                </p>
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