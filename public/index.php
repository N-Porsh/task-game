<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../src/config.php';


echo "wait...\n\r";
// Instantiate the app
$app = new \App\Game();
$app->playGame();
//show results
echo json_encode($app) . "\n\r" ;
