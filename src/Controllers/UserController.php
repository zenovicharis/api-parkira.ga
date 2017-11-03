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
        $succesfull = $this->userService->createUser($name, $surname);
        return $succesfull ? $response->withStatus(201) : $response->withStatus(500);
    }
    public function getAll(Request $request, Response $response){
        $users = $this->userService->getUsers();
        return $response->withJson($users, 200);
    }

    public function getUser(Request $request, Response $response, $id){
        $user = $this->userService->getUserById($id);
        return $response->withJson($user, 200);
    }

}