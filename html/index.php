<!DOCTYPE html>
<html>

<head>
    <?php
        include('basicsiteelements/header.php');
    ?>
</head>

<body>

    <?php
        include('modal/modalLogin.php');
    ?>
    <?php
        include('modal/modalRegister.php');
    ?>
    <?php
        include('modal/modalNewEntery.php');
    ?>
    <?php
        include('modal/modalOffer.php');
    ?>

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
                <a data-toggle="modal" data-target="#offerModal">
                    <div class="col-auto m-3 card" id="card">
                        <div id="cardContent">
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
                                                <i class="fas fa-map-marker-alt" id="offerLocationTag"></i>
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
                </a>

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