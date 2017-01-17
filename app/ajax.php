<?php

require_once __DIR__ . '/require.php';

// Filter dates requested.
if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['date'])) {
    $requestedDate = $_GET['date'];
}

// Filter city string
$cityName = filter_var($_GET['city'], FILTER_SANITIZE_STRING);

$sunrise = [];

if ($cityName) {

    $geoCoder = new GeoCoder();
    $location = $geoCoder->getLocation($cityName);

    $date = new DateTime('now');

    $dates[] = clone $date;

    if (!$requestedDate) {
        // Get dates until first sunday
        while ($date->format('N') != 7) {
            // Add a day
            $date->add(new DateInterval('P1D'));
            $dates[] = clone $date;
        }
    }

    foreach ($dates as $date) {
        $calculator = new SunriseCalculator($location, $date);

        $sunrise[$date->format('Y-m-d')] = $calculator->getRunsise();
    }
}

header('Content-Type: application/json');
echo json_encode($sunrise);
