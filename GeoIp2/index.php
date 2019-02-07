<?php
// MaxMind
// https://github.com/maxmind/GeoIP2-php/releases
// https://dev.maxmind.com/geoip/geoip2/geolite2/

use GeoIp2\Database\Reader;

/**
 * Get data about user geolocation
 *
 * @return string
 */
if (!function_exists('geoip2_geolocation_data')) {
    function geoip2_geolocation_data() {
        require_once "geoip2.phar";

        $ip = $_SERVER['REMOTE_ADDR'];

        // TODO (test IPs)
        // $ip = "165.231.94.96"; // Paris IP (department "Ile-de-France")
        // $ip = "185.42.130.52"; // Lviv

        try {
            $reader = new Reader(__DIR__ . '/GeoLite2-City.mmdb');

            // Get city data
            $city_data = $reader->city($ip);
        } catch (Exception $ex) {
            $city_data = $ex;
        }

        return $city_data;
    }
}

/**
 * Get data about user zip code
 *
 * @param object $geo_data
 * @return string
 */
if (!function_exists('geoip2_user_zipcode')) {
    function geoip2_user_zipcode($geo_data) {
        return (!empty($geo_data->postal->code)) ? $geo_data->postal->code : "";
    }
}

$geo_data = geoip2_geolocation_data();
$user_zipcode = geoip2_user_zipcode($geo_data);

echo "<pre>";
    // var_dump($geo_data->country->isoCode);
    // var_dump($geo_data->country->name);
    // var_dump($geo_data->country->names['zh-CN']);
    // var_dump($geo_data->mostSpecificSubdivision->name);
    // var_dump($geo_data->mostSpecificSubdivision->isoCode);
    // var_dump($geo_data->city->name);
    // var_dump($geo_data->postal->code);
    // var_dump($geo_data->location->latitude);
    // var_dump($geo_data->location->longitude);
    var_dump($user_zipcode);
echo "</pre>";
