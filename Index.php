<?php

session_start();

use App\Controllers\Routeur;

define('ROOT',__DIR__);

require_once ROOT . '/vendor/autoload.php';

$app = new Routeur;
$app->start();