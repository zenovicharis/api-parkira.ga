<?php

namespace Parkiraga\Services;

use Parkiraga\Models\User;
use Symfony\Component\Config\Definition\Exception\Exception;

class UserService
{
    public function __construct() { }

    public function createUser($name, $surname){
        try{
            $user = User::create([
                "first_name" =>$name,
                "last_name" => $surname,
                "email" => 'zenovicharis@live.com',
                "link" => "me.org",
                "picture" => "no picture"
            ]);

            return true;
        } catch (Exception $e){
            return false;
        }


    }
}
