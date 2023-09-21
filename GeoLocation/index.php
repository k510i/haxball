<?php
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
// If we wanted to change the base currency, we would uncomment the following line
// $geoplugin->currency = 'EUR';
$geoplugin->locate();
echo "<location><lat>{$geoplugin->latitude}</lat>".
	"<lon>{$geoplugin->longitude}</lon>".
    "<country_code>{$geoplugin->countryCode}</country_code></location>"