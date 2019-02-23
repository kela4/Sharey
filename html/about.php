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
    <?php
        include('basicsiteelements/navigation.php');
    ?>

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