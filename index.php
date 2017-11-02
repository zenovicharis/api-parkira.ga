<?php
// enable Error printing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

use Parkiraga\Application;
use Parkiraga\Controllers\UserController;

$app = new  Parkiraga\Application($_SERVER['HOME']);

$userController = new Parkiraga\Controllers\UserController();

$app->post('/user/create', UserController::class.':create');

$app->run();