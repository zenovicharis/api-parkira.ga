<?php

namespace Parkiraga\Controllers;

use Parkiraga\Models\User;
use Parkiraga\Services\UserService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Parkiraga\EntityModels\UserEntityModel;
use \Parkiraga\Application;

class UserController
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create(Request $request, Response $response){
        $user = $this->extractUser($request);
        $succesfull = $this->userService->createUser($user);
        return is_int($succesfull) ? $response->withStatus(201)->withBody($this->setBodyId($response, $succesfull)) : $response->withStatus(500);
    }
    public function getAll(Request $request, Response $response){
        $users = $this->userService->getUsers();
        return $response->withJson($users, 200);
    }

    public function getUser(Request $request, Response $response, $id){
        $user = $this->userService->getUserById($id);
        return $response->withJson($user, 200);
    }

    public function userLogin(Request $request, Response $response){
        var_dump(unserialize($_SESSION['user']));die();
    }

    public function userLogout(Request $request, Response $response){
        var_dump($_SESSION);die();
    }

    private function extractUser(Request $request){
        $name = $request->getParam("name");
        $surname = $request->getParam("surname");
        $email = $request->getParam("email");
        $password = $request->getParam("password");
        $link = $request->getParam("link");
        $picture = $request->getParam("picutre");
        $user = new UserEntityModel($name, $surname, $email, $password, $link, $picture);
        return $user;
    }

    private function setBodyId(Response $response, $id){
        $body = $response->getBody();
        $body->write($id);
        return $body;
    }

}