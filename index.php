<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
$system_dir = __DIR__."/system";
if (file_exists($system_dir.'/storage/framework/maintenance.php')) {
    require $system_dir.'/storage/framework/maintenance.php';
}

// Register the Composer autoloader...
require $system_dir.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once $system_dir . '/bootstrap/app.php';

$app->bind('path.public', function () {
    return __DIR__ . '/public';
});

$response = $app->handle(
    Request::capture()
);