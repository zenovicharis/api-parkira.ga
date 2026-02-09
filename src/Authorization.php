<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 11/18/2017
 * Time: 10:39 PM
 */

namespace Parkiraga;


use Parkiraga\Services\UserService;
use Slim\Http\Request;
use Slim\Http\Response;

class Authorization
{
    public function __construct(UserService $userService)
    {
        session_start();
        $this->userService = $userService;
    }

    public function authorizeUser(Request $request, Response $response, $next){
        $email = $request->getParam('email');
        $password = $request->getParam('password');
        $user = $this->userService->getUserByEmail($email);
        if(empty($user)){
            $newResponse = $response->withStatus(401);
            return $newResponse;
        }else{
            if($this->passwordMatch($password,$user->password)){
                $_SESSION['user'] = serialize($user);

                return $next($request, $response);
            }else{
                return $response->withStatus(401);
            }
        }
    }

    public function logout(Response $response, Request $request, $next){
        $_SESSION = array();
        session_destroy();
        $next($request, $response);
    }

    public function isLoggedIn(Request $request, Response $response, $next){
        if(isset($_SESSION['user'])){
            return $next($request, $response);
        }else{
            return $response->withStatus(401);
        }
    }

    protected function passwordMatch($password, $receievedPassword){
       return password_verify($password, $receievedPassword);
    }
}