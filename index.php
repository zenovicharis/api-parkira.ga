<?php
// enable Error printing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

$app = new  Parkiraga\Application($_SERVER['HOME']);

$app->post('/user/create', \UserController::class.':create');
$app->get('/users', \UserController::class.':getAll');
$app->get('/user/{id}', \UserController::class.':getUser');

$app->get('/companies', \CompanyController::class.':getCompanies');
$app->get('/company/{id}', \CompanyController::class.':getCompany');


$app->run();