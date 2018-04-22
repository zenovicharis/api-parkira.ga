<?php
// enable Error printing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

$app = new  Parkiraga\Application($_SERVER['HOME']);
$c = $app->getContainer();
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
// User Controller Routes
$app->get('/users', \UserController::class.':getAll');
$app->get('/user/{id}', \UserController::class.':getUser');
$app->get('/logout',\UserController::class.':userLogout')
    ->add(function ($request, $response, $next) use ($c) {
        $response = $c->get('Authorization')->logout($response,$request,$next);
        return $response;
    });
$app->post('/user/create', \UserController::class.':create');
$app->post('/user/update/{id}',\UserController::class.':update');
$app->post('/login', \UserController::class.':userLogin')
    ->add(function ($request, $response, $next) use ($c) {
        $response = $c->get('Authorization')->authorizeUser($request, $response, $next);
        return $response;
    });


// Company Controller Routes
$app->post('/company/create', \CompanyController::class.':create');
$app->post('/company/update/{id}', \CompanyController::class.':update');
$app->post('/company/delete/{id}', \CompanyController::class.':delete');
$app->get('/company/{id}', \CompanyController::class.':getCompany');
$app->get('/companies', \CompanyController::class.':getCompanies');
//    ->add(function ($request, $response, $next) use ($c) {
//        $response = $c->get('Authorization')->isLoggedIn( $request, $response, $next);
//        return $response;
//    });


$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});



$app->run();