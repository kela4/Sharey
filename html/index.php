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
                        <button type="button" class="btn btn-light" data-toggle="modal"
                            data-target="#registerModal">Registrieren</button>
                        <button type="submit" class="btn btn-dark">Login</button>
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
                        <button type="submit" class="btn btn-dark">Registrieren</button>
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
                        <!--max. Upload-Size->10MB-->
                        <div class="form-group">
                            <label for="image">Bild</label>
                            <input type="file" class="form-control" id="modalImage"
                                placeholder="Bild auswählen (optional)" name="img">
                        </div>



                        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip; <input type="file" style="display: none;" multiple>
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
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
                        <button type="submit" class="btn btn-dark">Erstellen</button>
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



        <!-- HERE CONTENT (CHRIS) -->
        <!-- Content -->
        <div class="container">
            <div class="row">

                <!-- Card 1 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 1 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p> <!-- dynamic -->
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p> <!-- dynamic -->
                                    </div>
                                </div>

                                <!-- Card 1 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                        <!-- dynamic -->
                                    </div>
                                </div>
                            </div>

                            <!-- Card 1 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5> <!-- dynamic -->
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                    <!-- dynamic -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 2 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 2 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 3 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 3 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card 1 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 1 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p> <!-- dynamic -->
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p> <!-- dynamic -->
                                    </div>
                                </div>

                                <!-- Card 1 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                        <!-- dynamic -->
                                    </div>
                                </div>
                            </div>

                            <!-- Card 1 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5> <!-- dynamic -->
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                    <!-- dynamic -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 2 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 2 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 3 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 3 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card 1 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 1 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p> <!-- dynamic -->
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p> <!-- dynamic -->
                                    </div>
                                </div>

                                <!-- Card 1 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                        <!-- dynamic -->
                                    </div>
                                </div>
                            </div>

                            <!-- Card 1 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5> <!-- dynamic -->
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                    <!-- dynamic -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 2 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 2 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 3 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 3 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card 1 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 1 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p> <!-- dynamic -->
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p> <!-- dynamic -->
                                    </div>
                                </div>

                                <!-- Card 1 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                        <!-- dynamic -->
                                    </div>
                                </div>
                            </div>

                            <!-- Card 1 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5> <!-- dynamic -->
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                    <!-- dynamic -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 2 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 2 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 3 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 3 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create new Offer -->
        <div id="center">

            <a id="newOffer" class="center-block" data-toggle="modal" data-target="#newOfferModal">
                <svg style="width:6em; height:6em; background-color:transparent">
                    <circle id="newOfferCircle" cx="2.4em" cy="2.4em" r="2em" fill="#4B4B4B" fill-opacity="0.5" />
                    <rect id="Test" x="2.15em" y="1.1em" rx="0.2em" ry="0.2em" width="0.5em" height="2.6em"
                        style="fill:white;" />
                    <rect x="1.1em" y="2.15em" rx="0.2em" ry="0.2em" width="2.6em" height="0.5em" style="fill:white;" />
                </svg>
            </a>

        </div>

        <?php
            include('basicsiteelements/scripts.php');
        ?>

</body>

</html>