<?php require_once('app.php') ?>
<html>
    <head>
        <title>Weather</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Click on map to check weather in this place</h3>
                    </div>
                </div>
                </container>
        </header>
        <div id="map"></div>
        <div class="container">
            <div class="row">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" id="weatherForm" method="post">
                    <input type="hidden" name="lat" id="t1">
                    <input type="hidden" name="long" id="t2">
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <?php
            $temp_day = 32;
            foreach ($data->list as $daily_weather) {
                if ($temp_day != date("j", $daily_weather->dt)) {
                    if ($temp_day != 32) {
                        ?></div><?php
                }
                ?>
                <div class="row">
                    <div class="col-md-12"><h3><?php echo date("F j, Y", $daily_weather->dt) ?></h3></div>
                    <?php
                    $temp_day = date("j", $daily_weather->dt);
                }
                ?>

                <div class='col-xs-12 col-sm-3 col-md-3 weather-col <?php
                if (date("a", $daily_weather->dt) == "pm") {
                    echo "night";
                }
                ?>'>
                    <div class='weather-icon'>
                        <ul>
                            <?php
                            echo $weather_icons[$daily_weather->weather[0]->icon];
                            ?>
                        </ul>
                    </div>
                    <p><?php echo date("g:i a", $daily_weather->dt) ?></p>
                    <p class="temp"><?php echo kToCen($daily_weather->main->temp) . "&degC"; ?>  </p>
                    <p><?php echo (int) $daily_weather->main->pressure; ?> hPa</p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
<footer>
    <p class="text-center">Created by Filip Wroński</p>
</footer>
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyB4z9qhugIAyt7f51PhWQe8MF91tGzG1BQ&signed_in=true"></script>
<script type="text/javascript" src="<?php echo $_SERVER['PHP_SELF']; ?>/../js/googlemap.js"></script>
</html>