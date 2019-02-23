<?php
    require_once('php/isLoggedInFunction.php');
    require_once('dbconnect.php');
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
        <li>
            <a href="index.php" title="Startseite">Startseite</a>
        </li>

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
        <div class="input-group">

        </div>
    </div>
</nav>