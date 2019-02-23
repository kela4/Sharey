<!DOCTYPE html>
<html>

<head>
    <?php
        require_once('dbconnect.php');
        include('basicsiteelements/header.php');
    ?>
</head>

<body>
    <?php
        include('modal/modalLogin.php');
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
        </div>
    </nav>

    <div class="content">
        <!-- Div content for padding-top (header) -->
        <div class="container">
            <h1>Über uns</h1>

            <div class="row">
                <div class="col-12 col-md-7">
                    <br>
                    <p>
                        In der heutigen, schnelllebigen, modernen Welt landen jedes Jahr <strong>elf Millionen
                            Tonnen</strong>
                        Lebensmittel in Deutschland im Müll.
                        Diese Verschwendung wird nicht nur von Großverbrauchern und im Handel verursacht, auch die
                        Privathaushalte haben einen nicht unerheblichen Anteil daran.
                    </p>
                    <p>
                        Das große Problem hierbei: sowohl für die Erzeugung, als auch die Vernichtung dieser
                        weggeworfenen
                        Lebensmittel werden wertvolle Ressourcen verschwendet wie z. B. Rohstoffe, Energie und Wasser.
                        <br>
                    </p>
                    <p>
                        Das lässt sich nicht nur auf Lebensmittel eingrenzen. Auch beispielsweise Drogerie- oder
                        sonstige
                        Verbrauchsprodukte fallen hier ins Gewicht.
                    </p>
                </div>
                <div class="col-12 col-md-5">
                    <img src="images/trash.jpg" class="img-fluid rounded" alt="waste" />
                </div>

                <div class="col-12">
                    <br>
                    <center>
                        <h4>
                            An dieser Stelle kommen wir ins Spiel - <strong>Sharey</strong>
                        </h4>
                    </center>
                    <br>
                </div>

                <div class="col-12 col-md-5 text-center">
                    <img src="images/tree.jpg" class="img-fluid rounded" alt="waste" />
                </div>

                <div class="col-12 col-md-7">

                    <p>
                        Auf dieser Plattform kannst du dazu beitragen, die Verschwendung von Ressourcen auf unserer Erde
                        zu reduzieren.
                    </p>
                    <p>
                        Nach dem Motto <i>bevor du etwas wegschmeißt, das noch nutzbar ist - share it</i>
                        kannst du dich auf Sharey austoben und einer breiten Nutzergruppe deine nicht mehr benötigten
                        Lebensmittel
                        und sonstigen Verbrauchsprodukte bereitstellen. Gib diesen die Chance, doch noch genutzt zu
                        werden!
                        Teile auch du unsere Vision von einer Welt ohne Ressourcenverschwendung.
                    </p>
                    <p>
                        Wir freuen uns auf ein fröhliches Sharing mit dir - dein Sharey-Team.
                    </p>

                    <small>Made with <span>&#10084;</span> by FoStDev<small>
                </div>

            </div>

        </div>
    </div>
    <?php
        include('basicsiteelements/scripts.php');
    ?>
</body>

</html>