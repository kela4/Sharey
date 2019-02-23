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

        <div id="paddingtopMobil"></div>

        <div class="container mt-4">

            <div id="loadingOffers" class="row justify-content-center" style="display:none">
                <div class="col-6">
                    <div class="progress">
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

        <?php
            include('basicsiteelements/scripts.php');
        ?>

        <!--Script for pagedynamic e.g. dynamic offer loading-->
        <script type="text/javascript" src="js/dynamicOfferLoading.js"></script>
        <script type="text/javascript" src="js/createOfferModalFiller.js"></script>

</body>

</html>