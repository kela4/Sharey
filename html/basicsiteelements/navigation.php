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
            <a data-toggle="modal" data-target="#loginModal" title="Login">Login</a>
        </li>
        <li>
            <a data-toggle="modal" data-target="#registerModal" title="Registrieren">Registrieren</a>
        </li>
        <li>
            <a href="account.php" title="Account">Account</a>
        </li>
        <li>
            <a href="#" title="Logout">Logout</a>
        </li>
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
        <a href="#"><img class="img-fluid" src="images/social_icons/facebook_transparent.PNG" alt="Facebook"
                title="Facebook"></a>
        <a href="#"><img class="img-fluid" src="images/social_icons/insta_transparent.PNG" alt="Instagram"
                title="Instagram"></a>
        <a href="#"><img class="img-fluid" src="images/social_icons/twitter_transparent.PNG" alt="Twitter"
                title="Twitter"></a>
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
            <input type="text" id="searchBox" class="form-control" placeholder="Suchbegriff eingeben"
                title="Suchbegriff eingeben">
            <div class="input-group-append">
                <button class="btn btn-secondary" id="search" type="button" title="Suchen und Filtern">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>