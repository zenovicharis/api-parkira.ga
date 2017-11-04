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
                "first_name" => $name,
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
    public function getUsers(){
         try{
            $users = User::all();
            $usersInArray = $this->toUserArray($users);
            return $usersInArray;
         }catch(Exception $e) {
             return false;
         }
    }
    public function getUserById($id){
        try{
            $user = User::find($id);
            return $user->to_array();
        }catch(Exception $e){
            return $e;
        }
    }
    protected function toUserArray($users){
        $array = array();
        foreach($users as $user){
            $array[] = $user->to_array();
        }
        return $array;
    }


}