<?php
header("Content-Type: text/plain");
chmod(dirname(__FILE__) . "/calendars.json", 0640);

$string = file_get_contents(dirname(__FILE__) . "/calendars.json");
$config = json_decode($string, true);

// Check Config File
if (empty($config)) {
    echo "Config file not setup or permissions incorrect";
    die();
}

// Check Authorization
if (!isset($_GET["api_key"]) || $_GET["api_key"] !== $config["token"]) {
    http_response_code(401);
    echo "Request is not authorized";
    die();
}

$fullIcal = "";

foreach ($config["calendars"] as $calendar) {
    $ical = file_get_contents($calendar["url"]);

    $ical = str_replace("BEGIN:VCALENDAR", "", $ical);
    $ical = str_replace("END:VCALENDAR", "", $ical);

    $fullIcal .= $ical;
}

echo "BEGIN:VCALENDAR\n" . $fullIcal . "\nEND:VCALENDAR";
