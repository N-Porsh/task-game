<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../src/config.php';


// Instantiate the app
$app = new \App\Game();
try {
	$app->playGame();

	//show results
	echo json_encode($app) . "\n\r" ;
} catch (Exception $e) {
	exit("Unhandled error occurred: " . $e->getMessage());
}