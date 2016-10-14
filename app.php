<?php

$weather_api = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?lat=' . $_POST['lat'] . '&lon=' . $_POST['long'] . '&appid=e2d6dd4ef7ad6526de8c6ca2424aba95');
$data = json_decode($weather_api);

$weather_icons = [
    '50n' => '<li class="icon-mist"></li>',
    '50d' => '<li class="icon-mist"></li>',
    '01d' => '<li class="icon-sun"></li>',
    '01n' => '<li class="icon-moon"></li>',
    '02d' => '<li class="icon-cloud"></li><li class="icon-sunny"></li>',
    '02n' => '<li class="icon-cloud"></li><li class="icon-night"></li>',
    '03d' => '<li class="icon-cloud"></li>',
    '03n' => '<li class="icon-cloud"></li>',
    '04d' => '<li class="icon-cloud"></li>',
    '04n' => '<li class="icon-cloud"></li>',
    '09d' => '<li class="basecloud"></li><li class="icon-drizzle"></li>',
    '09n' => '<li class="basecloud"></li><li class="icon-drizzle"></li>',
    '10d' => '<li class="basecloud"></li><li class="icon-drizzle icon-night"></li>',
    '10n' => '<li class="basecloud"></li><li class="icon-drizzle icon-night"></li>',
    '11d' => '<li class="basethundercloud"></li><li class="icon-thunder icon-sunny"></li>',
    '11n' => '<li class="basethundercloud"></li><li class="icon-thunder icon-night"></li>',
    '13d' => '<li class="basecloud"></li><li class="icon-snowy icon-sunny"></li>',
    '13n' => '<li class="basecloud"></li><li class="icon-drizzle icon-night"></li>'
];

function kToCen($k) {
    return round($k - 273.15);
}

?>