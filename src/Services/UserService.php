<?php

namespace Parkiraga\Services;

use \Parkiraga\Application;
use \Parkiraga\Models\User;

class UserService
{

    public function __construct()
    {

    }

    public function createUser($name){
        $user = User::create([
            'first_name' => $name,
            'last_name' => 'Imamovic',
            'email' => 'imamovicdze@gmail.com',
            'link' => 'dz',
            'link' => 'dz',
            'picture' => 'dz',
        ]);
    }

}
