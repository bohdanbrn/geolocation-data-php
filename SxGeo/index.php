<?php
// Sypex Geo
// https://sypexgeo.net/
// https://sypexgeo.net/ru/download/

require("SxGeo.php");
$SxGeo = new SxGeo('SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY); // fastest mode

$ip = $_SERVER['REMOTE_ADDR'];

// TODO (test IPs)
// $ip = "165.231.94.96"; // Paris IP (department "Ile-de-France")
// $ip = "185.42.130.52"; // Lviv

$geo_data = $SxGeo->getCityFull($ip); // get all info about IP

echo "<pre>";
    var_dump($geo_data);
echo "</pre>";

unset($SxGeo);
