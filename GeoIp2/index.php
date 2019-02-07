<?php
// MaxMind 
// https://github.com/maxmind/GeoIP2-php/releases
// https://dev.maxmind.com/geoip/geoip2/geolite2/

require_once("geoip2.phar");

use GeoIp2\Database\Reader;

$ip = $_SERVER['REMOTE_ADDR'];

// TODO (test IPs)
// $ip = "165.231.94.96"; // Paris IP (department "Ile-de-France")
// $ip = "185.42.130.52"; // Lviv

$reader = new Reader(__DIR__ . '/GeoLite2-City.mmdb');

// City DB
$record = $reader->city($ip);
// or for Country DB
// $record = $reader->country($ip);

echo "<pre>";
    print($record->country->isoCode . "\n");
    print($record->country->name . "\n");
    print($record->country->names['zh-CN'] . "\n");
    print($record->mostSpecificSubdivision->name . "\n");
    print($record->mostSpecificSubdivision->isoCode . "\n");
    print($record->city->name . "\n");
    print($record->postal->code . "\n");
    print($record->location->latitude . "\n");
    print($record->location->longitude . "\n");
echo "</pre>";
