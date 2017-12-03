<?php

namespace Parkiraga\Services;

use Parkiraga\Models\User;
use Parkiraga\EntityModels\UserEntityModel;
use Symfony\Component\Config\Definition\Exception\Exception;


class UserService
{
    public function __construct() { }

    public function createUser(UserEntityModel $user){
        try{
            $user = User::create([
                "first_name" => $user->name,
                "last_name" => $user->surname,
                "email" => $user->email,
                "password" => password_hash($user->password, PASSWORD_DEFAULT),
                "link" => $user->link,
                "picture" => $user->picture
            ]);
            return (int)$user->id;
            // must replace with safer method
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
    public function getUserByEmail($email){
        try{
            $user = User::find_by_email($email);
            return $user;
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