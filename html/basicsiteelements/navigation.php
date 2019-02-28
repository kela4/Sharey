<?php
    require_once('php/isLoggedInFunction.php');
?>

<!-- For dark, when sidebar is open -->
<div class="overlay"></div>
<!-- Sidebar  -->
<nav id="sidebar">
    <div id="dismiss" title="Schließen">
        <i class="fas fa-times"></i>
    </div>
    <div class="sidebar-header text-center">
        <h3>Menü</h3>
    </div>

    <ul class="list-unstyled components text-center">
        <?php
            if(!isLoggedIn()){ //user isn't logged in
                ?>
        <li>
            <a data-toggle="modal" data-target="#loginModal" title="Login">Login</a>
        </li>

        <li>
            <a data-toggle="modal" data-target="#registerModal" title="Registrieren">Registrieren</a>
        </li>
        <?php
            }else{ //user is logged in
                ?>
        <li>
            <a href="account.php" title="Account">Account</a>
        </li>
        <li>
            <a href="../php/logout.php" title="Logout">Logout</a>
        </li>
        <?php
            }
        ?>

        <li>
            <a href="about.php" title="Über uns">Über uns</a>
        </li>
        <li>
            <a href="howto.php" title="How To">How To</a>
        </li>
        <li>
            <a href="contact.php" title="Kontakt">Kontakt</a>
        </li>
        <li>
            <a href="privacy.php" title="Datenschutz">Datenschutz</a>
        </li>
        <li>
            <a href="imprint.php" title="Impressum">Impressum</a>
        </li>
    </ul>
    <div id="social">
        <a href="https://www.facebook.com/sharey.plattform.3"><img class="img-fluid"
                src="images/social_icons/facebook_transparent.PNG" alt="Facebook" title="Facebook"></a>
        <a href="https://www.instagram.com/sharey.plattform/?hl=de"><img class="img-fluid"
                src="images/social_icons/insta_transparent.PNG" alt="Instagram" title="Instagram"></a>
        <a href="https://twitter.com/Sharey25174232?lang=de"><img class="img-fluid"
                src="images/social_icons/twitter_transparent.PNG" alt="Twitter" title="Twitter"></a>
        <br><br>
    </div>
</nav>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Hamburger menue -->
        <div id="menu" title="Menü">
            <button id="sidebarCollapse" class="btn">
                <i class="fas fa-bars" id="hamburger"></i>
            </button>
        </div>
        <div id="placeholder"></div>
        <!-- Logo -->
        <a href="index.php"><img src="images/Logo_transparent.png" id="img_logo" class="img-fluid" alt="Logo"
                title="Sharey"></a>
        <div id="placeholder"></div>
        <!-- Search Bar -->
        <div class="input-group">
            <div class="input-group-append">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu keep-open">
                        <form class="col-12 py-12">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>PLZ/Ort</label>
                                        <select id="searchFilterPLZ" class="custom-select">
                                            <!--rest will be filled by offerSearchFiller.js-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!--only fixed values in prototype-->
                                    <label>Umkreis</label>
                                    <select id="searchFilterSurrounding" class="custom-select">
                                        <option value="5" selected>+5</option>
                                        <option value="10">+10</option>
                                        <option value="15">+15</option>
                                        <option value="20">+20</option>
                                    </select>
                                </div>
                            </div>
                            <label>Tag</label>
                            <select id="searchFilterTag" class="custom-select">
                                <option value="0" selected>Alle</option>
                                <!--rest will be filled by offerSearchFiller.js-->
                            </select>
                    </div>
                </div>
            </div>
            <input type="text" id="searchBox" class="form-control input-group-append"
                placeholder=" Suchbegriff eingeben" title="Suchbegriff eingeben">

            <div class="input-group-append">
                <button class="btn btn-secondary" id="search" type="button"
                    onclick="alert('Diese Funktion ist im Prototypen nicht implementiert.');"
                    title="Suchen und Filtern">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>