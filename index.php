<?php
// enable Error printing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

$app = new  Parkiraga\Application($_SERVER['HOME']);
$c = $app->getContainer();
$app->post('/user/create', \UserController::class.':create');
$app->get('/users', \UserController::class.':getAll');
$app->get('/user/{id}', \UserController::class.':getUser');
$app->post('/login', \UserController::class.':userLogin')
    ->add(function ($request, $response, $next) use ($c) {
        $response = $c->get('Authorization')->authorizeUser($response,$request,$next);
        return $response;
    });

$app->post('/company/update/{id}', \CompanyController::class.':update');
$app->get('/companies', \CompanyController::class.':getCompanies')
    ->add(function ($request, $response, $next) use ($c) {
        $response = $c->get('Authorization')->isLoggedIn($response,$request,$next);
        return $response;
    });
$app->get('/company/{id}', \CompanyController::class.':getCompany');

$app->get('/logout',\UserController::class.':userLogout')
    ->add(function ($request, $response, $next) use ($c) {
    $response = $c->get('Authorization')->logout($response,$request,$next);
    return $response;
});


$app->run();