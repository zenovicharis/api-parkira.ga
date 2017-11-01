<?php

namespace Parkiraga\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Parkiraga\Application;

class UserController
{

    public function __construct()
    {

    }

    public function create(Request $request){
        var_dump("hello");die();
    }

    public function you(Request $request, Response $response, $argc){
        var_dump( $argc);die();
    }
}