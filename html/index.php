<!DOCTYPE html>
<html>

<head>
    <title>Sharey</title>
    <?php
        include('basicsiteelements/header.php');

        //scripts must be loaded before the modals are loaded, because of jQuery is used in the modalNewEntry
        include('basicsiteelements/scripts.php');
    ?>



    <!-- Filter -->

    <script>
    $(document).ready(function() {
        $('.navbar .dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
    });
    </script>

</head>

<body>
    <!-- Loading Container -->
    <div id="loadingContainer">
        <div id="loadingOverlay"></div>

        <div id="loading" class="row justify-content-center">
            <div class="col-10 col-md-6">
                <div class="progress" id="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                        style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Lädt...
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php
        include('modal/modalNewEntry.php');
    ?>
    <?php
        include('modal/modalOffer.php');
    ?>
    <?php
        include('modal/modalLogin.php');
    ?>
    <?php
        include('modal/modalRegister.php');
    ?>

    <?php
        include('basicsiteelements/navigation.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->

        <div id="paddingtopMobil"></div>

        <div class="container-fluid mt-4 offerSiteContainer">

            <div id="loadingOffers" class="row justify-content-center" style="display:none">
                <div class="col-6">
                    <div class="progress" id="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                            role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100">Angebote werden geladen</div>
                    </div>
                </div>
            </div>

            <div id="offerContainer" class="row justify-content-center">
                <!--is filled by JS-Funktion offerLoading()-->
            </div>

        </div>

        <!-- Create new Offer -> if a user is logged in, the newOffer modal is shown, else the login modal -->
        <div id="center">

            <?php
                //if user is logged in --> show new offer modal
                if(isLoggedIn()){
                    ?>
            <a id="newOffer" class="center-block" data-toggle="modal" data-target="#newOfferModal">
                <?php
                }else{ //if no user is logged in --> show login modal
                    ?>
                <a id="newOffer" class="center-block" data-toggle="modal" data-target="#loginModal">
                    <?php
                }
            ?>
                    <img src="images/newOffer.PNG">
                </a>

        </div>

        <!--IMPORTANT NOTE: the normal script files are loaded on this page in the head area-->

        <!--Script for pagedynamic e.g. dynamic offer loading-->
        <script type="text/javascript" src="js/dynamicOfferLoading.js"></script>
        <script type="text/javascript" src="js/createOfferModalFiller.js"></script>


        <!-- Filter -->
        <script>
        $('.navbar .dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
        </script>

</body>

</html>