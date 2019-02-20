<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sharey</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

</head>

<body>

    <?php
        include('basicsiteelements/header.php');
    ?>

    <div class="content">
        <!-- Div content for padding-top (header) -->



        <!-- HERE CONTENT (CHRIS) -->
        <!-- Content -->
        <div class="container">
            <div class="row">

                <!-- Card 1 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 1 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p> <!-- dynamic -->
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p> <!-- dynamic -->
                                    </div>
                                </div>

                                <!-- Card 1 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                        <!-- dynamic -->
                                    </div>
                                </div>
                            </div>

                            <!-- Card 1 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5> <!-- dynamic -->
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                    <!-- dynamic -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 2 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 2 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-sm-4 py-2">
                    <div class="card h-100 text-white bg-primary" style="width: 21rem;">
                        <div class="container.fluid">
                            <div class="row">

                                <!-- Card 3 - Row 1 - Column 1 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <p class="card-text">Tag</p>
                                        <br>
                                        <img src="images/location.png" style="width: 40px;" style="height: 40px;"
                                            style="display: inline">
                                        <p class="card-text" style="display: inline">Mosbach</p>
                                    </div>
                                </div>

                                <!-- Card 3 - Row 1 - Column 2 -->
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <img src="images/yoghurt.jpg" style="width: 100%;" style="height: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 - Row 2 -->
                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Ein Joghurt</h5>
                                    <p class="card-text">Joghurt von Ehrmann, Geschmacksrichtung Erdbeere</p>
                                </div>
                            </div>
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