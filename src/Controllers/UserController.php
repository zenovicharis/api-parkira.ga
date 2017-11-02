<?php

namespace Parkiraga\Controllers;

use Parkiraga\Services\UserService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Parkiraga\Application;

class UserController
{


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request, Response $response){
        $name = $request->getParam("name");
        $surname = $request->getParam("surname");
        $name = $request->getParam("name");
        $name = $request->getParam("name");
        $name = $request->getParam("name");
        $name = $request->getParam("name");
        $name = $request->getParam("name");
        $succesfull = $this->userService->createUser($name, $surname);
        return $response->withStatus(201);
    }

    public function you(Request $request, Response $response, $argc){
        var_dump( $argc);die();
    }
}