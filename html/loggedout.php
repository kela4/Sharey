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
        include('basicsiteelements/navigation.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->
        <div class="container">
            <h1>Logout</h1>
            <p>Du hast dich erfolgreich ausgeloggt. <br>
            Wenn du nicht in einigen Sekunden zur Startseite weitergeleitet wirst, klicke 
            <a href="index.php" title="Startseite">hier</a>.</p>
        </div>
    </div>
    <?php
        include('basicsiteelements/scripts.php');
    ?>
</body>

</html>