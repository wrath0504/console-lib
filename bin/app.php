<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application;
use App\Demo\EchoCommand;

$app = new Application();
$app->register(new EchoCommand());
$app->run($argv);
