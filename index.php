<?php

require "vendor/autoload.php";
require "init.php";

use Klein\Klein as Route;

try {

    $route = new Route();

    $route->get('/', ['App\ProfileHandler', 'display']);
    $route->get('/founder/[s:format]', ['App\ProfileHandler', 'display']);

    $route->dispatch();

} catch (Exception $e) {

    err('ERROR ' . $e->getMessage());
    echo json_encode([
        'error' => $e->getMessage()
    ]);

}
