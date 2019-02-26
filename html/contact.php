<!DOCTYPE html>
<html>

<head>
    <title>Kontakt</title>
    <?php
        include('basicsiteelements/header.php');
    ?>
</head>

<body>
    <?php
        include('modal/modalLogin.php');
    ?>
    <?php
        include('basicsiteelements/navigationpages.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->
        <div class="container">
            <h1>Kontakt</h1>



            <form id="contact-form" method="post" action="contact.php" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Vorname</label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Vorname"
                                    required="required" data-error="Vorname ist ein Pflichtfeld">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Nachname</label>
                                <input id="form_lastname" type="text" name="surname" class="form-control"
                                    placeholder="Nachname" required="required"
                                    data-error="Nachname ist ein Pflichtfeld">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_email">E-Mail</label>
                                <input id="form_email" type="email" name="email" class="form-control"
                                    placeholder="E-Mail" required="required"
                                    data-error="Bitte geben Sie eine gültige E-Mail-Adresse ein">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Nachricht</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Nachricht"
                                    rows="4" required="required"
                                    data-error="Bitte hinterlassen Sie einen Nachricht"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-secondary btn-send float-right" value="Senden">
                        </div>
                    </div>


                </div>
        </div>
    </div>
    <?php
        include('basicsiteelements/scripts.php');
    ?>
</body>

</html>