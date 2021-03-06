<!DOCTYPE html>
<html>

<head>
    <title>Logout</title>
    <?php
        include('basicsiteelements/header.php');
    ?>
</head>

<body>
    <?php
        include('modal/modalLogin.php');
        include('basicsiteelements/navigationpages.php');
    ?>

    <div class="content mt-4">
        <!-- Div content for padding-top (header) -->
        <div class="container">
            <h1>Logout</h1>
            <p>Du hast dich erfolgreich ausgeloggt. <br>
                Wenn du nicht in einigen Sekunden zur Startseite weitergeleitet wirst, klicke
                <a href="index.php" title="Startseite"><strong>hier</strong></a>.</p>
        </div>
    </div>
    <?php
        include('basicsiteelements/scripts.php');
    ?>

    <script type="text/javascript" src="js/loggedoutRedirect.js"></script>
</body>

</html>