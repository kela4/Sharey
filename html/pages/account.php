<!DOCTYPE html>
<html>

<head>
    <?php
        include('../basicsiteelements/headerpages.php');
    ?>
</head>

<body>
    <?php
        include('../basicsiteelements/navigationpages.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <h1>Account</h1>
                    <ul class="list-unstyled">
                        <li>
                            E-Mail-Benachrichtigung
                            <!-- Default switch -->
                            <div class="custom-control custom-switch" id="toggle">
                                <input type="checkbox" checked class="custom-control-input" id="customSwitches">
                                <label class="custom-control-label" for="customSwitches"></label>
                            </div>
                        </li>
                        <li><a href="#">Passwort ändern</a></li>
                        <li><a href="#">E-Mail ändern</a></li>
                        <li><a href="#">Account löschen</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h1>Nachrichten</h1>


                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1>Eigene Angebote</h1>
                    <div class="container mt-4">
                        <div class="row justify-content-center">

                            <?php 
                        for($i = 0; $i<3; $i++){
                            ?>
                            <div class="col-auto m-3 card bg-success" id="card">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="row">
                                            <div id="offerTagDiv">
                                                <svg width="150px" height="55px">
                                                    <polygon points="10,30 30,10 140,10 140,50 30,50"
                                                        id="offerTagPolygon" />
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
                                        <img src="../images/yoghurt.jpg" id="offerImage">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="offerDescriptionDiv">
                                            <h5 id="whiteText">Ein Joghurt</h5>
                                            <p id="whiteText">Habe einen Naturjoghurt übrig. Will den jemand?<br>Dritte
                                                Textzeile
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

                </div>

            </div>
        </div>
        <?php
        include('../basicsiteelements/scripts.php');
    ?>
</body>

</html>